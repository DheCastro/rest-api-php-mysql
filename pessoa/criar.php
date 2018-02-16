<?php
 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// includes dos arquivos de conexão e pessoa
include_once '../config/db.php';
include_once '../objeto/Pessoa.php';
include_once 'teste.html';
 
// instanciando e inicializando objetos 
$database = new Db();
$db = $database->getConnection();
 
$pessoa = new Pessoa($db);
 
// get nos dados postados em teste.html
$data = json_decode(file_get_contents("teste.html", true));
 
// setando o nome de pessoa (o id é auto-incrementado)
$pessoa->nome = $data->nome;
 
// criando o objeto pessoa
if ($pessoa->criar()) {
    echo '{';
    echo '"message": "Registro pessoa criado."';
    echo '}';
}
 
// em caso de erro
else {
    echo '{';
    echo '"message": "Registro pessoa não foi criado."';
    echo '}';
}

?>