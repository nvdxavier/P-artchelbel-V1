<?php
class Register extends Model{

	private $db;

	public function __construct($database) {
	    $this->db = $database;
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

	public function email_exists($email){

		$query = $this->db->prepare("SELECT COUNT(`id_users`) FROM `users` WHERE `email`= ?");
		$query->bindValue(1, $email);	
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


	public function register($username, $password, $email){
		global $bcrypt; // making the $bcrypt variable global so we can use here
		$time 		= time();
		$ip 		= $_SERVER['REMOTE_ADDR']; // getting the users IP address
		$email_code = $email_code = uniqid('code_',true); // Creating a unique string.
		
		$password   = $bcrypt->genHash($password);
		$query 	= $this->db->prepare("INSERT INTO `users` (`username`, `password`, `email`, `ip`, `time`, `email_code`) VALUES (?, ?, ?, ?, ?, ?) ");

		$query->bindValue(1, $username);
		$query->bindValue(2, $password);
		$query->bindValue(3, $email);
		$query->bindValue(4, $ip);
		$query->bindValue(5, $time);
		$query->bindValue(6, $email_code);

		try{
			$query->execute();
			mail($email, 'Please activate your account', "Hello " . $username. ",\r\nThank you for registering with us. Please visit the link below so we can activate your account:\r\n\r\nhttp://www.partchelbel.com/?page=activate&email=" . $email . "&email_code=" . $email_code . "\r\n\r\n-- Partchelbel team");
		}catch(PDOException $e){
		die($e->getMessage());
		}	
	}


	public function activate($email, $email_code) {
		
		$query = $this->db->prepare("SELECT COUNT(`id_users`) FROM `users` WHERE `email` = ? AND `email_code` = ? AND `confirmed` = ?");

		$query->bindValue(1, $email);
		$query->bindValue(2, $email_code);
		$query->bindValue(3, 0);

		try{
			$query->execute();
			$rows = $query->fetchColumn();
			if($rows == 1){				
				$query_2 = $this->db->prepare("UPDATE `users` SET `confirmed` = ? WHERE `email` = ?");
				$query_2->bindValue(1, 1);
				$query_2->bindValue(2, $email);				
				$query_2->execute();
				return true;
			}else{
			return false;
			}
		} catch(PDOException $e){
		die($e->getMessage());
		}
	}


}
$register = new Register($db);
?>