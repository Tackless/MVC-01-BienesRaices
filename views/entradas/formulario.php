<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="entrada[titulo]" value="<?php echo sanitizar( $entrada->titulo ); ?>" placeholder="Título de la Entrada">
    
    <label for="autor">Autor:</label>
    <input type="text" id="autor" name="entrada[autor]" value="<?php echo sanitizar( $entrada->autor ); ?>" placeholder="Autor de la Entrada">
    
    <label for="imagen">Imágen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="entrada[imagen]">

    <?php if ($entrada->imagen) : ?>
        <img src="/imagenes/<?php echo $entrada->imagen ?>" class="imagen-small" alt="Imagen entrada">
    <?php endif; ?>

    <label for="descripcion">Descripción:</label>
    <input type="text" id="descripcion" name="entrada[descripcion]" value="<?php echo sanitizar( $entrada->descripcion ); ?>" placeholder="Descripción de la Entrada">
    
    <label for="contenido">Contenido:</label>
    <textarea id="descripción" name="entrada[contenido]" cols="30" rows="10"><?php echo sanitizar( $entrada->contenido ); ?></textarea>
</fieldset>