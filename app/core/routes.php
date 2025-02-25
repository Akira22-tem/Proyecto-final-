<?php
// Incluir el archivo del enrutador
require_once __DIR__ . '/Router.php';  // Asegúrate de poner la ruta correcta al archivo Router.php

// Crear una instancia del Router
$router = new Router();

// Ruta para la página principal (raíz)
$router->add('GET', '/', function() {
    include __DIR__ . '/../views/home.php';  // Cambia la ruta a tu vista HTML/PHP
});

// Rutas para libros
$router->add('GET', '/libros', function() {
    $controller = new BookController();
    $controller->index();
});

$router->add('GET', '/libros/:id', function($id) {
    $controller = new BookController();
    $controller->show($id);
});

$router->add('POST', '/libros', function() {
    $controller = new BookController();
    $controller->store();
});

$router->add('PUT', '/libros/:id', function($id) {
    $controller = new BookController();
    $controller->update($id);
});

$router->add('DELETE', '/libros/:id', function($id) {
    $controller = new BookController();
    $controller->destroy($id);
});

// Rutas para autores
$router->add('GET', '/autores', function() {
    $controller = new AuthorController();  // Crear un AuthorController similar a BookController
    $controller->index();
});
