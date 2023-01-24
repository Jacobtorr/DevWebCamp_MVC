<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
    <p class="devwebcamp__descripcion"> Conoce la conferencia mas importante de Latinoamerica</p>

    <div class="devwebcamp__grid">
        <div class="devwebcamp__imagen" <?php aos_animacion(); ?>>
            <picture>
                <img loading="lazy" width="200" height="300" src="build/img/sobre_devwebcamp.jpg" alt="Imagen DevWebCamp">
                <source srcset="buiid/img/sobre_devwebcamp.avif" type="image/avif">
                <source srcset="buiid/img/sobre_devwebcamp.webp" type="image/webp">
            </picture>
        </div>

        <div class="devwebcamp__contenido" <?php aos_animacion(); ?>>

            <p class="devwebcamp__texto">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error consectetur aspernatur in vitae, molestias omnis aperiam laboriosam nam autem ratione, libero excepturi. Voluptate nesciunt veniam eligendi exercitationem totam. Doloribus, nisi.</p>
            
            <p class="devwebcamp__texto">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Error consectetur aspernatur in vitae, molestias omnis aperiam laboriosam nam autem ratione, libero excepturi. Voluptate nesciunt veniam eligendi exercitationem totam. Doloribus, nisi.</p>
        </div>
    </div>
</main>