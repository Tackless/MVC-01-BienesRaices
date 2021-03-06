<div class="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad) : ?>
        <div class="anuncio" data-cy="anuncio">
            <img class="imagen-propiedad" loading="lazy" src="/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio">

            <div class="contenido-anuncio">
                <h3><?php echo utf8_encode($propiedad->titulo); ?></h3>
                <p><?php echo utf8_encode($propiedad->descripcion); ?></p>
                <p class="precio">$<?php echo number_format($propiedad->precio); ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img loading="lazy" class="iconos" src="/build/img/icono_wc.svg" alt="Icono wc">
                        <p><?php echo $propiedad->wc; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" class="iconos" src="/build/img/icono_estacionamiento.svg" alt="icono_estacionamiento">
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>
                    <li>
                        <img loading="lazy" class="iconos" src="/build/img/icono_dormitorio.svg" alt="icono_dormitorio">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li> 
                </ul> 

                <a data-cy="enlace-propiedad" href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Ver Propiedad</a>
            </div> <!-- .contenido-anuncio -->
        </div> <!-- anuncio -->
    <?php endforeach; ?>
</div> <!-- .contenedor-anuncios -->