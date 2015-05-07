<?php
require_once("models/cart/modelcart.php");

//////////////////////////////////////////////////////////////////////////////
/*$_SESSION['time'] = time();*/
if(isset($_SESSION['id_users'])){
$_SESSION['tps'] = 1800;    
    if(isset($_SESSION['tps'] )){
        if(time()>($_SESSION['tps'] + $_SESSION['time'])){
            session_destroy();  
            header("Location: ?page=login");
        }else{
            $logins = $_SESSION['id_users'];
            $_SESSION['tps'] = 1800;
            $_SESSION['time'] = time();
        }
    }
}
////////////////////////////////////////////////////////////////////////////////

$salles = $modelscart->show_product();
//$username = $user['username'];
//if(isset($_GET['del'])){
//$modelscart->del($_GET['del']);
//}
$ids = NULL;
$ids = array_keys($_SESSION['cart']);
$_SESSION['ids'] = $ids;

if(empty($ids)){
    $products = array();
}else{
/*$i= count($ids);
if($i <= 3){ */
$product = $modelscart->queryOne("SELECT * FROM products WHERE id_product IN (".implode(',',$ids).")");
$_SESSION['product'] = $product;

$compte = $modelscart->count();
$_SESSION['compte'] = $compte;

$number_format = number_format($modelscart->total(),2,',',' ');
$_SESSION['number_format'] = $number_format;
   /* }else{
     echo 'limite atteinte';
    }*/
}
affichageDuSite('views/product/view_cart.php');

?>