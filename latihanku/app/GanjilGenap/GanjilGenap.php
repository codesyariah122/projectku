<?php
namespace app\GanjilGenap;

class GanjilGenap extends \app\BaseClass\BaseClass{

  public function getGanjilGenap($n=11){
    $this->result=$n;
    if($this->result % 2===0 && is_integer($this->result)):

    echo "<span class='hasil-genap'>{$this->result}</span> adalah sebuah integer Bilangan Genap";

    elseif($this->result%2===1 && is_integer($this->result)):

    echo "<span class='hasil-ganjil'>{$this->result}</span> adalah sebuah integer Bilangan Ganjil";

    else:

    echo "<span class='hasil-err'>{$this->result}</span> is string (Bukan Integer)";
    endif;
  }
}