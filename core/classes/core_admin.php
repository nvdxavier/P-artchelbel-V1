<?php
class Admin extends Model{

	private $db;

	public function __construct($db) {
	$this->db = $db;
	}


	public function login_admin($username, $password) {

		global $bcrypt;  // Again make get the bcrypt variable, which is defined in init.php, which is included in login.php where this function is called

		$query = $this->db->prepare("SELECT `password`, `id_users` FROM `users` WHERE `username` = ?");
		$query->bindValue(1, $username);

		try{
			$query->execute();
			$data 				= $query->fetch();
			$stored_password 	= $data['password']; // stored hashed password
			$id   				= $data['id_user']; // id of the user to be returned if the password is verified, below.
			
			if($bcrypt->verify($password, $stored_password) === true){ // using the verify method to compare the password with the stored hashed password.
			return $id;	// returning the user's id.
			}else{
			return false;
			}

		}catch(PDOException $e){
		die($e->getMessage());
		}	
	}



public function is_admin($user_id){
	$user_id = (int)$user_id;
	$query = $this->db->prepare("SELECT COUNT('id_users') FROM `users` WHERE `id_users` = $user_id AND `generated_string` = 1" );
	//return(mysql_result(mysql_query("SELECT COUNT('id') FROM `users` WHERE `id` = $user_id AND `generated_string` = 1"), 0) == 1) ? true : false;
	$query->bindValue(1, $user_id);
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
}//fin function is_admin


public function admin_exists($username){
	
		$query = $this->db->prepare("SELECT COUNT(`id_user`) FROM `admin` WHERE `username`= ?");
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


	public function adminemail_confirmed($username) {

		$query = $this->db->prepare("SELECT COUNT(`id_user`) FROM `admin` WHERE `username`= ? AND `level` = ?");
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




}

?>