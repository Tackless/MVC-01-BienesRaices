<?php 
    
if (!isset($_SESSION)) {
    session_start();    
}
$auth = $_SESSION['login'] ?? false;
if (!isset($inicio)) {
    $inicio = false;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Proyect with MVC">
    <link rel="shortcut icon" href="/public/build/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/build/css/app.css">
    <title>Bienes Raices</title>
</head>
<body>
    <header class="header <?php echo ($inicio) ? 'inicio' : '' ?> ">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img height="50" src="/build/img/logo.svg" alt="Logo de Bienes Raices">
                </a>
                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono menu resposively">
                </div>
                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" alt="icono dark-mode" class="dark-mode-boton">
                    <nav data-cy="navegacion-header" class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Propiedades</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if ($auth) { ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php } else { ?>
                            <a href="/login">Iniciar Sesión</a>
                        <?php }; ?>
                    </nav>    
                </div>
            </div>
            <?php echo $inicio ? "<h1 data-cy=\"heading-sitio\">Venta de Casas y Departamentos Exclusivos de Lujo</h1>" : '';?>
        </div>
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav data-cy="navegacion-footer" class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Propiedades</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>
        <p data-cy="copyright" class="copyright">Todos los derechos reservados <a href="https://github.com/Tackless">Donovan Eliosa</a> <?php echo date('Y'); ?> &copy;</p>
    </footer>
    <script src="/build/js/bundle.min.js"></script>
</body>
</html>