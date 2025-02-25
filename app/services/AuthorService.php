<?php
require_once __DIR__ . '/../../config/database.php';  // Incluir la clase Database
require_once __DIR__ . '/../repositories/AuthorRepository.php';  // Incluir el repositorio de Author

class AuthorService {
    
    private $db;
    private $authorRepository;

    public function __construct() {
        // Instanciar la clase Database
        $database = new Database();
        $this->db = $database->getConnection();
        // Instanciar el repositorio de autores
        $this->authorRepository = new AuthorRepository($this->db);
    }

    // Crear un autor
    public function createAuthor($nombre, $apellido, $nacionalidad, $fecha_nacimiento) {
        // Instanciar un objeto Author
        $author = new Author($nombre, $apellido, $nacionalidad, $fecha_nacimiento);
        return $this->authorRepository->create($author);
    }

    // Obtener todos los autores
    public function getAllAuthors() {
        return $this->authorRepository->readAll();  // Este método ya está correctamente implementado
    }
    

    // Obtener autor por ID
    public function getAuthorById($id) {
        return $this->authorRepository->readOne($id);
    }

    // Actualizar autor
    public function updateAuthor($id, $nombre, $apellido, $nacionalidad, $fecha_nacimiento) {
        // Instanciar un objeto Author con los nuevos datos
        $author = new Author($nombre, $apellido, $nacionalidad, $fecha_nacimiento);
        $author->setId($id);
        return $this->authorRepository->update($author);
    }

    // Eliminar autor
    public function deleteAuthor($id) {
        return $this->authorRepository->delete($id);
    }
}
?>
