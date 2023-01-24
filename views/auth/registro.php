<main class="auth">
    <h2 class="auth__heading"><?php echo $titulo; ?></h2>
    <p class="auth__texto">Registrate en DevWebCamp</p>

    <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

    <form action="/registro" class="formulario" method="POST">
        <div class="formulario__campo">
            <label for="nombre" class="forumlario__label">Nombre</label>
                <input 
                    type="text"
                    class="formulario__input"
                    placeholder="Tu Nombre"
                    id="nombre"
                    name="nombre"
                    value="<?php echo $usuario->nombre; ?>"
                    
                >
        </div>
        <div class="formulario__campo">
            <label for="apellido" class="forumlario__label">Apellido</label>
                <input 
                    type="text"
                    class="formulario__input"
                    placeholder="Tu Apellido"
                    id="apellido"
                    name="apellido"
                    value="<?php echo $usuario->apellido; ?>"
                >
        </div>
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

        <div class="formulario__campo">
            <label for="password2" class="forumlario__label">Repetir Password</label>
                <input 
                    type="password"
                    class="formulario__input"
                    placeholder="Repite tu Password"
                    id="password2"
                    name="password2"
                >
        </div>

        <input type="submit" value="Crear Cuenta" class="formulario__submit">

    </form>

    <div class="acciones">
        <a href="/login" class="acciones__enlace">¿Ya tienes una cuenta? Inicia Sesion</a>
        <a href="/olvide" class="acciones__enlace">¿Olvidaste tu Password?</a>
    </div>

</main>