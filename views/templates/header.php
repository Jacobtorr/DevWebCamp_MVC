<header class="header">
    <div class="header__contenedor">
        <nav class="header__navegacion">

            <?php if(isAuth()) { ?>
                <a href="<?php echo isAdmin() ? '/admin/dashboard' : 'finalizar-registro'; ?>" class="header__enlace">Administrar</a>
                <form action="/logout" class="header__form" method="POST">
                    <input type="submit" value="Cerrar Sesion" class="header__submit">
                </form>

            <?php } else {?>
                <a href="/registro" class="header__enlace">Registro</a>
                <a href="/login" class="header__enlace">Iniciar Sesion</a>
                <?php } ?>
        </nav>

        <div class="header__contenido">
            <a href="/">
                <h1 class="header__logo">&lt;DevWebCamp/&gt;</h1>
            </a>

            <p class="header__texto">Octubre 5-6 - 2023</p>
            <p class="header__texto header__texto--modalidad">En linea - Presencial</p>

            <a href="/registro" class="header__boton">Comprar Pase</a>
        </div>
    </div>
</header>

<div class="barra">
    <div class="barra__contenido">
        <a href="/">
        <h2 class="barra__logo">&lt;DevWebCamp/&gt;</h2>
        </a>
        <nav class="navegacion">
            <a href="/devwebcamp" class="navegacion__enlace <?php echo pagina_actual('/devwebcamp') ? 'navegacion__enlace--actual' : ''; ?>">Evento</a>
            <a href="/paquetes" class="navegacion__enlace <?php echo pagina_actual('/paquetes') ? 'navegacion__enlace--actual' : ''; ?>">Paquetes</a>
            <a href="/workshops-conferencias" class="navegacion__enlace <?php echo pagina_actual('/workshops-conferencias') ? 'navegacion__enlace--actual' : ''; ?>">Workshops / Conferencias</a>
            <a href="/registro" class="navegacion__enlace <?php echo pagina_actual('/registro') ? 'navegacion__enlace--actual' : ''; ?>">Comprar Pase</a>
        </nav>
    </div>
</div>