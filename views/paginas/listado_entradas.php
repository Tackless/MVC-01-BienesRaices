<article class="entrada-blog">
    <?php foreach ($entradas as $entrada) : ?>
    <div class="imagen">
        <img loading="lazy" src="/imagenes/<?php echo $entrada->imagen; ?>" alt="Entrada Blog">
    </div>

    <div class="texto-entrada">
        <h4><?php echo $entrada->titulo; ?></h4>
        <p class="información-meta">Escrito el <span><?php echo $entrada->fecha; ?></span> por <span><?php echo $entrada->autor; ?></span></p>
        <p><?php echo $entrada->descripcion; ?></p>
        <a data-cy="enlace-entrada" href="/entrada?id=<?php echo $entrada->id; ?>" class="boton-amarillo-block">Ver Entrada</a>
    </div>

    <?php endforeach; ?>
</article>