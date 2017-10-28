<?php
/**
    Feito por: Larissa
    Data: 23/10/2017
**/

class ControllerCardapio{
    
    public function ListarCategorias(){
        require_once('model/cardapio_class.php');
        $cardapio_class = new Cardapio();
        $result = $cardapio_class->SelectCategorias();

        return $result;
        
    }
    
    public function ListarPratosCategoria($id){
        require_once('model/cardapio_class.php');
        $cardapio_class = new Cardapio();
        $result = $cardapio_class->SelectPratosCategoria($id);

        return $result;
        
    }
    
    public function ListarUmPratoCategoria($id){
        require_once('model/cardapio_class.php');
        $cardapio_class = new Cardapio();
        $result = $cardapio_class->SelectUmPratoCategoria($id);

        return $result;
        
    }
    
}

?>