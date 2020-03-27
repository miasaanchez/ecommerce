<?php
namespace Hcode; //Especifica o namespace onde a classe está

use Rain\Tpl; //Especifica o namespace de outra class que será utilizada

/** Cria a classe **/
class Page{

    private $tpl; //declara o $tpl como privado
    private $options = [];
    private $defaults = [
        "data" => [] //variavel para passar para o templete
    ]; //cria um atributo $defaults

    /** Cria o método mágico construct, é o primeiro método a ser executado **/
    public function __construct($opts = array()){

        $this->options = array_merge($this->defaults, $opts);//mescla o array

        $config = array(
            "tpl_dir"   => $_SERVER["DOCUMENT_ROOT"]."/views/",
            "cache_dir" => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
            "debug"     => false
        );

        Tpl::configure($config); //passa as configurações para o TPL

        $this->tpl = new Tpl; //cria o atributo da classe

        /** Cria o freach que recebe os dados data dentro o array **/
        foreach($this->options["data"] as $key => $value){
            $this->tpl->assing($key, $value); //atribui variavel que apareceram no templete
        }

        /** Desenha o templete na tela será exibido em todas as telas **/
        $this->tpl->draw("header");
    }// end metodo construct

    /** Corpo da página **/
    public function setTpl($nome, $data = array(), $returnHTML = false){
        
        /** Chama o metodo que recebe os dados data dentro o array **/
        $this->setData("data");

        /** Desenha na tela, passando o nome do templete e o return do HTML **/
        return $this->tlp->draw($name, $returnHTML);

    }// end metodo setTpl (corpo da pagina)

    /** Cria o metodo mágico destruct, é o último método a ser executado **/
    public function __destruct(){
        /** Desenha o templete na tela será exibido em todas as telas **/
        $this->tpl->draw("footer");
    }// end metodo desstruct

    /** Metodo set data **/
    private function setData($data = array()){
        
        /** Cria o freach que recebe os dados data dentro o array **/
        foreach($data as $key => $value){
            $this->tpl->assing($key, $value); //atribui variavel que apareceram no templete
        }
        
    }// end metodo setTpl (corpo da pagina)

}


?>