<?php
class Recover extends Bcrypt{

	private $db;

	public function __construct($db) {
	$this->db = $db;
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
			}catch(PDOException $e){
			die($e->getMessage());
			}
			return $query->fetchColumn();
		}
	}


	public function confirm_recover($email){

		$username = $this->fetch_info('username', 'email', $email);// We want the 'id' WHERE 'email' = user's email ($email)
		$unique = uniqid('',true);
		$random = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'),0, 10);		
		$generated_string = $unique . $random; // a random and unique string

		$query = $this->db->prepare("UPDATE `users` SET `generated_string` = ? WHERE `email` = ?");
		$query->bindValue(1, $generated_string);
		$query->bindValue(2, $email);

		try{			
			$query->execute();
			mail($email, 'Recover Password', "Hello " . $username. ",\r\nPlease click the link below:\r\n\r\nhttp://localhost/PARTCHELBEL/?page=recoverpaswd&email=" . $email . "&generated_string=" . $generated_string . "\r\n\r\n We will generate a new password for you and send it back to your email.\r\n\r\n-- Example team");		
		} catch(PDOException $e){
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



	public function change_password($user_id, $password) {

		global $bcrypt;

		$password_hash = $bcrypt->genHash($password);
		$query = $this->db->prepare("UPDATE `users` SET `password` = ? WHERE `id_users` = ?");

		$query->bindValue(1, $password_hash);
		$query->bindValue(2, $user_id);				
		try{
		$query->execute();
		return true;
		}catch(PDOException $e){
		die($e->getMessage());
		}

	}




	public function recover($email, $generated_string) {

		if($generated_string == 0){
			return false;
		}else{
			$query = $this->db->prepare("SELECT COUNT(`id_users`) FROM `users` WHERE `email` = ? AND `generated_string` = ?");
			$query->bindValue(1, $email);
			$query->bindValue(2, $generated_string);
			try{
				$query->execute();
				$rows = $query->fetchColumn();
				if($rows == 1){			
					global $bcrypt;

					$username = $this->fetch_info('username', 'email', $email); // getting username for the use in the email.
					$user_id  = $this->fetch_info('id_users', 'email', $email);// We want to keep things standard and use the user's id for most of the operations. Therefore, we use id instead of email.
			
					$charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
					$generated_password = substr(str_shuffle($charset),0, 10);

					$this->change_password($user_id, $generated_password);
					$query = $this->db->prepare("UPDATE `users` SET `generated_string` = 0 WHERE `id_users` = ?");
					$query->bindValue(1, $user_id);
					$query->execute();

					mail($email, 'Your password', "Hello " . $username . ",\n\nYour your new password is: " . $generated_password . "\n\nPlease change your password once you have logged in using this password.\n\n-Example team");

				}else{
					return false;
				}

			} catch(PDOException $e){
				die($e->getMessage());
			}
		}
	}

}
$recover = new Recover($db);
?>