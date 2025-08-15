<!-- Grilla de Eventos -->

<?php
    include_once __DIR__ . '/conferencias.php';
?>

<!-- Resumen con imagen de fondo azul -->

<section class="resumen">
    <div class="resumen__grid">
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $ponentes_total ?></p>
            <p class="resumen__texto">Speakers
        </div>
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $conferencias_total ?></p>
            <p class="resumen__texto">Conferencias
        </div>
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $workshops_total ?></p>
            <p class="resumen__texto">Workshops
        </div>
        <div class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?php echo $asistentes_total ?></p>
            <p class="resumen__texto">Asistentes
        </div>
    </div>
</section>

<!-- Grilla de ponentes -->

<section class="speakers">
    <h2 class="speakers__heading">Speakers</h2>
    <p class="speakers__descripcion">Conoce a los expertos que compartirán sus conocimientos en DevWebCamp</p>
    <div class="speakers__grid">
        <?php foreach($ponentes as $ponente): ?>
            <div class="speaker">
                <picture>
                    <source srcset="img/speakers/<?php echo $ponente->imagen ?>.webp" type="image/webp">
                    <source srcset="img/speakers/<?php echo $ponente->imagen ?>.png" type="image/png">
                    <img class="speaker__imagen" loading="lazy" width="200" height="300" src="img/speakers/<?php echo $ponente->imagen ?>.png" alt="Imagen ponente">
                </picture>
                <div class="speaker__informacion">
                    <h4 class="speaker__nombre"><?php echo $ponente->nombre . ' ' . $ponente->apellido ?></h4>
                    <p class="speaker__ubicacion"><?php echo $ponente->ciudad . ', ' . $ponente->pais ?></p>

                    <nav class="speaker-sociales">
                        <?php
                            $redes =  json_decode( $ponente->redes );
                        ?>
                        
                        <?php if(!empty($redes->facebook)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->facebook; ?>">
                                <span class="speaker-sociales__ocultar">Facebook</span>
                            </a> 
                        <?php } ?>

                        <?php if(!empty($redes->twitter)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->twitter; ?>">
                                <span class="speaker-sociales__ocultar">Twitter</span>
                            </a> 
                        <?php } ?> 

                        <?php if(!empty($redes->youtube)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->youtube; ?>">
                                <span class="speaker-sociales__ocultar">YouTube</span>
                            </a> 
                        <?php } ?> 

                        <?php if(!empty($redes->instagram)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->instagram; ?>">
                                <span class="speaker-sociales__ocultar">Instagram</span>
                            </a> 
                        <?php } ?> 

                        <?php if(!empty($redes->tiktok)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->tiktok; ?>">
                                <span class="speaker-sociales__ocultar">Tiktok</span>
                            </a> 
                        <?php } ?> 

                        <?php if(!empty($redes->github)) { ?>
                            <a class="speaker-sociales__enlace" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->github; ?>">
                                <span class="speaker-sociales__ocultar">Github</span>
                            </a>
                        <?php } ?> 
                    </nav>

                    <ul class="speaker__listado-skils">
                        <?php 
                            $tags = explode(',', $ponente->tags);
                            foreach($tags as $tag) { ?>
                            <li class="speaker__skill"><?php echo $tag ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Mapa de ubicación -->

<div id="mapa" class="mapa"> </div>

<!-- Valor de los tickets -->

<section class="boletos">
    <h2 class="boletos__heading">Boletos</h2>
    <p class="boletos__descripcion">Precios de DevWebCamp</p>

    <div class="boletos__grid">
        <div class="boleto boleto--presencial">
            <h4 class="boleto__logo">&#60;DevWebCamp/></h4>
            <h3 class="boleto__plan">Presencial</h3>
            <p class="boleto__precio">$220</p>
        </div>

        <div class="boleto boleto--virtual">
            <h4 class="boleto__logo">&#60;DevWebCamp/></h4>
            <h3 class="boleto__plan">Virtual</h3>
            <p class="boleto__precio">$60</p>
        </div>

        <div class="boleto boleto--gratis">
            <h4 class="boleto__logo">&#60;DevWebCamp/></h4>
            <h3 class="boleto__plan">Presencial</h3>
            <p class="boleto__precio">Gratis - $0</p>
        </div>
    </div>

    <div class="boleto__enlace-contenedor">
        <a href="/paquetes" class="boleto__enlace">Ver Paquetes</a>
    </div>
</section>



