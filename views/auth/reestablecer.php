<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Coloca tu Nuevo Password</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <?php if ($token_valido) {?>
    <form class="formulario" method="POST">
        <div class="formulario__campo">
            <label for="password" class="forumlario__label">Nuevo Password</label>
            <input 
                type="password"
                class="formulario__input"
                placeholder="Tu Nuevo Password"
                id="password"
                name="password"
            >
        </div>

        <input type="submit" value="Guardar Password" class="formulario__submit">

    </form>

    <?php  } ?>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta? Inicia Sesion</a>
        <a href="/registro" class="acciones__enlace">¿Aun no tienes cuenta? Crea Una</a>
    </div>

</main>