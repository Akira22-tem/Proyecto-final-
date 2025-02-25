<?php
// Incluir el enrutador y los controladores.
require_once __DIR__ . '/../app/core/Router.php';
require_once __DIR__ . '/../app/core/routes.php';
require_once __DIR__ . '/../app/controllers/BookController.php';
require_once __DIR__ . '/../app/controllers/AuthorController.php';

$router = new Router();

// Crear instancias de los controladores
$bookController = new BookController();
$authorController = new AuthorController();

// Rutas para Libros (BookController)
$router->add('GET', '/libros', fn() => $bookController->index());
$router->add('GET', '/libros/:id', fn($id) => $bookController->show($id));
$router->add('POST', '/libros', fn() => $bookController->store());
$router->add('PUT', '/libros/:id', fn($id) => $bookController->update($id));
$router->add('DELETE', '/libros/:id', fn($id) => $bookController->destroy($id));

// Rutas para Autores (AuthorController)
$router->add('GET', '/autores', fn() => $authorController->index());
$router->add('GET', '/autores/:id', fn($id) => $authorController->show($id));
$router->add('POST', '/autores', fn() => $authorController->store());
$router->add('PUT', '/autores/:id', fn($id) => $authorController->update($id));
$router->add('DELETE', '/autores/:id', fn($id) => $authorController->destroy($id));

// Obtener la URI solicitada
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Ajustar el prefijo de la URL si tu aplicación está en un subdirectorio.
$basePath = '/proyecto/public';  // Ajusta si está en un subdirectorio, si es localhost usa solo '/'.

// Si la URI contiene el basePath, lo eliminamos.
if (strpos($uri, $basePath) === 0) {
    $uri = substr($uri, strlen($basePath));
}

// Si la URI está vacía, asignar la raíz
if ($uri == '') {
    $uri = '/';
}

// Verificar si la URI corresponde a una ruta de la API (debe devolver datos JSON).
// Aquí comprobamos si la ruta corresponde a '/libros' o '/autores' con un prefijo.
$apiRoutes = ['/libros', '/autores'];

foreach ($apiRoutes as $route) {
    if (strpos($uri, $route) === 0) {
        // Si es una solicitud para la API, despachar como antes.
        $router->dispatch($_SERVER['REQUEST_METHOD'], $uri);
        exit;  // Importante: detén la ejecución si se hace el despacho a la API.
    }
}

// Si la URI no corresponde a una ruta de la API, servir la página HTML
// Aquí deberías incluir la vista que deseas mostrar para el frontend

// Ahora se incluirían las páginas correspondientes dependiendo de la URL
if ($uri === '/gestion_autores') {
    include 'templates/header.php';
    include 'gestion_autores.php';  // Mostrar gestión de autores
    include 'templates/footer.php';
} elseif ($uri === '/gestion_libros') {
    include 'templates/header.php';
    include 'gestion_libros.php';  // Mostrar gestión de libros
    include 'templates/footer.php';
} else {
    // En caso de que la URL no sea ninguna de las anteriores, podemos cargar una vista de inicio o redirigir
    include 'templates/header.php';
    include 'home.php';  // O alguna vista por defecto
    include 'templates/footer.php';
}
?>
