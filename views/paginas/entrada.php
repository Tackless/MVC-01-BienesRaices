<main class="contenedor seccion contenido-centrado">
    <h1><?php echo utf8_encode($entrada->titulo);  ?></h1>

    <img loading="lazy" src="/imagenes/<?php echo $entrada->imagen; ?>" alt="Imagen de la Propiedad">
    
    <p class="información-meta">Escrito el <span><?php echo $entrada->fecha; ?></span> por <span><?php echo $entrada->autor; ?></span></p>

    <div class="resumen-propiedad">
        

        <p><?php echo utf8_encode($entrada->contenido); ?></p>
    </div>
</main>