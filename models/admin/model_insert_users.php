<?php
class Insert_users extends General{

	private $db;

	public function __construct($db) {
	$this->db = $db;
	}

	public function checkid($id) {
	$query =$this->db->prepare("SELECT `id_users` FROM `users` WHERE `id_users` = ?");
	$query->bindValue(1, $id);
			try{
				$query->execute();
				$row = $query->fetchColumn();
				if($row == $id){
				return false;	
				}else{
				return true;
				}
			}catch(PDOException $e){
			die($e->getMessage());
			}
	}

	public function email_exists($email) {

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
		} catch (PDOException $e){
		die($e->getMessage());
		}
	}


	public function create_user($username, $first_name, $last_name, $gender, $bio, $image_location, $password, $email, $confirmed, $generated_string, $newsletter, $address, $town, $postal_code, $country, $phone_number){
	global $bcrypt;

	$time 		= time();
	$ip 		= $_SERVER['REMOTE_ADDR']; // getting the users IP address
	$email_code = $email_code = uniqid('code_',true); // Creating a unique string.
	
	$password   = $bcrypt->genHash($password);

	$query 	= $this->db->prepare("INSERT INTO `users` (`username`, `first_name`, `last_name`, `gender`, `bio`, `image_location`, `password`, `email`, `email_code`, `time`, `confirmed`, `generated_string`, `ip`, `newsletter`,`address`, `town`, `postal_code`, `country`, `phone_number`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");

	$query->bindValue(1, $username);
	$query->bindValue(2, $first_name);
	$query->bindValue(3, $last_name);
	$query->bindValue(4, $gender);
	$query->bindValue(5, $bio);
	$query->bindValue(6, $image_location);
	$query->bindValue(7, $password);
	$query->bindValue(8, $email);
	$query->bindValue(9, $email_code);
	$query->bindValue(10, $time);
	$query->bindValue(11, $confirmed);
	$query->bindValue(12, $generated_string);
	$query->bindValue(13, $ip);
	$query->bindValue(14, $newsletter);
	$query->bindValue(15, $address);
	$query->bindValue(16, $town);
	$query->bindValue(17, $postal_code);
	$query->bindValue(18, $country);
	$query->bindValue(19, $phone_number);
	
	 

	try{
		$query->execute();

	}catch(PDOException $e){
		die($e->getMessage());
	}	
}//fin de la fonction create_user


}
$insert_users = new Insert_users($db);
?>