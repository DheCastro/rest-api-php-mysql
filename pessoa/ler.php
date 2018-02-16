<?php
 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// includes dos arquivos de conexão e pessoa
include_once '../config/db.php';
include_once '../objeto/Pessoa.php';
 
// instanciando e inicializando objetos
$database = new Db();
$db = $database->getConnection();
 
$pessoa = new Pessoa($db);
 
// query pessoa
$stmt = $pessoa->ler();
$num = $stmt->rowCount();
 
// checando a quantidade de registros vindos da query
if ($num > 0) {
	
    // department array
    $pessoa_arr = array();
    $pessoa_arr["records"] = array();
 
    // recuperando conteúdo da tabela
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        
		// extraindo registro por registro do while
        extract($row);
        $pessoa_item = array(
            "id" => $row['pessoa_id'],
            "nome" => $row['pessoa_nome']
        );
		
		//adicionando objeto pessoa no array
        array_push($pessoa_arr["records"], $pessoa_item);
    }
    echo json_encode($pessoa_arr);
} else {
    echo json_encode(
            array("message" => "Nenhuma pessoa encontrada.")
    );
}
?>