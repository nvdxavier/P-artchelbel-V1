<?php
class Manage_order_history extends Model{
	private $db;

	public function __construct($db) {
	$this->db = $db;
	}

	public function get_order_history() {
		$query = $this->db->prepare("SELECT * FROM `order_history` INNER JOIN `users` WHERE `order_history`.id_users = `users`.id_users ORDER BY `order_date` DESC");	
		try{
		$query->execute();
		}catch(PDOException $e){
		die($e->getMessage());
		}
		return $query->fetchAll(PDO::FETCH_OBJ);

	}

	public function gethistorder($id_users){
	      $query = $this->db->prepare("SELECT * FROM `order_history` WHERE id_users = ".$id_users." ORDER BY order_date DESC");   

	try{ 
	$query->execute();
	}catch(PDOException $e){
	die($e->getMessage());
	}
	return $query->fetchAll(PDO::FETCH_OBJ);
	}

	public function getproduct($id_product){
	   
	$query = $this->db->prepare(" SELECT title,price FROM `products` WHERE id_product = $id_product ");   
	            try{ 
	            $query->execute();
	            }catch(PDOException $e){
	            die($e->getMessage());
	            }
	             return $query->fetchAll(PDO::FETCH_OBJ);     

	}

public function checkstate($check){
if($check == 1){
    return 'Product session sent to Partchelbel\'s staff and waiting for payment endorsement';
}
if($check == 2){
     return 'payment accepted session product in preparation for'; 
}
if($check == 3){
     return 'session product sent to consummer'; 
}
if($check == 4){
     return 'session product archive'; 
}

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
	

	public function update_state($state, $id_order){
			//$query = $this->db->prepare("UPDATE `order_history` SET `state`	= ?");
			$query = $this->db->prepare("UPDATE `order_history` SET `state`	= ? WHERE `id_order` = ?");
			$query->bindValue(1, $state);
			$query->bindValue(2, $id_order);
			
			try{
				$query->execute();
				return true;
			}catch(PDOException $e){
				die($e->getMessage());
			}	
		}

}
$manage_order_history = new Manage_order_history($db);
?>