<?php

namespace Controllers;

use Model\Evento;
use MVC\Router;
use Model\Usuario;
use Model\Registro;

class DashboardController {
    
    public static function index (Router $router) {
        if(!isAdmin()) {
            header ('Location: /login');
        }

        // Obtener ultimos registros
        $registros = Registro::get(5);

        foreach($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
        }

        // Calcular los ingresos
        $presenciales = Registro::total('paquete_id', 1);
        $virtuales = Registro::total('paquete_id', 2);

        $ingresos = ($virtuales * 46.41) + ($presenciales * 189.54);

        // Obtener Eventos con mas y menos lugares disponibles
        $menos_disponibles =  Evento::ordenarLimite('disponibles', 'ASC', 5);
        $mas_disponibles =  Evento::ordenarLimite('disponibles', 'DESC', 5);
    
        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administracion',
            'registros' => $registros,
            'ingresos' => $ingresos,
            'menos_disponibles' => $menos_disponibles,
            'mas_disponibles' => $mas_disponibles
        ]);
    }
}