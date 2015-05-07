<?php
//require_once("models/cart/modelcart.php");
require 'models/cart/modelcart.php';

$json = array('error'=> true);

$ids = array_keys($_SESSION['cart']);
//$ids = $_SESSION['ids'];
if(count($ids)<=6){

if(isset($_GET['id'])) {
$product = $modelscart->queryOne('SELECT id_product FROM products WHERE id_product =:id' , array('id' => $_GET['id']));
 if(empty($product)){
 	$json['message'] = "This item does not exist";
 }

$modelscart->add($product[0]->id_product);
 $json['error'] = false;
 $json['total'] = number_format($modelscart->total(),2,',',' ');
 $json['count'] = $modelscart->count();
 $json['message'] = 'item added succefully';
}else{
	$json['message'] = "please chose a item";
}
echo json_encode($json);
}

?>