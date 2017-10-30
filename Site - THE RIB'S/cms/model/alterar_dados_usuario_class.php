<?php
/*
    Criado por: Larissa 
    Data: 25/10
*/

class AlterarDadosUsuario{
    
    public $nome;
    public $email;
    public $senha;
    public $cpf;
    public $cep;
    public $rua;
    public $numero;
    public $telefone;
    public $celular;
    public $foto;
    public $id_cidade;
    public $cidade;
    public $id_estado;
    public $estado;
    
    function __construct(){
        require_once('model/db_class.php');
        
        $conexao = new Mysql_db();
        $conexao->conectar();
    }
        
    public function SelectDadosUsuario($id){
        $sql = 'select e.*, c.*, ci.cidade from tbl_cliente_endereco as ce 
                inner join tbl_endereco as e on ce.id_endereco = e.id_endereco 
                inner join tbl_cliente as c on ce.id_cliente = c.id_cliente 
                inner join tbl_cidade as ci
                on ci.id_cidade = e.id_cidade
                where c.id_cliente = '.$id;

        if($select = mysql_query($sql)){
            while($rs = mysql_fetch_array($select)){
                
                $user = new AlterarDadosUsuario();
                
                $user->nome = $rs['nome'];
                $user->email = $rs['email'];
                $user->senha = $rs['senha'];
                $user->telefone = $rs['telefone'];
                $user->celular = $rs['celular'];
                $user->foto = $rs['foto'];
                $user->cpf = $rs['cpf'];
                $user->cep = $rs['cep'];
                $user->numero = $rs['numero'];
                $user->bairro = $rs['bairro'];
                $user->cidade = $rs['cidade'];
                $user->id_cidade = $rs['id_cidade'];
                $user->logradouro = $rs['logradouro'];
                $user->complemento = $rs['complemento'];
            }
            
            return $user;
            
        }
    
    }
      
    public function SelectCidades(){

        $sql = 'select * from tbl_cidade';
        
        if($select = mysql_query($sql)){
            
            $cont = 0;
            while($rs = mysql_fetch_array($select)){
                
                $cidade[] = new AlterarDadosUsuario();
                
                $cidade[$cont]->id_cidade = $rs['id_cidade'];
                $cidade[$cont]->cidade = $rs['cidade'];
                
                $cont++;
            }
            
            return $cidade;
            
        }
    
    }
      
    public function SelectEstados(){

        $sql = 'select * from tbl_estado';
        
        if($select = mysql_query($sql)){
            
            $cont = 0;
            while($rs = mysql_fetch_array($select)){
                
                $estado[] = new AlterarDadosUsuario();
                
                $estado[$cont]->id_estado = $rs['id_estado'];
                $estado[$cont]->estado = $rs['estado'];
                
                $cont++;
            }
            
            return $estado;
            
        }
    
    }
      
    public function UpdateDadosUsuario(){
        $id = $_GET['id'];
        
        $nome = $_POST['txtNome'];
        $email = $_POST['txtEmail'];
        $cpf = $_POST['txtCpf'];
        $telefone = $_POST['txtTelefone'];
        $celular = $_POST['txtCelular'];
        $cep = $_POST['txtCep'];
        $logradouro = $_POST['txtLogradouro'];
        $id_estado = $_POST['slct_estado'];
        $id_cidade = $_POST['slct_cidade'];
        $complemento = $_POST['txtComplemento'];
        $numero = $_POST['txtNumero'];
        $bairro = $_POST['txtBairro'];
        
        if(empty($_FILES['flFoto'])){
            $sql = 'update tbl_cliente set nome = "'.$nome.'", email = "'.$email.'", 
                cpf = "'.$cpf.'", telefone = "'.$telefone.'", celular = "'.$celular.'"
                where id_cliente = '.$id;
            
             if(mysql_query($sql)){
                $sql = "select ce.* from tbl_cliente_endereco as ce
                        inner join tbl_endereco as e
                        on ce.id_endereco = e.id_endereco
                        inner join tbl_cliente as c
                        on ce.id_cliente = c.id_cliente
                        where c.id_cliente = ".$id;
                        
                if($select = mysql_query($sql)){
                    while($rs = mysql_fetch_array($select)){
                        $id_endereco = $rs['id_endereco']; 
                    }
                    
                }
                        
                $sql="update tbl_endereco set cep = '".$cep."', 
                     bairro = '".$bairro."', numero = ".$numero.",
                     complemento = '".$complemento."',
                     logradouro = '".$logradouro."', id_cidade = ".$id_cidade." 
                     where id_endereco = ".$id_endereco;
                    
                if(mysql_query($sql)){
                    header('location:alterar_dados_usuario.php');

                }else{
                    echo $sql;
                }

             }else{
                echo $sql;
            }
            
            if(mysql_query($sql)){
                header('location:alterar_dados_usuario.php');

            }else{
                echo $sql;
            }
    
        
        }else{
            $arq = basename($_FILES['flFoto']['name']);
            $foto =  'imagens/'.$arq;
            $caminho =  '../'.$foto;

            $extArq = strtolower(substr($arq, strlen($arq)-3, 3));

            if($extArq == 'jpg' || $extArq == 'png' || $extArq == 'jpeg'){
                if(move_uploaded_file($_FILES['flFoto']['tmp_name'], $caminho)){
                    
                    $sql = 'update tbl_cliente set nome = "'.$nome.'", email = "'.$email.'", 
                            cpf = "'.$cpf.'", telefone = "'.$telefone.'", celular = "'.$celular.'",
                            foto = "'.$foto.'" where id_cliente = '.$id;
                    
                    if(mysql_query($sql)){
                        $sql = "select ce.* from tbl_cliente_endereco as ce
                                inner join tbl_endereco as e
                                on ce.id_endereco = e.id_endereco
                                inner join tbl_cliente as c
                                on ce.id_cliente = c.id_cliente
                                where c.id_cliente = ".$id;
                        
                        if($select = mysql_query($sql)){
                            while($rs = mysql_fetch_array($select)){
                                $id_endereco = $rs['id_endereco']; 
                            }
                            
                        }
                        
                        $sql="update tbl_endereco set cep = '".$cep."', 
                             bairro = '".$bairro."', numero = ".$numero.",
                             complemento = '".$complemento."',
                             logradouro = '".$logradouro."', id_cidade = ".$id_cidade." 
                             where id_endereco = ".$id_endereco;
                        
                        if(mysql_query($sql)){
                            header('location:alterar_dados_usuario.php');

                        }else{
                            echo $sql;
                        }

                    }else{
                        echo $sql;
                    }
                    
                }else{
                    echo 'ERROO';
                }

            }else{
                echo "<script> alert('Erro na extensão do arquivo'); </script>";
            }
            
        }
        
    }
    
    public function VerificarSenha($atual){
        $id = $_GET['id'];
        $sql = 'select * from tbl_cliente where id_cliente = '.$id;
        
        if($select = mysql_query($sql)){
            while($rs = mysql_fetch_array($select)){
                if($rs['senha'] == $atual){
                    return true;
                    
                }else{
                    return false;
                    
                }
            }
            
        }else{
            echo 'Erro de identificação do usuário';
        }
        
    }   
    
    public function UpdateSenha($nova_senha){
        $id = $_GET['id'];
        $sql = "update tbl_cliente set senha = '".$nova_senha."' where id_cliente = ".$id;
        
        if(mysql_query($sql)){
            header('location:alterar_dados_usuario.php');
        
        }else{
            echo $sql;
            
        }
        
        
    }  
    
    
}


?>