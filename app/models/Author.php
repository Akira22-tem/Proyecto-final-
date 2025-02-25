<?php
/**
 * Clase Author: Representa la entidad "Autor".
 * Contiene propiedades privadas y sus respectivos getters y setters.
 */
class Author {
    // Propiedades privadas
    private $id;
    private $nombre;
    private $apellido;
    private $nacionalidad;
    private $fechaNacimiento;  // Cambié "fecha_nacimiento" a "fechaNacimiento" para consistencia.

    // Constructor opcional para inicializar propiedades
    public function __construct($nombre = null, $apellido = null, $nacionalidad = null, $fechaNacimiento = null) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nacionalidad = $nacionalidad;
        $this->fechaNacimiento = $fechaNacimiento;  // Cambié la propiedad aquí también.
    }

    // Getters y Setters

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function getNacionalidad() {
        return $this->nacionalidad;
    }

    public function setNacionalidad($nacionalidad) {
        $this->nacionalidad = $nacionalidad;
    }

    public function getFechaNacimiento() {
        return $this->fechaNacimiento;  // Cambié la propiedad aquí también.
    }

    public function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;  // Cambié la propiedad aquí también.
    }
}
?>
