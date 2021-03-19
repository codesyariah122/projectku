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
namespace app\Divide;

class Divide extends \app\BaseClass\BaseClass{

  public function getDiv($a,$b){

    $this->result=$a / $b;

    echo "Divide of {$a} and {$b}
    is
    <span class='hasil'>
    {$this->result}
    </span>
    <br>\n";
  }


}