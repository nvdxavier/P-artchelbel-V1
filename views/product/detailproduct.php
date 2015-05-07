<?php
require_once("../../core/init.php");
if(isset($_GET['id'])) {
$product = $coremodel->query('SELECT * FROM products WHERE id_product =:id' , array('id' => $_GET['id'])); 


echo '<div id="detailproduct">';
foreach($product as $detail){
	try{
	$idd = $detail->id_product;
$img='<img src="../../views/img/'.$detail->id_product.'a.jpg" srcset="src="../../views/img/'.$detail->id_product.'a.jpg" 10x" width="100%" height="100%" />';

	$title = htmlentities('Title: '.$detail->title);
	$desc = htmlentities('Description : '.$detail->description);
	$date = htmlentities('date : '.$detail->date);
	$price = htmlentities('Price : '.$detail->price.' €');
	$amount = htmlentities('amount : '.$detail->amount);
	$image = '<img src="img/'.$idd.'.png">';
 	//$addcart = '<a href="?page=addcart&id='.$idd.'"class="addcart" value="addcart" name="addcart"> Add to Cart</a>';
 	$addcart = '<a href="../../?page=addcart&id='.$idd.'"class="addcart" value="addcart" name="addcart" onclick="reloadPage()" ><img src="../../views/img/icones/basket.png"></a>';

	//concaténation de tout les renseignements désirés dans $fiche.
	$fiche = '<p>'.$img.$title .'<br />'. $date .'<br/>'.$price .'<br/>'.
	$desc.'<br/>'.$addcart.'<br/><br/></p>';

 echo $fiche; 

	}catch(PDOException $e)
		{echo 'aucun résultat';}
}//fin foreach
}
echo '</div>';
?>
<link rel="stylesheet" href="../../views/css/partchelbel.css" type="text/css" media="screen" />

<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="../../views/js/app.js"></script>
<script type="text/javascript">
     function reloadPage(){
    alert('product added to your cart !');
   window.location.reload(false);
       }       
</script>
