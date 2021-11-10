<?php 

namespace Controllers;

use Model\Propiedad;
use MVC\Router;

class PaginasController {
    public static function index(Router $router) {
        
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }
    
    public static function nosotros(Router $router) {
        

        $router->render('paginas/nosotros', []);
    }
    
    public static function propiedades(Router $router) {
        debuguear('Desde propiedades');
    }
    
    public static function propiedad(Router $router) {
        debuguear('Desde propiedad');
    }
    
    public static function blog(Router $router) {
        debuguear('Desde blog');
    }
    
    public static function entrada(Router $router) {
        debuguear('Desde entrada');
    }
    
    public static function contacto(Router $router) {
        debuguear('Desde contacto');
    }
    
}