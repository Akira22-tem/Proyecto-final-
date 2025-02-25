<?php
/**
 * Clase Database: Se encarga de establecer la conexión con la base de datos MySQL.
 */
class Database {
    private $host = "localhost";
    private $db_name = "bd-taller";  // Nombre de la base de datos
    private $username = "root";       // Usuario de MySQL
    private $password = "";           // Contraseña de MySQL (si no tienes contraseña en local, déjalo vacío)
    public $conn;

    // Método que retorna la conexión a la base de datos
    public function getConnection(){
        $this->conn = null;
        try {
            // Intento de conexión
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->db_name}", 
                $this->username, 
                $this->password
            );
            
            // Establecer la codificación de caracteres a UTF-8
            $this->conn->exec("set names utf8");

        } catch(PDOException $exception) {
            // Manejo de excepciones con un mensaje claro
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
