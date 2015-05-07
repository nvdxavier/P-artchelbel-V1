<?php
require_once("models/admin/model_manage_products.php");
require_once("models/search/modelsearch.php");
$general->logged_out_protect();

$items  = $manage_product->get_items();

affichageDuSite('views/admin/view_manage_products.php');

$title 	 = isset($_POST['title']) ? $_POST['title']: '';
$description  = isset($_POST['description']) ? $_POST['description']: '';
$price 	 = isset($_POST['price']) ? $_POST['price']: '';
$date = isset($_POST['date']) ? $_POST['date']: '';
$amount = isset($_POST['amount']) ? $_POST['amount']: '';
$category  = isset($_POST['category']) ? $_POST['category']: '';
$categorie = isset($_POST['check']) ? $_POST['check']: '';
$sprice = isset($_POST['sprice']) ? $_POST['sprice']: '';


echo '<div id="container_manage_product">';

foreach($items as $item)
{

	$selection = TRUE;
	$idd = $item->id_product;

	      $selection = $selection && ( (strlen($title)==0) || ((strlen($title)!=0) && ($search->compareChaines($item->title, $title))) );      
	      $selection = $selection && ( (strlen($category)==0) || ((strlen($category)!=0) && ($search->compareChaines($item->category, $category))) );
	      $selection = $selection && ( (strlen($date)==0) || ((strlen($date)!=0) && ($search->compareChaines($item->date, $date ))) );
	      $selection = $selection && ( (strlen($price)==0) || ((strlen($price)!=0) && ($search->compareChaines($item->price, $price ))) );
	      $selection = $selection && ( (strlen($amount)==0) || ((strlen($amount)!=0) && ($search->compareChaines($item->amount, $amount))) );
	      $selection = $selection && ( (strlen($description)==0) || ((strlen($description)!=0) && ($search->compareChaines($item->description, $description))) );
	      $selection = $selection && ( (strlen($sprice)==0) || ((strlen($sprice)!=0) && ($search->compareChaines($item->special_price, $sprice))) );
	      //$selection = $selection && ( (strlen($cp)==0) || ((strlen($cp)!=0) && ($shopping->compareChaines($item->sexe, $cp))) );

 if(!empty($_POST) && $selection == true)
{ 
			
			echo '<form action="?page=manage_products" method=post>
            <div id="paragraphe">
       		<td>Title: <input type="text" name="title" value="'.$item->title.'"/></td>&nbsp;
       		<td>category: <input type="text" style="width:70px;" name="category" value="'.$item->category.'"/></td>&nbsp;             
            <td>price: <input type="text" style="width:50px;" name="price" value="'.$item->price.'"/>€</td>&nbsp;<br/>
            <td>special price: <input type="text" style="width:50px;" name="sprice" value="'.$item->special_price.'"/>€</td>&nbsp;<br/>
            <td>order date: <input type="text" style="width:70px;" name="date" value="'.$item->date.'"/></td>&nbsp; 
            <td>quantity: <input type="text" style="width:30px;" name="amount" value="'.$item->amount.'"/></td>&nbsp;
            <td>ID: <input type="id" style="width:30px;" name="id_product" value="'.$idd.'"/></td>&nbsp;
            <a href="?page=update_image&id='.$idd.'" target="select_image">Update pictures</a><br/>
            <td><TEXTAREA name="description" cols="50" rows="10" >'.$item->description.'</TEXTAREA></td>&nbsp;
            <br/>
      
            <!--<img src="../img/'.$idd.'a.jpg" height="30%" width="30%">
            <img src="../img/'.$idd.'b.jpg" height="30%" width="30%">
            <img src="../img/'.$idd.'c.jpg" height="30%" width="30%">
            <img src="../img/'.$idd.'d.jpg" height="30%" width="30%">-->

            <td><input type="hidden" name="hidden" value="' .$idd. '"/></td><br/>
            <td><input type="submit" name="update" id="id_update" value="update" /></td>

			<a href="?page=manage_products&delete='.$idd.'" >delete</a><br/>                
            <td><input type="submit" name="delete" value="delete" /></td><br/><br/>
            </div><br />
            </form>';

	}// FIN DU if(!empty($_POST) && $selection == true)

}//FIN DU FOREACH
echo '</div>';//<div id="resultitem">

	if(isset($_POST['update']))
	{
	$manage_product->admin_update_product($_POST['title'], $_POST['description'], $_POST['price'], $_POST['date'], 
	 $_POST['amount'], $_POST['category'], $_POST['sprice'], $_POST['hidden']);
	echo 'products update successfull !';
	}

	$lol = $item->id_product;

	if(isset($_GET['delete'])){
	$manage_product->delete_product($_GET['delete']);
	header('Location: ?page=manage_products&success');
	echo 'suppression products successfull !!!'; 
	}

echo '
	<iframe id="select_image" height="100%" width="100%" frameborder="0" scrolling="auto" name="select_image">
	</iframe>
	<div id="affiche"></div>';

?>