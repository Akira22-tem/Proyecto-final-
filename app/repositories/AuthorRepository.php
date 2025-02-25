<?php
// Incluir la definición de la entidad Author.
require_once __DIR__ . '/../models/Author.php';

/**
 * Clase AuthorRepository: Encapsula las operaciones CRUD en la base de datos
 * para la entidad Author.
 */
class AuthorRepository {
    private $conn;
    private $table_name = "autores";  // Cambié "authors" por "autores" para que coincida con la base de datos.

    // Constructor que recibe la conexión a la base de datos.
    public function __construct($db) {
        if ($db) {
            $this->conn = $db;
        } else {
            // Manejar el error si la conexión no fue exitosa
            echo "Error en la conexión a la base de datos.";
        }
    }
    

    // Crear un autor
    public function create(Author $author){
        $query = "INSERT INTO {$this->table_name} (nombre, apellido, nacionalidad, fecha_nacimiento) 
                  VALUES (:nombre, :apellido, :nacionalidad, :fecha_nacimiento)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $author->getNombre());  // Cambié getName() a getNombre()
        $stmt->bindParam(":apellido", $author->getApellido());  // Cambié getLastname() a getApellido()
        $stmt->bindParam(":nacionalidad", $author->getNacionalidad());
        $stmt->bindParam(":fecha_nacimiento", $author->getFechaNacimiento());
        return $stmt->execute();
    }

    // Leer todos los autores
    public function readAll() {
        $query = "SELECT * FROM {$this->table_name}";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    
        // Devolver los resultados de la consulta como un array asociativo
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

    // Actualizar un autor
    public function update(Author $author){
        $query = "UPDATE {$this->table_name} 
                  SET nombre = :nombre, apellido = :apellido, nacionalidad = :nacionalidad, fecha_nacimiento = :fecha_nacimiento 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nombre", $author->getNombre());
        $stmt->bindParam(":apellido", $author->getApellido());
        $stmt->bindParam(":nacionalidad", $author->getNacionalidad());
        $stmt->bindParam(":fecha_nacimiento", $author->getFechaNacimiento());
        $stmt->bindParam(":id", $author->getId());
        return $stmt->execute();
    }

    // Eliminar un autor
    public function delete($id){
        $query = "DELETE FROM {$this->table_name} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // Leer un autor por su ID
    public function readOne($id){
        $query = "SELECT * FROM {$this->table_name} WHERE id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}


?>
