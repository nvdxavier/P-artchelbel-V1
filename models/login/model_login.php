<?php
require_once('core/init.php');
class Login extends Model{

	private $db;

	public function __construct($db) {
	$this->db = $db;
	}

	public function user_exists($username){
	
		$query = $this->db->prepare("SELECT COUNT(`id_users`) FROM `users` WHERE `username`= ?");
		$query->bindValue(1, $username);	
		try{
			$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){
			return true;
			}else{
			return false;
			}

		}catch (PDOException $e){
		die($e->getMessage());
		}
	}


	public function email_confirmed($username) {

		$query = $this->db->prepare("SELECT COUNT(`id_users`) FROM `users` WHERE `username`= ? AND `confirmed` = ?");
		$query->bindValue(1, $username);
		$query->bindValue(2, 1);
		
		try{		
			$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){
			return true;
			}else{
			return false;
			}

		}catch(PDOException $e){
		die($e->getMessage());
		}
	}


	public function login($username, $password) {

		global $bcrypt;  // Again make get the bcrypt variable, which is defined in init.php, which is included in login.php where this function is called

		$query = $this->db->prepare("SELECT `password`, `id_users` FROM `users` WHERE `username` = ?");
		$query->bindValue(1, $username);

		try{			
			$query->execute();
			$data 				= $query->fetch();
			$stored_password 	= $data['password']; // stored hashed password
			$id   				= $data['id_users']; // id of the user to be returned if the password is verified, below.
			
			if($bcrypt->verify($password, $stored_password) === true){ // using the verify method to compare the password with the stored hashed password.
			return $id;	// returning the user's id.
			}else{
			return false;	
			}

		}catch(PDOException $e){
		die($e->getMessage());
		}	
	}

	public function userdata($id){

		$query = $this->db->prepare("SELECT * FROM `users` WHERE `id_users`= ?");
		$query->bindValue(1, $id);

		try{
			$query->execute();
			return $query->fetch();
		}catch(PDOException $e){
		die($e->getMessage());
		}
	}

}
$login = new Login($db);
?>