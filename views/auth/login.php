<main class="contenedor seccion  contenido-centrado">
    <h1 data-cy="heading-login">Iniciar Sesión</h1>

    <?php foreach ($errores as $error): ?>
        <div data-cy="alerta-login" class="alerta error"><?php echo $error; ?></div>
    <?php endforeach; ?>

    <form data-cy="formulario-login" method="POST" class="formulario">
        <fieldset>
            <legend>Email y Password</legend>
            
            <label for="email">E-mail</label>
            <input name="email" type="email" placeholder="Tu E-mail" id="email" required>
            
            <label for="password">Password</label>
            <input name="password" type="password" placeholder="Tu Password" id="password" required>

        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton-verde">
    </form>
</main>