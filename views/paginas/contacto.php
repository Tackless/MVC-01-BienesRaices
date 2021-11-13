<main class="contenedor seccion">
    <h1 data-cy="heading-contacto">Contacto</h1>

    <?php if ($mensaje) :?>
        <p data-cy="alerta-envio-formulario" class="alerta exito"><?php echo $mensaje; ?></p>
    <?php endif; ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="/build/img/destacada3.jpg" alt="imagen Contacto">
    </picture>

    <h2 data-cy="heading-formulario">Llene el Formulario de Contacto</h2>

    <form data-cy="formulario-contacto" class="formulario" method="POST">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input data-cy="input-nombre" type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>
            
            <label for="mensaje">Mensaje</label>
            <textarea data-cy="input-mensaje" id="mensaje" cols="30" rows="10" name="contacto[mensaje]" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <label for="opciones">Vende o Compra</label>
            <select data-cy="input-opciones" id="opciones" name="contacto[tipo]" required>
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="compra">Compra</option>
                <option value="venta">Venta</option>
            </select>

            <label for="presupuesto">Presupuesto</label>
            <input data-cy="input-precio" type="number" min="0" placeholder="Tu Presupuesto" id="presupuesto" name="contacto[precio]" required>

        </fieldset>

        <fieldset>
            <legend>Contacto</legend>

            <p>Cómo desea ser contactado </p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input data-cy="forma-contacto" type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>
                
                <label for="contactar-email">E-mail</label>
                <input data-cy="forma-contacto" type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
            </div>

            <div id="contacto">

            </div>

        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>