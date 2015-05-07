<?php

if(isset($_GET['id'])) {
$product = $coremodel->query('SELECT * FROM products WHERE id_product =:id' , array('id' => $_GET['id'])); 


echo '<div id= detailproduct>';
foreach($product as $detail){
	try{
	$idd = $detail->id_product;
	//$lid = '<a href="addpanier.php?id='.$idd.'" class="addpanier">';
	//$add = '<a class=" addpanier" href="addpanier.php?id='.$idd.'  ">';
	$img ='<img value="ok" src="views/img/'.$detail->id_product.'a.jpg" width="100%" ">';
	$title = htmlentities('Title: '.$detail->title);
	$desc = htmlentities('Description : '.$detail->description);
	$date = htmlentities('date : '.$detail->date);
	$price = htmlentities('quantity : '.$detail->price);
	$amount = htmlentities('amount : '.$detail->amount);
	$image = '<img src="img/'.$idd.'.png">';
 	$addcart = '<a href="?page=addcart&id='.$idd.'"class="addcart" value="addcart" name="addcart"> Add to Cart</a>';

	//concaténation de tout les renseignements désirés dans $fiche.
	$fiche = $title .'<br />'.$img.'<br />'. $date .'<br/>'.$price .'<br/>'.$amount .'<br/>'.
	$desc.'<br/>'.$addcart.'<br/><br/>';

 echo $fiche; 

	}catch(PDOException $e)
		{echo 'aucun résultat';}
}//fin foreach
}
echo '</div>';
?>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="views/js/app.js"></script>