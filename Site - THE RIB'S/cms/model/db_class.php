<?php
  /*
  Objetivo: Estabelecer conexão com Banco de Dados
  Data: 25/09/2017
  Autor: Marcelo Bruno
  Ultima Modificação: Hoje
  Obervações: Nada ainda
  Arquivos Relacionados: Todos os arquivos da pasta 'model'
  */


  class Mysql_db{

    public $server;
    public $user;
    public $password;


    public function __construct(){

       $this->server = "localhost";

        /* $this->server = "10.107.134.22";*/
        /*##Segunda e Quinta## $this->server = "10.107.144.35";*/
        //##Terça## $this->server = "10.107.134.4";
        /*##Quarta## $this->server = "10.107.134.64";*/
        $this->user = "root";
        $this->password = "bcd127";

    }

    public function conectar(){

        if($conexao = mysql_connect($this->server, $this->user, $this->password)){
          mysql_select_db('db_theribs');
        }else{
          echo("Erro de conexão");
          die();
        }

    }


    public function desconectar(){
      mysql_close();
    }

  }

?>
