<?php

class Detailproduct extends Model{

	private $db;

	public function __construct($db) {//a la base c'était ($database)
	    $this->db = $db;

	    if(!isset($_SESSION)) {
		session_start();
		}
		if(!isset($_SESSION['cart'])){
		$_SESSION['cart'] = array();
		}
		$this->db = $db;//récement ajoutée
	}



public function add($product_id){
	if(isset($_SESSION['cart'][$product_id])){//ajouté récement
	//$_SESSION['panier'][$product_id] = 1;
	$_SESSION['cart'][$product_id]++;
}else{
	$_SESSION['cart'][$product_id] = 1;
}
}


public function total(){
//global $db;
	$total = 0;
	$ids = array_keys($_SESSION['cart']);
if(empty($ids)){
    $products = array();
}else{
$products = $this->db->querytwo('SELECT * FROM products WHERE id_product IN ('.implode(',',$ids).')');
//$products = $shopping->query('SELECT * FROM items WHERE id IN ('.implode(',',$ids).')');	
}
foreach($products as $product)
	{
	$total += $product['price'] * $_SESSION['cart'][$product['id_product']];
	}return $total;
	
}

static function countprod(){
//global $db;
	return array_sum($_SESSION['cart']);
}


}
$detailprod = new Detailproduct($db);
?>