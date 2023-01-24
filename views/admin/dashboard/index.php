<h1 class="dashboard__heading"><?php echo $titulo; ?></h1>

<main class="bloques">
    <div class="bloques__grid">
        <div class="bloque">
            <h3 class="bloque__heading">Ultimos Registros</h3>

            <?php foreach($registros as $registro) {?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?php echo $registro->usuario->nombre . " " . $registro->usuario->apellido; ?>
                    </p>
                </div>

            <?php } ?>
        </div>
        <div class="bloque">
            <h3 class="bloque__heading">Ingresos</h3>

            <p class="bloque__texto--cantidad">$ <?php echo $ingresos; ?></p>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Eventos con menos lugares Disponibles </h3>

            <table class="table">
                <tbody class="table__tbody">
                    <?php foreach($menos_disponibles as $evento) {?>
                        <tr class="table__tr--dashboard-menos">
                            <td class="table__td">
                                <?php echo $evento->nombre  ?>
                            </td>
                            <td class="table__td">
                                <?php echo $evento->disponibles; ?> Disponibles
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        
        <div class="bloque">
            <h3 class="bloque__heading">Eventos con mas lugares Disponibles </h3>
            <table class="table">
                <tbody class="table__tbody">
                    <?php foreach($mas_disponibles as $evento) {?>
                        <tr class="table__tr--dashboard-mas">
                            <td class="table__td">
                                <?php echo $evento->nombre  ?>
                            </td>
                            <td class="table__td">
                                <?php echo $evento->disponibles; ?> Disponibles
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>