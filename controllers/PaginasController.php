<?php 

namespace Controllers;

use Model\Entrada;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index(Router $router) {
        
        $propiedades = Propiedad::get(3);
        $entradas = Entrada::get(2);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio,
            'entradas' => $entradas
        ]);
    }
    
    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros', []);
    }
    
    public static function propiedades(Router $router) {

        $propiedades = Propiedad::all();
        
        $router->render('paginas/propiedades',[
            'propiedades' => $propiedades
        ]);
    }
    
    public static function propiedad(Router $router) {

        $id = validarORedireccionar('propiedades');
        
        $propiedad = Propiedad::find($id);
        
        $router->render('paginas/propiedad',[
            'propiedad' => $propiedad
        ]);
    }
    
    public static function blog(Router $router) {

        $entradas = Entrada::all();
        
        $router->render('paginas/blog',[
            'entradas' => $entradas
        ]);
    }
    
    public static function entrada(Router $router) {

        $id = validarORedireccionar('entradas_blog');

        $entrada = Entrada::find($id);
        
        $router->render('paginas/entrada', [
            'entrada' => $entrada
        ]);
    }
    
    public static function contacto(Router $router) {

        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];
            
            // Crear una instancia de PHPMailer
            $mail = new PHPMailer();

            // Configurar SMTP

            $mail->isSMTP();
            $mail->Host ='smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '222cfc42e20b12';
            $mail->Password = '3c1c172a91a7c7';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Configurar el contenido del email
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
            $mail->Subject = 'Tienes un Nuevo Mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            // Definir el contenido
            $contenido = '<html>';
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] .' </p>';

            // Envía de forma condicional algunos campos de email o teléfono
            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= '<p>Eligío ser contactado por teléfono: </p>';
                $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] .' </p>';
                $contenido .= '<p>Fecha de contacto: ' . $respuestas['fecha'] .' </p>';
                $contenido .= '<p>Hora de contacto: ' . $respuestas['hora'] .' </p>';
            } else {
                $contenido .= '<p>Eligío ser contactado por email: </p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] .' </p>';    
            }
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] .' </p>';
            $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo'] .' </p>';
            $contenido .= '<p>Presupuesto: $' . number_format($respuestas['precio'],2) .' </p>';
            
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es un texto alternativo sin HTML';

            // Enviar el email
            if ($mail->send()) {
                $mensaje = 'Mensaje Enviado Correctamente';
            } else {
                $mensaje = 'Error - El mensaje no se envió';
            }
        }
        
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
    
}