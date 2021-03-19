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
spl_autoload_register(function($class){

  $class=explode('\\',$class);

  // echo "<pre>";
  // var_dump($class);
  // echo "</pre>";

  $class=end($class);

	if($class){
	    require_once $class.'/'.$class.'.php';
	}else{
	    echo "<h1>Sory class tidak tersedia</h1>";
	}
/*
  if($class === "Profesi"){
  	require_once 'Zakat/'.$class.'/'.$class.'.php';
  }else{
  require_once $class.'/'.$class.'.php';
  }
*/
});


//instantiasi Base Class
use \app\BaseClass\BaseClass;
$base=new BaseClass;
// instantiasi Zakat profesi
//use \app\Zakat\Profesi\Profesi;
//$zakat=new Profesi;

// style
use \app\Style\Style;
$style = new Style;

//Instantiasi kalkulator masbro
use \app\Add\Add;
use \app\Substract\Substract;
use \app\Multiply\Multiply;
use \app\Divide\Divide;
use \app\Modulus\Modulus;
use \app\GanjilGenap\GanjilGenap;

$add=new Add;
$sub=new Substract;
$mult=new Multiply;
$div=new Divide;
$mod=new Modulus;
$x=new GanjilGenap;
