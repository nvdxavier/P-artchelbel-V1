<?php
class Manage_product{
	private $db;

		public function __construct($db) {
		$this->db = $db;
		}

	public function get_items(){
	$query = $this->db->prepare("SELECT * FROM `products` ORDER BY `date` DESC");
		try{
			$query->execute();
			
		}catch(PDOException $e){
			die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_OBJ);
	}


	public function admin_update_product($title, $description, $price, $date, $amount, $category, $sprice, $id_product){
			$query = $this->db->prepare("UPDATE `products` SET
									`title`			= ?,
									`description`	= ?,
									`price`			= ?,
									`date`			= ?,
									`amount`		= ?,
									`category`		= ?,
									`special_price`	= ?
									WHERE `id_product` = ?");
			$query->bindValue(1, $title);
			$query->bindValue(2, $description);
			$query->bindValue(3, $price);
			$query->bindValue(4, $date);
			$query->bindValue(5, $amount);
			$query->bindValue(6, $category);
			$query->bindValue(7, $sprice);
			$query->bindValue(8, $id_product);
			
			try{
				$query->execute();
				return true;		
			}catch(PDOException $e){
				die($e->getMessage());
			}	
		}

	public function delete_product($id)
	{
	$query = $this->db->prepare("DELETE FROM `products` WHERE `id_product` = ? ");
	$query->bindValue(1, $id);
				try{
				$query->execute();
				return $query->fetch();
				}catch(PDOException $e){
				die($e->getMessage());
				}
	}

}
$manage_product = new Manage_product($db);

?>