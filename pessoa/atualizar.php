<?php
 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// includes dos arquivos de conexão e pessoa
include_once '../config/db.php';
include_once '../objeto/Pessoa.php';
include_once 'testeUp.html';
 
// instanciando e inicializando objetos 
$database = new Db();
$db = $database->getConnection();
 
$pessoa = new Pessoa($db);
 
// get nos dados postados em testeUp.html
$data = json_decode(file_get_contents("testeUp.html", true));
 
// setando id do registro de pessoa que será atualizado
$pessoa->id = $data->id;

// setando o novo valor do atributo de pessoa
$pessoa->nome = $data->nome;
 
// atualizando o objeto pessoa
if ($pessoa->atualizar()) {
    echo '{';
    echo '"message": "Registro pessoa atualizado."';
    echo '}';
}
 
// em caso de erro
else {
    echo '{';
    echo '"message": "Registro de pessoa não atualizado."';
    echo '}';
}