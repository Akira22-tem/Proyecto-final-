<?php
class Book {

    private $id;
    private $titulo;
    private $descripcion;
    private $precio;  // Añadir el campo 'precio'
    private $autor_id;

    public function __construct($titulo, $descripcion, $precio, $autor_id) {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->autor_id = $autor_id;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getAutorId() {
        return $this->autor_id;
    }
}
?>
