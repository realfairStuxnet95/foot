<?php 

class User extends Execute {

	//function to load all Users
	public function get_all_users(){
		$credentials=array("status",'DELETED');
		return $this->select_all(Tables::users());
	}
	public function save_user($names,$email,$phone,$category,$password){
		$array=array("email"=>$email,"password"=>$password,"names"=>$names,"phone"=>$phone,"user_type"=>$category,"status"=>'ACTIVE');
		return $this->multi_insert(Tables::users(),$array);
	}
	public function get_articles_number(){
		return $this->table_rows(Tables::users());
	}
	public function get_users_by_type($user_type){
		$credentials=array("user_type"=>$user_type);
		return $this->select_clause_order_by(Tables::users(),$credentials,'user_id',false);
	}
}
$user=new User();
?>