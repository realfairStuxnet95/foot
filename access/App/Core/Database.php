	<?php 

class Database{

	//properties
	private $server;
	private $database;
	private $user;
	private $password;

	protected function connect(){
		$this->server="localhost";
		$this->user="root";
		$this->password="";
		$this->database="foot_db";

		$conn=new mysqli($this->server,$this->user,$this->password,$this->database);

		return $conn;
	}
}
?>