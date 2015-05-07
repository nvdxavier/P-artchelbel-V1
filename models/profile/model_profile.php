<?php

class Profile{

	private $db;

	public function __construct($db) {
	    $this->db = $db;
	}	

	public function user_exists($username) {
	
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

		} catch (PDOException $e){
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


    public function fetch_info($what, $field, $value){

		$allowed = array('id_users', 'username', 'first_name', 'last_name', 'gender', 'bio', 'email', 'newsletter', 'password'); // I have only added few, but you can add more. However do not add 'password' eventhough the parameters will only be given by you and not the user, in our system.
		if (!in_array($what, $allowed, true) || !in_array($field, $allowed, true)) {
		    throw new InvalidArgumentException;
		}else{
		
			$query = $this->db->prepare("SELECT $what FROM `users` WHERE $field = ?");

			$query->bindValue(1, $value);

			try{

				$query->execute();
				
			} catch(PDOException $e){

				die($e->getMessage());
			}

			return $query->fetchColumn();
		}
	}



}
$profile = new Profile($db);
?>