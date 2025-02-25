<?php
require_once __DIR__ . '/../../config/database.php'; // Esto es correcto si estás en 'app/controllers'
require_once __DIR__ . '/../services/AuthorService.php';

/**
 * Clase AuthorController: Gestiona las peticiones HTTP relacionadas con los Autores.
 */
class AuthorController {
    private $authorService;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->authorService = new AuthorService($db); // Usamos AuthorService para gestionar autores
    }

    // Mostrar todos los autores
    public function index() {
        $result = $this->authorService->getAllAuthors();  // Cambié getAll() por getAllAuthors()
        echo json_encode($result);
    }
    

    // Mostrar un autor por su ID
    public function show($id) {
        $result = $this->authorService->getById($id); // Corregido el nombre de la clase (AuthorService)
        if ($result) {
            echo json_encode($result);
        } else {
            http_response_code(404);
            echo json_encode(['mensaje' => 'Autor no encontrado.']);
        }
    }

    // Crear un nuevo autor
    public function store() {
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->nombre) && !empty($data->biografia)) {  // Cambié los campos para autores en español
            if ($this->authorService->create($data)) {
                http_response_code(201);
                echo json_encode(['mensaje' => 'Autor creado exitosamente.']);
            } else {
                http_response_code(503);
                echo json_encode(['mensaje' => 'Error al crear el autor.']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['mensaje' => 'Datos incompletos.']);
        }
    }

    // Actualizar un autor existente
    public function update($id) {
        $data = json_decode(file_get_contents("php://input"));
        if (!empty($data->nombre) && !empty($data->biografia)) { // Cambié para incluir los campos necesarios en español
            $data->id = $id; // Añadí el id al objeto para pasarlo al servicio
            if ($this->authorService->update($data)) {
                echo json_encode(['mensaje' => 'Autor actualizado.']);
            } else {
                http_response_code(503);
                echo json_encode(['mensaje' => 'No se pudo actualizar el autor.']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['mensaje' => 'Datos incompletos.']);
        }
    }

    // Eliminar un autor
    public function destroy($id) {
        if (!empty($id)) {
            if ($this->authorService->delete($id)) {
                echo json_encode(['mensaje' => 'Autor eliminado.']);
            } else {
                http_response_code(503);
                echo json_encode(['mensaje' => 'No se pudo eliminar el autor.']);
            }
        } else {
            http_response_code(400);
            echo json_encode(['mensaje' => 'ID no proporcionado.']);
        }
    }
}
?>
