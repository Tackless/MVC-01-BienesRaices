<?php 

namespace Controllers;

use MVC\Router;
use Model\Entrada;
use Intervention\Image\ImageManagerStatic as Image;


class EntradaController {

    public static function crear(Router $router) {
        
        $entrada = new Entrada;
        
        $errores = Entrada::getErrores();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Crea una nueva instancia
            $entrada = new Entrada($_POST['entrada']);

            /* SUBIDA DE ARCHIVOS */
            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

            // Setear la imagen
            if ($_FILES['entrada']['tmp_name']['imagen']) {
                // Realiza un resize a la imagen con intervention
                $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800,600);
                $entrada->setImagen($nombreImagen);
            }
            
            // Validar
            $errores = $entrada->validar();
            
            // Revisar que el arreglo de errores esté vacío
            if ( empty($errores) ) {

                // Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guardar la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                // Guardar en la base de datos
                $resultado = $entrada->guardar();
            }
        }

        $router->render('entradas/crear', [
            'errores' => $errores,
            'entrada' => $entrada
        ]);
    }
    
    public static function actualizar(Router $router) {
        $id = validarORedireccionar('admin');

        $entrada = Entrada::find($id);
        
        $errores = Entrada::getErrores();

        // Ejecutar código despúes de que el usuario manda el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos
            $args = $_POST['entrada'];

            // Sincroniza los atributos del formulario 
            $entrada->sincronizar($args);
            
            // Validación
            $errores = $entrada->validar();

            /* SUBIDA DE ARCHIVOS */
            // Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";
            
            // Setear la imagen
            if ($_FILES['entrada']['tmp_name']['imagen']) {
                // Realiza un resize a la imagen con intervention
                $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800,600);
                $entrada->setImagen($nombreImagen);
            }

            // Revisar que el arreglo de errores esté vacío
            if ( empty($errores) ) {
                if ($_FILES['entrada']['tmp_name']['imagen']) {
                    // Almacenar la imagen
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                $resultado = $entrada->guardar();
            }
        }
        
        $router->render('entradas/actualizar', [
            'errores' => $errores,
            'entrada' => $entrada
        ]);
    }
    
    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // Validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            
            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarTipoContenido($tipo)) {
                    $entrada = Entrada::find($id);
                    $entrada->eliminar();
                } 
            }
        }
    }
}