<?php
require_once("models/admin/model_manage_users.php");
require_once("models/admin/model_manage_order_history.php");
require_once("models/search/modelsearch.php");
$general->logged_out_protect();

affichageDuSite('views/admin/view_manage_order_history.php');

$orderhistory = $manage_order_history->get_order_history();
$username = isset($_POST['username']) ? $_POST['username']: '';
$state = isset($_POST['state']) ? $_POST['state']: '';
$critere2 = isset($_POST['check']) ? $_POST['check']: '';
$critere3 = isset($_POST['month']) ? $_POST['month']: '';


foreach ($orderhistory as $order_hist)
{

	$thedate = $order_hist->order_date;
	$year = substr($thedate,0, 4);
	$month = substr($thedate,5,2);	
	$order_date = substr($order_hist->order_date, 0, 10);

	$selection = TRUE;

	$selection = ( (strlen($username)==0) || ((strlen($username)!=0) && ($search->compareChaines($order_hist->username, $username))) );
	$selection = $selection && (empty($critere2) || !empty($critere2) && $search->compareDate($year, $critere2));  
	$selection = $selection && (empty($critere3) || !empty($critere3) && $search->compareDate($month, $critere3));  
	$selection = $selection && (empty($state) || !empty($state) && $search->compareDate($order_hist->state, $state));  

	if(isset($_POST) && !empty($_POST) && $selection == true)
	{
	
echo '<div id="" style="background-color: #B9967B;">';
	echo '<form action="?page=manage_order_history" method=post>';
		echo 'Session Cart : '.$order_hist->username;echo '&nbsp; &nbsp;';
		echo 'id order: '.$order_hist->id_order.'<br/>';
		echo 'Date: '.$order_date.'<br/>';
			echo '<td><input type="hidden" name="hidden" value="' .$order_hist->id_order. '"/></td><br/>';

		if(!empty($order_hist->id_product1)){
		$getinfoprod = $manage_order_history->getproduct($order_hist->id_product1);
			foreach($getinfoprod as $infoproduct){
				
				echo 'Title: '.$infoproduct->title;echo '&nbsp; &nbsp;';
				echo 'Price: '.$infoproduct->price; echo '€ &nbsp;'; echo 'X '.$order_hist->amount1; echo '<br/>';
				echo 'Subtotal Price: '.$order_hist->subtotalprice1; echo '€<br/><br/>';
			}
		}

		if(!empty($order_hist->id_product2)){
		$getinfoprod = $manage_order_history->getproduct($order_hist->id_product2);
			foreach($getinfoprod as $infoproduct){
				echo 'Title: '.$infoproduct->title;echo '&nbsp; &nbsp;';
				echo 'Price: '.$infoproduct->price; echo '€ &nbsp;'; echo 'X '.$order_hist->amount2; echo '<br/>';
				echo 'Subtotal Price: '.$order_hist->subtotalprice2; echo '€<br/><br/>';
			}
		}

		if(!empty($order_hist->id_product3)){
		$getinfoprod = $manage_order_history->getproduct($order_hist->id_product3);
			foreach($getinfoprod as $infoproduct){
				echo 'Title: '.$infoproduct->title;echo '&nbsp; &nbsp;';
				echo 'Price: '.$infoproduct->price; echo '€ &nbsp;'; echo 'X '.$order_hist->amount3; echo '<br/>';
				echo 'Subtotal Price: '.$order_hist->subtotalprice3; echo '€<br/><br/>';
			}
		}

		if(!empty($order_hist->id_product4)){
		$getinfoprod = $manage_order_history->getproduct($order_hist->id_product4);
			foreach($getinfoprod as $infoproduct){
				echo 'Title: '.$infoproduct->title;echo '&nbsp; &nbsp;';
				echo 'Price: '.$infoproduct->price; echo '€ &nbsp;'; echo 'X '.$order_hist->amount4; echo '<br/>';
				echo 'Subtotal Price: '.$order_hist->subtotalprice4; echo '€<br/><br/>';
			}
		}

		if(!empty($order_hist->id_product5)){
		$getinfoprod = $manage_order_history->getproduct($order_hist->id_product5);
			foreach($getinfoprod as $infoproduct){
				echo 'Title: '.$infoproduct->title;echo '&nbsp; &nbsp;';
				echo 'Price: '.$infoproduct->price; echo '€ &nbsp;'; echo 'X '.$order_hist->amount5; echo '<br/>';
				echo 'Subtotal Price: '.$order_hist->subtotalprice5; echo '€<br/><br/>';
			}
		}

		if(!empty($order_hist->id_product6)){
		$getinfoprod = $manage_order_history->getproduct($order_hist->id_product6);
			foreach($getinfoprod as $infoproduct){
				echo 'Title: '.$infoproduct->title;echo '&nbsp; &nbsp;';
				echo 'Price: '.$infoproduct->price; echo '€ &nbsp;'; echo 'X '.$order_hist->amount6; echo '<br/>';
				echo 'Subtotal Price: '.$order_hist->subtotalprice6; echo '€<br/><br/>';
			}
		}

		if(!empty($order_hist->id_product7)){
		$getinfoprod = $manage_order_history->getproduct($order_hist->id_product7);
			foreach($getinfoprod as $infoproduct){
				echo 'Title: '.$infoproduct->title;echo '&nbsp; &nbsp;';
				echo 'Price: '.$infoproduct->price; echo '€ &nbsp;'; echo 'X '.$order_hist->amount7; echo '<br/>';
				echo 'Subtotal Price: '.$order_hist->subtotalprice7; echo '€<br/><br/>';
	
			}
		}

		echo 'Total: '. $order_hist->total_price;echo '€ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo ' State of session cart: '. $order_hist->state;
		echo '<br/>';

		echo '<select name="statut">
		  <option value="1">1</option>
		  <option value="2">2</option>
		  <option value="3">3</option>
		  <option value="4">4</option>
		</select>
		<!--<a href="?page=manage_order_history&update='.$order_hist->state.'" >updating</a><br/>-->
		<input type="submit" name="update" value="update" />';
		echo '</form>';
echo '</div>';		

	}//fin du if
}//fin foreach


		if(isset($_POST['statut'])) {
		//header('Location: ?page=manage_order_history&success');
		//$manage_order_history->update_state( $_POST['statut'], $order_hist->id_order);
		$manage_order_history->update_state( $_POST['statut'], $_POST['hidden']);
		echo ' update state successfull !!!';	
		}


?>
