<?php
class Insert_product{
	private $db;

		public function __construct($db) {
		$this->db = $db;
		}


	public function create_product($title, $description, $category, $price, $amount, $date, $sprice) {
		$query 	= $this->db->prepare("INSERT INTO `products` (`title`, `description`, `category`, `price`, `amount`, `date`, `special_price`) VALUES (?, ?, ?, ?, ?, ?, ?) ");
		$query->bindValue(1, $title);
		$query->bindValue(2, $description);
		$query->bindValue(3, $category);
		$query->bindValue(4, $price);
		$query->bindValue(5, $amount);
		$query->bindValue(6, $date);
		$query->bindValue(7, $sprice);

		try{
		$query->execute();
		}catch(PDOException $e){
		die($e->getMessage());
		}	
	}//fin de la fonction create_product


	public function researchid($title){
		$query 	= $this->db->prepare("SELECT id_product FROM `products` WHERE `title` = ".'"$title"'."  ");
		try{
		$query->execute();
		}catch(PDOException $e){
		die($e->getMessage());
		}
		return $query->fetch(PDO::FETCH_ASSOC);
}


}
$insert_product = new Insert_product($db);

?>