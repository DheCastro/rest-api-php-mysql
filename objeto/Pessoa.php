<?php
 
/**
 * Objeto Pessoa
 *
 * @author http://www.dhecastro.com.br
 */
class Pessoa {
 
    private $conn;
    private $table_name = "pessoa";
    // atributos
    public $id;
    public $nome;
 
    // construtor recebendo uma conexão
    public function __construct($db) {
        $this->conn = $db;
    }
	
	// lendo os objetos pessoa
    function ler() {
        // query select *
        $query = "SELECT p.pessoa_id, p.pessoa_nome
            FROM
                " . $this->table_name . " p
            ORDER BY
                p.pessoa_id";
				
        // prepared statement
        $stmt = $this->conn->prepare($query);
		
        // execute query
        $stmt->execute();
        return $stmt;
    }
}