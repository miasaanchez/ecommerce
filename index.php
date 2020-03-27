<?php 
require_once("vendor/autoload.php"); //Carrega o autoload

use \Slim\Slim; //Define o namespace da classe Slim
use \Hcode\Page; //Define o namespace da classe Page

$app = new Slim(); //Inicia a classe Slim

$app->config('debug', true); //Ativa o modo debug

/** Rota principal com / **/
$app->get('/', function() {
	
	$page = new Page(); //chama o construct e desenha na tela

	$page-setTpl("index"); // chama o templete e desenha o corpo

});

$app->run(); //Executa

 ?>