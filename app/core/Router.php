<?php
/**
 * Clase Router: Permite mapear rutas a funciones o callbacks.
 * Se encarga de despachar la petición según el método HTTP y la URI.
 */
class Router {
    private $routes = [];

    // Agregar rutas con método (GET, POST, etc.), ruta y función de callback
    public function add($method, $route, $callback) {
        $route = $this->convertRoute($route); // Convertir las rutas dinámicas
        $this->routes[] = [
            'method'   => strtoupper($method),
            'route'    => $route,
            'callback' => $callback
        ];
    }

    public function dispatch($method, $uri) {
        // Imprimir la URI solicitada para depurar
        echo "URI solicitada: $uri<br>";
        
        // Recorrer las rutas registradas
        foreach ($this->routes as $route) {
            echo "Comparando con ruta: {$route['route']}<br>";
        
            // Verificar que el método HTTP también coincida
            if (strtoupper($method) == $route['method'] && preg_match($route['route'], $uri, $matches)) {
                // Si coincide, llamamos a la función del controlador pasando el id (o los parámetros) como argumentos
                echo "Ruta encontrada: {$route['route']}<br>";
                call_user_func_array($route['callback'], array_slice($matches, 1)); // Esto pasa los parámetros
                return;
            }
        }
        
        echo "No se encontró la ruta<br>";
        echo json_encode(["message" => "Not Found"]);
    }

    private function convertRoute($route) {
        // Reemplazamos los parámetros dinámicos :id por una expresión regular
        $route = preg_replace('/\:[a-zA-Z0-9_]+/', '([a-zA-Z0-9_-]+)', $route);
        
        // Añadimos correctamente los delimitadores para la expresión regular (comienza y termina en `#`)
        return "#^$route$#";
    }
}
?>
