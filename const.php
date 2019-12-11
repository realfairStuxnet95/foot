<?php 

define("SERVER", $_SERVER['SERVER_NAME']);
$root='';
if(SERVER=='localhost'){
	$root=$_SERVER['DOCUMENT_ROOT'].'/access/';
}else{
	$root=$_SERVER['DOCUMENT_ROOT'].'/access/';
}

define("ROOT_URL", $root);
?>