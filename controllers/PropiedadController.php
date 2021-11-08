<?php 

namespace Controllers;
use MVC\Router;


class PropiedadController {

    public static function index(Router $router) {
        
        $router->render('propiedades/admin', [
            'mensaje' => 'desde la vista'
        ]);
    }

    public static function crear() {
        echo 'crear';
    }
    
    public static function actualizar() {
        echo 'actualizar propiedad';
    }
}