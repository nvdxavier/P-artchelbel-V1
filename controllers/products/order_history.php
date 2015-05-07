<?php
require_once("models/orderhistory/modelorderhistory.php");
require_once("models/cart/modelcart.php");
require_once("core/init.php");

$general->logged_out_protect();

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



affichageDuSite('views/product/view_order_sent.php');

$ids = array_keys($_SESSION['cart']);
if(isset($_GET['user'])) {
$users = $_GET['user'];

	$gethistorder = $orderhistory->gethistorder($users);
	$f = array_keys($gethistorder);

echo '<h3>Send your payment by checkto the address:</h3><p><p/><h2>P\'artchelbel SARL, 45-78 rue Baptiste 75005 Paris Ile-de-France France</h2>';
	foreach($f as $l){

	echo '<div id=order_history>'.'<b>Order date: '.$gethistorder[$l]['order_date'].'</b><p>';

		if(!empty($gethistorder[$l]['id_product1'])){
		$infoprod=$orderhistory->getproduct($gethistorder[$l]['id_product1']);
				foreach($infoprod as $prod){
					echo $prod->title; echo '&nbsp; &nbsp;'.$prod->price.' €';
				echo '&nbsp;x '.$gethistorder[$l]['amount1'];
				echo '&nbsp; &nbsp;Sub_tot : '.$gethistorder[$l]['subtotalprice1'];echo'€'.'<p>';
				}
		}

		if(!empty($gethistorder[$l]['id_product2'])){
		$infoprod=$orderhistory->getproduct($gethistorder[$l]['id_product2']);
				foreach($infoprod as $prod){
					echo $prod->title; echo '&nbsp; &nbsp;'.$prod->price.' €';
				echo '&nbsp;x '.$gethistorder[$l]['amount2'];
				echo '&nbsp; &nbsp;Sub_tot : '.$gethistorder[$l]['subtotalprice2'];echo'€<p>';
				}
		}

		if(!empty($gethistorder[$l]['id_product3'])){
		$infoprod=$orderhistory->getproduct($gethistorder[$l]['id_product3']);
				foreach($infoprod as $prod){
					echo $prod->title; echo '&nbsp; &nbsp;'.$prod->price.' €';
				echo '&nbsp;x '.$gethistorder[$l]['amount3'];
				echo '&nbsp; &nbsp;Sub_tot : '.$gethistorder[$l]['subtotalprice3'];echo' €<p>';
				}
		}

		if(!empty($gethistorder[$l]['id_product4'])){
		$infoprod=$orderhistory->getproduct($gethistorder[$l]['id_product4']);
				foreach($infoprod as $prod){
					echo $prod->title; echo '&nbsp; &nbsp;'.$prod->price.' €';
				echo '&nbsp;x '.$gethistorder[$l]['amount4'];
				echo '&nbsp; &nbsp;Sub_tot : '.$gethistorder[$l]['subtotalprice4'];echo'€<p>';
				}
		}

		if(!empty($gethistorder[$l]['id_product5'])){
		$infoprod=$orderhistory->getproduct($gethistorder[$l]['id_product5']);
				foreach($infoprod as $prod){
					echo $prod->title; echo '&nbsp; &nbsp;'.$prod->price.' €';
				echo '&nbsp;x '.$gethistorder[$l]['amount5'];
				echo '&nbsp; &nbsp;Sub_tot : '.$gethistorder[$l]['subtotalprice5'];echo'€<p>';
				}
		}

		if(!empty($gethistorder[$l]['id_product6'])){
		$infoprod=$orderhistory->getproduct($gethistorder[$l]['id_product6']);
				foreach($infoprod as $prod){
					echo $prod->title; echo '&nbsp; &nbsp;'.$prod->price.' €';
				echo '&nbsp;x '.$gethistorder[$l]['amount6'];
				echo '&nbsp; &nbsp;Sub_tot : '.$gethistorder[$l]['subtotalprice6'];echo'€<p>';
				}
		}

		if(!empty($gethistorder[$l]['id_product7'])){
		$infoprod=$orderhistory->getproduct($gethistorder[$l]['id_product7']);
				foreach($infoprod as $prod){
					echo $prod->title; echo '&nbsp; &nbsp;'.$prod->price.' €';
				echo '&nbsp;x '.$gethistorder[$l]['amount7'];
				echo '&nbsp; &nbsp;Sub_tot : '.$gethistorder[$l]['subtotalprice7'];echo'€<p>';
				}
		}

	echo '<p>'.'Total : '.$gethistorder[$l]['total_price'].'€</p>';
	echo '<CITE>'.$orderhistory->checkstate($gethistorder[$l]['state']).'</CITE></div><p>';

}//fin foreach
}


?>