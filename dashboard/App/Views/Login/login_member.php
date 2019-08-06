<?php 
if(isset($_POST['username']) && isset($_POST['password'])){
	require $_SERVER['DOCUMENT_ROOT'].'/access/class_loader.php';
	$email=$function->sanitize($_POST['username']);
	$password=$function->sanitize($_POST['password']);

	$login_state=$login->validate_login($email, $password);
	if($login_state){
		//get session data
		$sessionData=$login->session_data($email, $password);
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}
		foreach ($sessionData as $key => $value) {
			$_SESSION['user_id']=$value['user_id'];
			$_SESSION['user_names']=$value['names'];
			$_SESSION['user_type']=$value['type'];
		}
		echo "200";
	}else{
		echo "Invalid Credentials";
	}
}else{
	echo "500";
}
?>