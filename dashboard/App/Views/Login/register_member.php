<?php 
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['phone'])) {
	require $_SERVER['DOCUMENT_ROOT'].'/foot/dashboard/class_loader.php';
	$fname=$function->sanitize($_POST['fname']);
	$lname=$function->sanitize($_POST['fname']);
	$phone=$function->sanitize($_POST['phone']);
	$password=$function->sanitize($_POST['password']);
	$cpassword=$function->sanitize($_POST['cpassword']);
	$email=$function->sanitize($_POST['email']);
	$phone="+25".$phone;
	//validate inputted data
	if(strlen($fname)>=5 && strlen($lname)>=5){
		if($function->validate_phone($phone)){
			if(strlen($password)>=6){
				if($password==$cpassword){
					$save_state=$member->saveMember($fname,$lname,$phone,$email,$password);
					if($save_state){
						echo "200";
					}else{
						echo "500";
					}
				}else{
					echo "Password do not Match";
				}
			}else{
				echo "Password must be atleast 6 Characters";
			}
		}else{
			echo "Invalid Phone Format";
		}
	}else{
		echo "Please Enter Valid Names with 5 Characters atleast";
	}
}else{
	echo "Please submit all the fields";
}
?>