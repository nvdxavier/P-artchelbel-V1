<?php
class Settings{
	private $db;

	public function __construct($db) {
	$this->db = $db;
	}

	public function update_user($first_name, $last_name, $gender, $bio, $image_location,$phone_number, $address, $postal_code, $town, $country, $email, $id){

		$query = $this->db->prepare("UPDATE `users` SET
								`first_name`	= ?,
								`last_name`		= ?,
								`gender`		= ?,
								`bio`			= ?,
								`image_location`= ?,
								`phone_number`	= ?,
								`address`		= ?,
								`postal_code`	= ?,
								`town`			= ?,
								`country`		= ?,
								`email`			= ?
								WHERE `id_users` 		= ? 
								");

		$query->bindValue(1, $first_name);
		$query->bindValue(2, $last_name);
		$query->bindValue(3, $gender);
		$query->bindValue(4, $bio);
		$query->bindValue(5, $image_location);
		$query->bindValue(6, $phone_number);
		$query->bindValue(7, $address);
		$query->bindValue(8, $postal_code);
		$query->bindValue(9, $town);
		$query->bindValue(10, $country);
		$query->bindValue(11, $email);
		$query->bindValue(12, $id);
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}	
	}

	public function valide_newsletter($int,$email, $id){	
		$query = $this->db->prepare("UPDATE `users` SET `newsletter` = ? WHERE `email` = ? AND `id_users` = ?");
		$query->bindValue(1, $int);
		$query->bindValue(2, $email);
		$query->bindValue(3, $id);

		try{
			$query->execute();
			$username = $this->fetch_info('username', 'email', $email); 
			//return $query->fetchAll(PDO::FETCH_OBJ);
		if($int == 1){
		mail($email,'Thanks for subscribe to Loki-Salle newsletter', "Hello " . $username. ", Thank you for add the news letter. You will soon receive the latest news from location  the Loki team");		
			}
		}catch(PDOException $e){
		die($e->getMessage());
		}	
	}//fin Function valide_newsletter


	public function verifnl($username) {

		$query = $this->db->prepare("SELECT `newsletter` FROM `users` WHERE `username` = ?");
		$query->bindValue(1, $username);	
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
		return $query->fetchAll();

	}



}
$settings = new Settings($db);
?>