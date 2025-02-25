<?php
// BookController
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../services/BookService.php';

class BookController {
    private $bookService;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->bookService = new BookService($db);
    }

    // Obtener todos los libros
    public function index() {
        $result = $this->bookService->getAllBooks();
        echo json_encode($result);
    }

    // Obtener un libro por ID
    public function show($id) {
        $result = $this->bookService->getById($id);
        if ($result) {
            echo json_encode($result);
        } else {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Libro no encontrado.']);
        }
    }

    // Crear un nuevo libro
    public function store() {
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->titulo) && !empty($data->autor_id) && !empty($data->descripcion)) { // En español
            if ($this->bookService->create($data)) {
                http_response_code(201);
                echo json_encode(['mensaje' => 'Libro creado exitosamente.']);
            } else {
                http_response_code(503);
                echo json_encode(['mensaje' => 'Error al crear el libro.']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['mensaje' => 'Datos incompletos.']);
        }
    }

    // Actualizar un libro
    public function update($id) {
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->titulo) && !empty($data->autor_id) && !empty($data->descripcion)) { // En español
            $data->id = $id; // Asegurarse de que el ID se pase correctamente
            if ($this->bookService->update($data)) {
                echo json_encode(['mensaje' => 'Libro actualizado.']);
            } else {
                http_response_code(503);
                echo json_encode(['mensaje' => 'No se pudo actualizar el libro.']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['mensaje' => 'Datos incompletos.']);
        }
    }

    // Eliminar un libro
    public function destroy($id) {
        if ($this->bookService->delete($id)) {
            echo json_encode(['mensaje' => 'Libro eliminado.']);
        } else {
            http_response_code(503);
            echo json_encode(['mensaje' => 'No se pudo eliminar el libro.']);
        }
    }
}
?>
