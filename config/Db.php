<?php
 
class Db {
 
    private $host = "localhost";
    private $db_name = "apirestphp";
    private $username = "root";
    private $password = "";
    public $conn;
 
    // retorna uma conexão ao banco
    public function getConnection() {
        $this->conn = null;
 
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Erro de conexão com o banco de dados: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
 
}
 
?>