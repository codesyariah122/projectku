<?php
//koding kala weekend
/*
             ****
             simple
      autoloader namespace
           inheritance
             *****
pujiermanto(codesyariah - 2019)
*/
namespace app\BaseClass;

  class BaseClass{

  private $result;
  private $title;
  private $page;

  public function getSay($prop)
  {
    echo "
    <h1>Selamat Datang...</h1>
    <h4> Anda sedang berada di :<span class='hasil'> ".$prop." </span></h4>
    ";
  }

  public function getTitle($title)
  {
    $this->title=$title;
    echo $this->title;
  }

  public static function sayHallo()
  {
    BaseClass::getSay(BaseClass::class);
  }

}