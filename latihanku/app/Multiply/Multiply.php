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
namespace app\Multiply;

class Multiply extends \app\BaseClass\BaseClass{

  public function getMult($a,$b){

    $this->result=$a * $b;

    echo "Multiply of {$a} and {$b}
    is
    <span class='hasil'>
    {$this->result}
    </span>
    <br>\n";

  }


}