<?php


/**
 *
 */
class Brinde{

  public $nome;
  public $descricao;
  public $img;
  public $min;
  public $max;
  public $id_valor_brinde;

  function __construct(){
    require_once('model/db_class.php');

    $conexao = new Mysql_db();
    $conexao->conectar();

  }

public function InserirBrinde(){

  $sql = "insert into tbl_brinde(descricao,img,nome_brinde,id_valor_brinde)";
  $sql = $sql."values('".$this->descricao."','".$this->img."','".$this->nome."')";

  if(mysql_query($sql)){
    return true;
  }else{
    return false;
  }


}


public function ListarValor(){
  $sql = "select * from tbl_valores_brindes";
  if($select=mysql_query($sql)){
    $contador = 0;
    $lista;
    while($rs=mysql_fetch_array($select)){
      $brinde= new Brinde();
      $brinde->id_valor_brinde = $rs['id_valor_brinde'];
      $brinde->min = $rs['valor_min'];
      $brinde->max = $rs['valor_max'];
      $lista[$contador] = $brinde;
      $contador ++;
    }
    return $lista;

  }else{
    return false;
  }


}














}














 ?>
