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
        $this->fecha = $args['fecha'] ?? '';
        $this->autor = $args['autor'] ?? '';
    }
}