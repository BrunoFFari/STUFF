<?php
/*
    Feito por: Larissa
    Data: 26/10
*/

class ControllerAlterarDadosUsuario{
 
    public function ListarDadosUsuario($id){
        $dados_class = new AlterarDadosUsuario();
        $rs = $dados_class->SelectDadosUsuario($id);
        
        return $rs;
    }
    
    public function AlterarDadosUsuario(){
        $dados_class = new AlterarDadosUsuario();
        $dados_class->UpdateDadosUsuario();
       
        
    }
    
    public function ListarCidades(){
        $dados_class = new AlterarDadosUsuario();
        $result = $dados_class->SelectCidades();
       
        return $result;
    }
    
    public function ListarEstados(){
        $dados_class = new AlterarDadosUsuario();
        $result = $dados_class->SelectEstados();
       
        return $result;
    }
    
    public function AlterarSenha(){
        $dados_class = new AlterarDadosUsuario();
       
        $atual = $_POST['txtAtual'];
        $nova = $_POST['txtNova'];
        $confirmar = $_POST['txtRepetir'];
        
        $rs = $dados_class->VerificarSenha($atual);
        
        if($rs == true){
            if($nova == $confirmar){
                $dados_class->UpdateSenha($nova);
                echo 'Senha alterada com sucesso';
            }
            
        }else{
            header('alterar_dados_usuario.php?Erro=senha-incorreta');
        }
        
        
    }
    
    
    
}


?>