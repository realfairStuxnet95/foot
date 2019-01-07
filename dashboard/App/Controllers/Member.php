<?php 

class Member extends Execute{

	public function saveMember($fname,$lname,$phone,$email,$password){
		$names=$fname.' '.$lname;
		$array=array("names"=>$names,"phone"=>$phone,"password"=>$password,"email"=>$email,'status'=>'PENDING');
		return $this->multi_insert(Tables::users(),$array);
	}
}
$member=new Member();
?>