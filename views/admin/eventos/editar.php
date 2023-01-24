<h1 class="dashboard__heading"><?php echo $titulo; ?></h1>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/eventos">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver
    </a>
</div>

<div class="dashboard__formulario">
    <?php include_once __DIR__ . '/../../templates/alertas.php'; ?>

    <form class="formulario" method="POST">

    <?php include_once __DIR__ . '/formulario.php'; ?>

    <input type="submit" value="Guardar Cambios" class="formulario__submit formulario__submit--actualizar">

    </form>
</div>