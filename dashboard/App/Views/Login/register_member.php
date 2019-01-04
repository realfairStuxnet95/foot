<?php 
if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['phone'])) {
	require '../../class_loader.php';
	$fname=$function->sanitize($_POST['fname']);
	echo $fname;
}else{
	echo "Please submit all the fields";
}
?>