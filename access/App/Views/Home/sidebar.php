<?php 
require 'App/Views/Utils/auth.php';
$user_id=$_SESSION['user_id'];
$user_names=$_SESSION['user_names'];
$user_type=(int)$_SESSION['user_type'];
if($user_type==1){
    include 'App/Views/Menu/Admin.menu.php';
}elseif($user_type==2){
	include 'App/Views/Menu/Chief.menu.php';
}
?>