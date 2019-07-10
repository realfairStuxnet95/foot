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
	///////////////////////////////// MEMBERS SECTION ////////////////////////////////////////////////////////////

	public function get_all_members(){
		$credentials=array("status",'DELETED');
		return $this->select_all(Tables::members());
	}
	//get club standings
	public function getClubsStandings(){
		$sql="SELECT * FROM ".Tables::standings()." ORDER BY points DESC";
		return $this->querying($sql);
	}
	//update club standings
	public function updateClubStandings($club_id,$points){
		$where=array("id"=>$club_id);
		$array=array("points"=>$points);
		return $this->query_update(Tables::standings(),$where,$array);
	}
	//save club fixture
	public function saveClubFixture($match_info,$avenue_info,$poster){
		$array=array("match_info"=>$match_info,"avenue_info"=>$avenue_info,"poster"=>$poster,"status"=>'ACTIVE');
		return $this->multi_insert("club_fixtures",$array);
	}
	//get club fixture
	public function getClubFixture(){
		$sql="SELECT * FROM club_fixtures WHERE status='ACTIVE' ORDER BY id DESC";
		return $this->querying($sql);
	}
	//delete match
	public function deleteMatch($match_id){
		$where=array("id"=>$match_id);
		$array=array("status"=>'TRASHED');
		return $this->query_update("club_fixtures",$where,$array);
	}
}
$user=new User();
?>