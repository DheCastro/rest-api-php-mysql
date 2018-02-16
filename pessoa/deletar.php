<?php
 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// includes dos arquivos de conexão e pessoa
include_once '../config/db.php';
include_once '../objeto/Pessoa.php';
 
// instanciando e inicializando objetos 
$database = new Db();
$db = $database->getConnection();
 
$pessoa = new Pessoa($db);
 
// setando id do registro de pessoa a ser deletado
$pessoa->id = filter_input(INPUT_GET, 'id');
 
// deleta a pessoa
if ($pessoa->deletar()) {
    echo '{';
    echo '"message": "Registro pessoa deletado."';
    echo '}';
}
 
// em caso de erro
else {
    echo '{';
    echo '"message": "Registro de pessoa não deletado."';
    echo '}';
}
?>