<?php
require 'core/init.php';

$general->logged_out_protect();

$salles = $shopping->show_product();
$username   = htmlentities($user['username']);
$monid = $user['id'];
var_dump($monid);

if(isset($_GET['del'])){
$panier->del($_GET['del']);
}
?>

<!doctype html>
<html>
<head>

    <meta charset="utf-8">
    <title>Order details confirmed</title>
    <link rel="stylesheet" type="text/css" href="..css/style.css" >
    <link rel="stylesheet" href="css/styleslideshow.css" />

 
<body>
<div id="container">
<h1><span class="cursive">Welcome To Loki-Salle</span></h1>

<?php include 'includes/menu.php'; 
		
$ids = array_keys($_SESSION['panier']);
if(empty($ids)){
    $products = array();
}else{
$products = $shopping->query('SELECT * FROM items WHERE id IN ('.implode(',',$ids).')');
}

foreach($products as $product){
    $idd = $product->id;
    $lid = '<a href="addpanier.php?id='.$idd.'" class="add">';
    $add = '<a class="add" href="addpanier.php?id='.$idd.'  ">';

    //affichage contenu
    $title = htmlentities('Type de salle: '.$product->title);
    $content = htmlentities('Description : '.$product->content);
    $image = '<img src="img/'.$idd.'a.png" height="15%" width="15%" />
    <img src="img/'.$idd.'b.png" height="15%" width="15%" /><br />
    <img src="img/'.$idd.'c.png" height="15%" width="15%" />
    <img src="img/'.$idd.'d.png" height="15%" width="15%" />';
    $adress = htmlentities('Address :'.$product->adress);
    $town = htmlentities('Town : '.$product->ville);
    $cp = htmlentities('Postal code : '.$product->cp);
    $category = htmlentities('Category : '.$product->categorie);
    $capacity = htmlentities('Capacity : '.$product->capacite);
    $date1 = htmlentities('Posté le : '.$product->datedebut);
    $price = htmlentities('Tarif à la journée : '.$product->price.'€');
   $price = $product->price;
    $tva = $price * 20/100;


    $fiche = $image.'<br/><br/>'.$title .'<br />'. $adress .'<br/>'.$town .'<br/>'.$cp .'<br/>'.
    $category .'<br/>'.$capacity .'<br/>'.$content .'<br/>'.$price.'<br/>'.$date1.'<br/>';

//echo '<div class="block">';

echo $fiche.'<br />';
$datedebut = $_SESSION['datedebut'];
$datefin = $_SESSION['datefin'];
    $checkdates = $shopping->showdatesalle($idd);
    $nombrejours = $shopping->nbJours($datedebut, $datefin); 
    $addfinale = ($price + $tva) * $nombrejours;  

echo 'You have chosen the room number:&nbsp;'.$idd.'<br />'
.'Du'.' '.$datedebut.' '.'au'.' '.$datefin.'<br />'
.'It Mean:'.' '.$price.' '.'X '.$nombrejours.' days ='.$addfinale.'€'.'<br /><br /><br />';

$shopping->addateproduit($datedebut,$datefin, $idd, $addfinale, $monid);
echo '<META HTTP-EQUIV="Refresh"
CONTENT="20; URL=selectionpanier.php?del='.$idd.'" class="del">';

echo'<a href="selectionpanier.php?del='.$idd.'" class="del">erase your request now</a><br /><br />';

//mail($email['email'],'newsletter'.' '.$sujet, $content);
}//FIN DU FOREACH
echo'<A HREF="javascript:window.print()">Click to Print This Page</A>';

?>


</body>
<?php
include 'views/footer.php';
?>
</html>