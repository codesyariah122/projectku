<?php  

date_default_timezone_set('Asia/Jakarta');
session_start();
$con = mysqli_connect('mysql', 'root', 'root', 'rumahsakit');

// connection
if(mysqli_connect_error()){
	echo mysqli_connect_error();
}

function base_url($url = null){
	$base_url = "http://localhost/rumahsakit";
	if($url !== null){
		return $base_url ."/". $url;
	}else{
		return $base_url;
	}
}

?>