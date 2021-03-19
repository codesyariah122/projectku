<?php
//koding senjakala cerita
//kopinya neng .... jangan lupa
//jangan panik yah neng
/*
             ****
             simple
      autoloader namespace
           inheritance
             *****
pujiermanto(codesyariah - 2019)
*/
namespace app\Substract;

class Substract extends \app\BaseClass\BaseClass{

  //Setup calculator method
  public function getSub($a,$b){

    $this->result=$a - $b;
    
    echo "Substract of {$a} and {$b}
    is
    <span class='hasil'>
    {$this->result}</span>
    <br>\n";
  }

}