<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto"> Inicia Sesion en DevWebCamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <form action="/login" class="formulario" method="POST">
        <div class="formulario__campo">
            <label for="email" class="forumlario__label">Email</label>
            <input 
                type="email"
                class="formulario__input"
                placeholder="Tu Email"
                id="email"
                name="email"
                value="<?php echo $usuario->email; ?>"
            >
        </div>

        <div class="formulario__campo">
            <label for="password" class="forumlario__label">Password</label>
            <input 
                type="password"
                class="formulario__input"
                placeholder="Tu Password"
                id="password"
                name="password"
            >
        </div>

        <input type="submit" value="Iniciar Sesion" class="formulario__submit">

    </form>

    <div class="acciones">
        <a href="/registro" class="acciones__enlace">¿Aun no tienes cuenta? Crea Una</a>
        <a href="/olvide" class="acciones__enlace">¿Olvidaste tu Password?</a>
    </div>

</main>