<?php



  class Cardapio{

    public $idCategoria;
    public $categoria;
    public $idPrato;
    public $prato;
    public $titulo;
    public $preco;
    public $descricao;
    public $imagem;

    public function __construct(){

        require_once('model/db_class.php');

        $conexao_db = new Mysql_db();
        $conexao_db->conectar();

    }

    public function SelectCategorias(){
      $sql = "select * from tbl_tipo_prato";
      if(mysql_query($sql)){

        $cont = 0;
        $select = mysql_query($sql);
        while($rs=mysql_fetch_array($select)){
            $categorias[] = new Cardapio();

            $categorias[$cont]->idCategoria = $rs['id_tipo_prato'];
            $categorias[$cont]->tituloCategoria = $rs['nome'];

            $cont++;
        }
        return $categorias;

      }else{
        return false;
      }

    }

    public function SelectPratosCategoria($id){
        $sql = "select prod.*, img.*
                from tbl_produto_tipo_prato as ptp
                inner join tbl_produto as prod
                on prod.id_produto = ptp.id_produto
                inner join tbl_tipo_prato as tp
                on tp.id_tipo_prato = ptp.id_tipo_prato
                inner join tbl_produto_img as pi
                on pi.id_produto = prod.id_produto
                inner join tbl_imagem as img
                on img.id_imagem = pi.id_img
                where tp.id_tipo_prato = ".$id." order by tp.id_tipo_prato";
        
        if($select = mysql_query($sql)){
            $pratos = false;
            $cont = 0;
           
            while($rs = mysql_fetch_array($select)){
                $pratos[] = new Cardapio();
                
                $pratos[$cont]->titulo = $rs['nome'];
                $pratos[$cont]->imagem = $rs['url'];
                $pratos[$cont]->preco = $rs['preco'];
                $pratos[$cont]->descricao = $rs['descricao'];

                $cont++;
            }
            return $pratos;

        }else{
            return false;
        }
        
        
    }

    public function SelectUmPratoCategoria($id){
        $sql = "select * from tbl_tipo_prato;
                select prod.*, img.url from tbl_tipo_prato as tp
                inner join tbl_produto as prod
                on tp.id_tipo_prato = prod.tipo_produto 
                inner join tbl_produto_img as pi
                on pi.id_produto = prod.id_produto
                inner join tbl_imagem as img
                on img.id_imagem = pi.id_img
                where prod.tipo_produto = ".$id." order by tp.id_tipo_prato limit 1";
        if(mysql_query($sql)){

        $cont = 0;
        $select = mysql_query($sql);
        while($rs=mysql_fetch_array($select)){
            $categorias[] = new Contato();

            $categorias[$cont]->titulo = $rs['nome'];
            $categorias[$cont]->preco = $rs['preco'];
            $categorias[$cont]->imagem = $rs['imagem'];
            $categorias[$cont]->descricao = $rs['descricao'];

            $cont++;
        }
        return $categorias;

        }else{
            return false;
        }
        
    }

  }



?>
