<?php
/**
    feito por: Larissa
    Data: 29/10/2017

**/

class Funcionarios{
    
    public $id_filial;
    public $filial;
    public $id_funcao;
    public $funcao;
    public $id_funcionario;
    public $estado;
    public $codigo;
    public $nome;
    public $email;
    public $senha;
    public $celular;
    public $imagem;
        
    
    function __construct(){
        require_once('model/db_class.php');
        
        $conexao = new Mysql_db();
        $conexao->conectar();
    }
    
    
    public function InsertFuncionario(){

        $codigo  = $_POST['txtCodigo'];
        $id_filial = $_POST['slct_filial'];
        $id_funcao = $_POST['slct_funcao'];
        $nome = $_POST['txtNome'];
        $email = $_POST['txtEmail'];
        $senha = $_POST['txtSenha'];
        $celular = $_POST['txtCelular'];
        $img = new Funcionarios();
        $imagem = $img->CadastrarImagem();
        
        $sql = "select * from tbl_funcionario where codigo = ".$codigo;
        mysql_query($sql);
           
        if(mysql_affected_rows() > 0){
            header('location:adm_funcionarios.php?erro=codigo'); 
            
        }else{
            $sql = 'select id_funcionario from tbl_funcionario order by id_funcionario desc limit 1';

            if($select = mysql_query($sql)){
                while($rs = mysql_fetch_array($select)){
                    $id_funcionario = $rs['id_funcionario'] + 1;
                }

                $sql = "insert into tbl_funcionario 
                (id_funcionario, nome, codigo, celular, email, id_funcao, id_restaurante, senha, foto) values
                (".$id_funcionario.", '".$nome."', ".$codigo.", '".$celular."', '".$email."', ".$id_funcao.", ".$id_filial.", '".$senha."', '".$imagem."');";

                echo $sql;

                if(mysql_query($sql)){
                    header('location:adm_funcionarios.php?editar&id='.$id_funcionario);  

                }else{
                    echo $sql;
                }   
            }
        }
        
        
    }
    
    public function SelectFuncionario(){
       
        $sql = "select fcnr.*, fc.nome as funcao, res.Nome as restaurante 
                from tbl_funcionario as fcnr
                inner join tbl_funcao as fc
                on fcnr.id_funcao = fc.id_funcao
                inner join tbl_restaurante as res
                on fcnr.id_restaurante = res.id_restaurante";
        
        if($select = mysql_query($sql)){
            
            $cont = 0;
            while($rs = mysql_fetch_array($select)){
                
                $funcionario[] = new Funcionarios();
                
                $funcionario[$cont]->id  = $rs['id_funcionario'];
                $funcionario[$cont]->codigo  = $rs['codigo'];
                $funcionario[$cont]->filial = $rs['restaurante'];
                $funcionario[$cont]->funcao = $rs['funcao'];
                $funcionario[$cont]->nome = $rs['nome'];
                $funcionario[$cont]->email = $rs['email'];
                $funcionario[$cont]->senha = $rs['senha'];
                $funcionario[$cont]->celular = $rs['celular'];
                
                $cont++;
            }
            
            return $funcionario;
            
        }else{
            echo $sql;
            
        }
        
        
    }
    
    public function SelectFuncionarioById($id){
       
        $sql = "select fcnr.*, fc.nome as funcao, res.Nome as restaurante 
                from tbl_funcionario as fcnr
                inner join tbl_funcao as fc
                on fcnr.id_funcao = fc.id_funcao
                inner join tbl_restaurante as res
                on fcnr.id_restaurante = res.id_restaurante
                where fcnr.id_funcionario = ".$id;
        
        if($select = mysql_query($sql)){
            
            while($rs = mysql_fetch_array($select)){
                
                $funcionario = new Funcionarios();
                
                $funcionario->id  = $rs['id_funcionario'];
                $funcionario->codigo  = $rs['codigo'];
                $funcionario->id_filial = $rs['id_restaurante'];
                $funcionario->id_funcao = $rs['id_funcao'];
                $funcionario->nome = $rs['nome'];
                $funcionario->email = $rs['email'];
                $funcionario->senha = $rs['senha'];
                $funcionario->celular = $rs['celular'];
                $funcionario->foto = $rs['foto'];
                
            }
            
            return $funcionario;
            
        }else{
            echo $sql;
            
        }
        
        
    }
    
    public function UpdateFuncionario(){
        
        $id = $_GET['id'];
        $codigo  = $_POST['txtCodigo'];
        $id_filial = $_POST['slct_filial'];
        $id_funcao = $_POST['slct_funcao'];
        $nome = $_POST['txtNome'];
        $email = $_POST['txtEmail'];
        $senha = $_POST['txtSenha'];
        $celular = $_POST['txtCelular'];
        
        $arq = basename($_FILES['flFoto']['name']);
        
        if($arq != null ){
            
            $img = new Funcionarios();
            $imagem = $img->CadastrarImagem();

            $sql = "update tbl_funcionario set nome = '".$nome."', codigo = ".$codigo.", 
            celular = '".$celular."', email = '".$email."', id_funcao = ".$id_funcao.",
            id_restaurante = ".$id_filial.", senha = '".$senha."', foto = '".$imagem."'
            where id_funcionario = ".$id;
        
            
        }else{
            $sql = "update tbl_funcionario set nome = '".$nome."', codigo = ".$codigo.", 
            celular = '".$celular."', email = '".$email."', id_funcao = ".$id_funcao.",
            id_restaurante = ".$id_filial.", senha = '".$senha."'
            where id_funcionario = ".$id;
            
        }
        
        echo $sql;

        if(mysql_query($sql)){
               header('location:adm_funcionarios.php?editar&id='.$id); 

        }else{
            echo $sql;
        }   
    
        
        
    }
    
    public function DeleteFuncionario(){
        $id = $_GET['id'];
        $sql = "delete from tbl_funcionario where id_funcionario = ".$id;

        if(mysql_query($sql)){
               header('location:adm_funcionarios.php'); 

        }else{
            echo $sql;
        }   
        
        
    }
    
    public function SelectFiliais(){
        $sql = "select * from tbl_restaurante"; 
        
        $select = mysql_query($sql);
        
        $cont = 0;
        while($rs = mysql_fetch_array($select)){
            
            $filial[] = new Funcionarios();
            
            $filial[$cont]->id_filial = $rs['id_restaurante'];
            $filial[$cont]->filial = $rs['Nome'];
            
            $cont++;
        }
        
        return $filial;
        
    }
    
    public function SelectFuncoes(){
        $sql = "select * from tbl_funcao"; 
        
        $select = mysql_query($sql);
        
        $cont = 0;
        while($rs = mysql_fetch_array($select)){
            
            $funcao[] = new Funcionarios();
            
            $funcao[$cont]->id_funcao = $rs['id_funcao'];
            $funcao[$cont]->funcao = $rs['nome'];
            
            $cont++;
        }
        
        return $funcao;
        
    }
    
    function CadastrarImagem(){
        $arq = basename($_FILES['flFoto']['name']);
        $foto =  'imagens/'.$arq;
        $caminho =  '../'.$foto;

        $extArq = strtolower(substr($arq, strlen($arq)-3, 3));

        if($extArq == 'jpg' || $extArq == 'png' || $extArq == 'jpeg'){
            if(move_uploaded_file($_FILES['flFoto']['tmp_name'], $caminho)){
                    return $foto;
                    
            }else{
                echo "<script> alert('Erro na extensão do arquivo'); </script>";
            }
        }
    }
    
}


?>