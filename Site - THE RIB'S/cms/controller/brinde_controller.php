<?php


/**
 *
 */
class ControllerBrinde{


  public function InserirBrinde(){
    require_once('model/brinde_class.php');
    require_once('model/imagem_class.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

      $foto = $_FILES['filefotos'];
      $nome = $_POST['txtNome'];
      $descricao = $_POST['txtDescricao'];
      $valor = $_POST['slcValor'];

      //Upload de imagem;
      $imagem = new Imagem();
      $imagem->GetUrl($foto);

      $controller_brinde = new Brinde();

      $controller_brinde->nome = $nome;
      $controller_brinde->imagem = $imagem->url;
      $controller_brinde->descricao = $descricao;
      $controller_brinde->valor = $valor;

      if($controller_brinde->InserirBrinde()){

        header('location:adm_brinde.php?sucesso=1');
      }else{
        header('location:adm_brinde.php?sucesso=0');

      }

    }




  }

  public function ListarValor(){
    require_once("model/brinde_class.php");
    $brinde = new Brinde();

    return $brinde->ListarValor();
  }


}

















 ?>
