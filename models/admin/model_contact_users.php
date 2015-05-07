<?php
class Contact_users extends Model{

	private $db;

	public function __construct($db) {
	$this->db = $db;
	}

		public function get_email($newsletters, $chaine2){
	$query = $this->db->prepare("SELECT * FROM `users` WHERE `newsletter`= ? OR `newsletter` = ?");
				$query->bindValue(1, $newsletters);
				$query->bindvalue(2, $chaine2);
		try{
			$query->execute();
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll();
	}

}
$contact_users = new Contact_users($db);
?>