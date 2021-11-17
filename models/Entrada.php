<?php 

namespace Model;

class Entrada extends ActiveRecord {

    protected static $tabla = 'entradas_blog';
    protected static $columnasDB = ['id', 'titulo', 'imagen', 'contenido', 'descripcion', 'fecha', 'autor'];

    public $id;
    public $titulo;
    public $imagen;
    public $contenido;
    public $descripcion;
    public $fecha;
    public $autor;

    public function __construct($args = []) {
        
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->contenido = $args['contenido'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->fecha = date('d/m/Y');
        $this->autor = $args['autor'] ?? '';
    }

    public function validar() {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }
        
        if (!$this->autor) {
            self::$errores[] = "Ingresa el Autor";
        }

        if ( strlen($this->descripcion) < 20 ) {
            self::$errores[] = "La descripcion es obligatoria y debe tener al menos 20 caracteres";
        }
        
        if ( strlen($this->contenido) < 50 ) {
            self::$errores[] = "El contenido es obligatorio y debe tener al menos 50 caracteres";
        }
    
        if (!$this->imagen) {
            self::$errores[] = 'La imagén de la propiedad es obligatoria';
        }

        return self::$errores;
    }
}