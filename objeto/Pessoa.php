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
	
	// criar objeto pessoa
    function criar() {
		
        // query insert
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                pessoa_nome=:nome";
				
        // prepared statement
        $stmt = $this->conn->prepare($query);
		
        // higienização de caracteres especiais
        $this->nome = htmlspecialchars(strip_tags($this->nome));
 
        // bind de parâmetros
        $stmt->bindParam(":nome", $this->nome);
 
        // execute query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
	
	// atualizar o objeto pessoa
    function atualizar() {
		
        // query update
        $query = "UPDATE
                " . $this->table_name . "
            SET
                pessoa_nome = :nome
            WHERE
                pessoa_id = :id";
 
        // prepared statement
        $stmt = $this->conn->prepare($query);
 
        // higienização de caracteres especiais
        $this->nome = htmlspecialchars(strip_tags($this->nome));
        $this->id = htmlspecialchars(strip_tags($this->id));
 
        // bind de parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':id', $this->id);
 
        // execute query
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}