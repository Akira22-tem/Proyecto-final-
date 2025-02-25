<?php
require_once __DIR__ . '/../../config/database.php';  // Incluir la clase Database
require_once __DIR__ . '/../repositories/BookRepository.php';  // Incluir el repositorio de Book

class BookService {
    
    private $db;
    private $bookRepository;

    public function __construct() {
        // Instanciar la clase Database
        $database = new Database();
        $this->db = $database->getConnection();
        // Instanciar el repositorio de libros
        $this->bookRepository = new BookRepository($this->db);
    }

    // Crear un libro
    public function createBook($titulo, $descripcion, $precio, $autor_id) {
        // Instanciar un objeto Book
        $book = new Book($titulo, $descripcion, $precio, $autor_id);
        return $this->bookRepository->create($book);
    }

    // Obtener todos los libros
    public function getAllBooks() {
        return $this->bookRepository->readAll();
    }

    // Obtener libro por ID
    public function getBookById($id) {
        return $this->bookRepository->readOne($id);
    }

    // Actualizar libro
    public function updateBook($id, $titulo, $descripcion, $precio, $autor_id) {
        // Instanciar un objeto Book con los nuevos datos
        $book = new Book($titulo, $descripcion, $precio, $autor_id);
        $book->setId($id);
        return $this->bookRepository->update($book);
    }

    // Eliminar libro
    public function deleteBook($id) {
        return $this->bookRepository->delete($id);
    }
}
?>
