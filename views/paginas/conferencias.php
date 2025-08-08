<main class="agenda">
    <h2 class="agenda__heading"> <?php echo $titulo ?> </h2>
    <p class="agenda__descripcion">Talleres y Conferencias dictados por expertos en desarrollo web</p>

    <div class="eventos">
        <h3 class="eventos__heading">&lt;Conferencias /></h3>
        <p class="eventos__fecha">Viernes 5 de Octubre</p>
        
        <div class="eventos__listado">
            <?php foreach ($eventos['conferencias_v'] as $evento) { ?>
                <div class="evento">
                    <a href="" class="evento__hora"><?php echo $evento->hora->hora; ?></a>

                    <div class="evento__informacion">
                        <h4 class="evento__nombre"><?php echo $evento->nombre; ?></h4>

                        <div>
                            <p class="evento__informacion"><?php echo $evento->descripcion; ?></p>

                        </div>

                        <div class="evento__autor-info">
                            <picture>
                                <source srcset="/img/speakers/<?php echo $evento->ponente->imagen; ?>.webp" type="image/webp">
                                <source srcset="/img/speakers/<?php echo $evento->ponente->imagen; ?>.png" type="image/png">
                                <img loading="lazy" width="200" height="300" src="/img/speakers/<?php echo $evento->ponente->imagen; ?>.png" alt="Imagen Ponente">
                            </picture>
                            <div>
                                <p class="evento__autor-nombre"><?php echo $evento->ponente->nombre . " " . $evento->ponente->apellido; ?></p>
                                <p class="evento__autor-ciudad"><?php echo $evento->ponente->ciudad . ", " . $evento->ponente->pais; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <p class="eventos__fecha">Viernes 6 de Octubre</p>
        
        <div class="eventos__listado">

        </div>
    </div>

    <div class="eventos eventos--workshops">
        <h3 class="eventos__heading">&lt;Workshops /></h3>
        <p class="eventos__fecha">Viernes 5 de Octubre</p>
        
        <div class="eventos__listado">

        </div>

        <p class="eventos__fecha">Viernes 6 de Octubre</p>
        
        <div class="eventos__listado">

        </div>
    </div>
</main>