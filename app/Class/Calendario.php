<?php 

  namespace App\Class;

  class Calendario{

    public function mesCompleto($mes){

      $meses = [
        1 => 'Janeiro', 
        2 => 'Fevereiro',
        3 => 'Março', 
        4 => 'Abril',
        5 => 'Maio', 
        6 => 'Junho',
        7 => 'Julho',
        8 => 'Agosto',
        9 => 'Setembro',
        10 => 'Outubro',
        11 => 'Novembro',
        12 => 'Dezembro',
      ];

      return $meses[$mes];
    }

    public function mesAbreviado($mes){

      $meses = [
        1 => 'Jan', 
        2 => 'Fev',
        3 => 'Mar', 
        4 => 'Abr',
        5 => 'Mai', 
        6 => 'Jun',
        7 => 'Jul',
        8 => 'Ago',
        9 => 'Set',
        10 => 'Out',
        11 => 'Nov',
        12 => 'Dez',
      ];

      return $meses[$mes];
    }

    public function diaSemana($dia){

      $diasDaSemana = [
        1 => 'Segunda-Feira', 
        2 => 'Terça-Feira',
        3 => 'Quarta-Feira', 
        4 => 'Quinta-Feira',
        5 => 'Sexta-Feira', 
        6 => 'Sábado',
        7 => 'Domingo',
      ];

      return $diasDaSemana[$dia];
    }

    public function semanaDiaMes($diaDaSemana, $dia, $mes){

      return "{$this->diaSemana($diaDaSemana)}, $dia de {$this->mesCompleto($mes)}";
    }

  }
?>