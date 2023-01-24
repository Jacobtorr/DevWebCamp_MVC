<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Recupera tu acceso a DevWebCamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <form action="/olvide" class="formulario" method="POST">
        <div class="formulario__campo">
            <label for="email" class="forumlario__label">Email</label>
            <input 
                type="email"
                class="formulario__input"
                placeholder="Tu Email"
                id="email"
                name="email"
            >
        </div>

        <input type="submit" value="Enviar" class="formulario__submit">

    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta? Inicia Sesion</a>
        <a href="/registro" class="acciones__enlace">¿Aun no tienes cuenta? Crea Una</a>
    </div>

</main>