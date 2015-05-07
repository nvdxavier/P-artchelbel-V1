<?php
class Manage_users extends Model{

	private $db;

	public function __construct($db) {
	$this->db = $db;
	}

	public function get_users() {

		$query = $this->db->prepare("SELECT * FROM `users` WHERE `generated_string` = 0 ORDER BY `time` DESC");
		
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}

		return $query->fetchAll(PDO::FETCH_OBJ);

	}

	public function delete_user($id){
	$query = $this->db->prepare("DELETE FROM `users` WHERE `id_users` = ? ");
	$query->bindValue(1, $id);
				try{
				$query->execute();
				return $query->fetch();
				}catch(PDOException $e){
				die($e->getMessage());
				}
	}//fin function delete_user
	

	public function admin_update_user($username, $first_name, $last_name, $email, $gender, $image_location, $password, $confirmed, $bio, $newsletter, $address, $postal_code, $town, $country, $phone_number, $id ){

			$query = $this->db->prepare("UPDATE `users` SET									
									`username`		= ?,
									`first_name`	= ?, 
									`last_name`		= ?,
									`email`			= ?,
									`gender`		= ?,
									`image_location`= ?,
									`password`		= ?,
									`confirmed`		= ?,
									`bio`			= ?,
									`newsletter`	= ?,
									`address`		= ?,
									`postal_code`	= ?,
									`town`			= ?,
									`country`		= ?,
									`phone_number`	= ? WHERE `id_users` = ?");

			$query->bindValue(1, $username);
			$query->bindValue(2, $first_name);
			$query->bindValue(3, $last_name);
			$query->bindValue(4, $email);
			$query->bindValue(5, $gender);
			$query->bindValue(6, $image_location);
			$query->bindValue(7, $password);
			$query->bindValue(8, $confirmed);
			$query->bindValue(9, $bio);
			$query->bindValue(10, $newsletter);
			$query->bindValue(11, $address);
			$query->bindValue(12, $postal_code);
			$query->bindValue(13, $town);
			$query->bindValue(14, $country);
			$query->bindValue(15, $phone_number);
			$query->bindValue(16, $id);
			
			try{
				$query->execute();
				return true;
			}catch(PDOException $e){
				die($e->getMessage());
			}	
		}

}
$manage_users = new Manage_users($db);
?>