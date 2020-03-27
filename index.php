<?php 
require_once("vendor/autoload.php"); //Carrega o autoload

$app = new \Slim\Slim(); //Configuração Slim

$app->config('debug', true); //Ativa o modo debug

/** Rota principal com / **/
$app->get('/', function() {
	$sql = new Hcode\DB\Sql();

	$results = $sql->select("SELECT * FROM tb_users");

	echo json_encode($results);
});

$app->run(); //Executa

 ?>