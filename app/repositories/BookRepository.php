<?php
class BookRepository {
    
    private $conn;
    private $table_name = "libros";  // Nombre de la tabla de libros

    public function __construct($db){
        $this->conn = $db;
    }

    // Crear un libro
    public function create(Book $book) {
        $query = "INSERT INTO {$this->table_name} (titulo, descripcion, precio, autor_id) 
                  VALUES (:titulo, :descripcion, :precio, :autor_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':titulo', $book->getTitulo());
        $stmt->bindParam(':descripcion', $book->getDescripcion());
        $stmt->bindParam(':precio', $book->getPrecio());
        $stmt->bindParam(':autor_id', $book->getAutorId());
        return $stmt->execute();
    }

    // Obtener todos los libros
    public function readAll() {
        $query = "SELECT libros.id, libros.titulo, libros.descripcion, libros.precio, autores.nombre as author_name 
                  FROM libros
                  JOIN autores ON libros.autor_id = autores.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un libro por ID
    public function readOne($id) {
        $query = "SELECT libros.id, libros.titulo, libros.descripcion, libros.precio, libros.autor_id, autores.nombre as author_name 
                  FROM libros
                  JOIN autores ON libros.autor_id = autores.id
                  WHERE libros.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un libro
    public function update(Book $book) {
        $query = "UPDATE {$this->table_name} 
                  SET titulo = :titulo, descripcion = :descripcion, precio = :precio, autor_id = :autor_id 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $book->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':titulo', $book->getTitulo());
        $stmt->bindParam(':descripcion', $book->getDescripcion());
        $stmt->bindParam(':precio', $book->getPrecio());
        $stmt->bindParam(':autor_id', $book->getAutorId(), PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Eliminar un libro
    public function delete($id) {
        $query = "DELETE FROM {$this->table_name} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
