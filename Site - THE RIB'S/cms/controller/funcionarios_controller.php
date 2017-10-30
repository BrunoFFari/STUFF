<?php
/**
    feito por: Larissa
    Data: 29/10/2017

**/

class ControllerFuncinarios{
    
    public function CadastrarFuncionario(){
        require_once('model/funcionarios_class.php');
        $funcionario_class = new Funcionarios();
        $funcionario_class->InsertFuncionario();
        
    }
    
    public function ListarFuncionarios(){
        require_once('model/funcionarios_class.php');
        $funcionario_class = new Funcionarios();
        $rs = $funcionario_class->SelectFuncionario();
        
        return $rs;
        
    }
    
    public function EditarFuncionario(){
        require_once('model/funcionarios_class.php');
        $funcionario_class = new Funcionarios();
        $funcionario_class->UpdateFuncionario();
        
    }
    
    public function ExcluirFuncionario(){
        require_once('model/funcionarios_class.php');
        $funcionario_class = new Funcionarios();
        $funcionario_class->DeleteFuncionario();
        
    }
    
    public function ListarFiliais(){
        require_once('model/funcionarios_class.php');
        $funcionario_class = new Funcionarios();
        $rs = $funcionario_class->SelectFiliais();
        
        return $rs;
    }
    
    public function SelecionarFuncionario($id){
        require_once('model/funcionarios_class.php');
        $funcionario_class = new Funcionarios();
        $rs = $funcionario_class->SelectFuncionarioById($id);
        
        return $rs;
    }
    
    public function ListarFuncoes(){
        require_once('model/funcionarios_class.php');
        $funcionario_class = new Funcionarios();
        $rs = $funcionario_class->SelectFuncoes();
         
        return $rs;
    }
    
}

?>