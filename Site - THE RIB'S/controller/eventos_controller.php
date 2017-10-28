<?php
/*
    Feito por:Larissa
    Data:18/10/2017

*/

class ControllerEventos{
    public function SelectEventos(){
      require_Once('model/eventos_class.php');
      $eventos_class = new Evento();
      return $eventos_class->SelectEventos();
    }
  }
?>
