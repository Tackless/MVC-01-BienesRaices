<main class="contenedor seccion">
    <h1>Actualizar Registro Vendedor</h1>
    <a href="/admin/index.php" class="boton-verde">Volver</a>
    
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>    
    <?php endforeach; ?>

    <form class="formulario" method="POST">
        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Guardar Cambios" class="boton-verde">
    </form>
</main>