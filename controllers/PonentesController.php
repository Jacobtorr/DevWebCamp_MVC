<?php

namespace Controllers;

use MVC\Router;
use Model\Ponente;
use Classes\Paginacion;
use Intervention\Image\ImageManagerStatic as Image;

class PonentesController {
    
    public static function index (Router $router) {
        if(!isAdmin()) {
            header ('Location: /login');
        }

        // Codigo que genera la Paginacion
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header ('Location: /admin/ponentes?page=1');
        }

        $registros_por_pagina = 9;
        $total = Ponente::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header ('Location: /admin/ponentes?page=1');
        }

        $ponentes = Ponente::paginar($registros_por_pagina, $paginacion->offset());
        
        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencistas',
            'ponentes' => $ponentes,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear (Router $router) {
        if(!isAdmin()) {
            header ('Location: /login');
        }

        $alertas = [];
        $ponente = new Ponente;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!isAdmin()) {
                header ('Location: /login');
            }

            //Leer imagen
            if(!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/speakers';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            } 

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            $ponente->sincronizar($_POST);

            // Validar
            $alertas =  $ponente->validar();

            // Si no hay alertas se ejecuta el siguiente codigo
            if(empty($alertas)) {
                // Guardar las imagenes
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');

                // Guardar en la BD
                $resultado = $ponente->guardar();

                if($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }
        
        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => json_decode($ponente->redes)
        ]);
    }

    public static function editar (Router $router) {
        if(!isAdmin()) {
            header ('Location: /login');
        }

        $alertas = [];
        
        //Validar el ID
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if (!$id) {
            header('Location: /admin/ponentes');
        }

        // Obtener ponente a editar
        $ponente = Ponente::find($id);

        if(!$ponente) {
            header('Location: /admin/ponentes');
        }

        $ponente->imagen_actual = $ponente->imagen;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!isAdmin()) {
                header ('Location: /login');
            }

             //Leer imagen
             if(!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/img/speakers';

                // Crear la carpeta si no existe
                if(!is_dir($carpeta_imagenes)){
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5(uniqid(rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $ponente->imagen_actual;

            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            $ponente->sincronizar($_POST);

            // Validar datos nuevos del formulario
            $alertas = $ponente->validar();

            // Si no hay alertas se ejecuta el siguiente codigo
            if(empty($alertas)) {
                // Si hay una nueva imagen
                if(isset($nombre_imagen)) {
                    // Guardar las imagenes
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');
                }

                // Guardar nuevos datos en la BD
                $resultado = $ponente->guardar();

                // Redireccionar al Admin
                if($resultado) {
                    header('Location: /admin/ponentes');
                }
            }
        }
        
        $router->render('admin/ponentes/editar', [
            'titulo' => 'Editar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente ?? null,
            'redes' => json_decode($ponente->redes)
        ]);
    }

    public static function eliminar () {
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!isAdmin()) {
                header ('Location: /login');
            }

            $id = $_POST['id'];
            $ponente = Ponente::find($id);

            if(!isset($ponente)) {
                header('Location: /admin/ponentes');
            }

            $resultado = $ponente->eliminar();
            if($resultado) {
                header('Location: /admin/ponentes');
            }
        }
    }
}