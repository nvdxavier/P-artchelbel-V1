<?php
require_once("models/cart/modelcart.php");
$ids = array_keys($_SESSION['cart']);
if(empty($ids)){
    $products = array();
    echo '<div id="empty"><h2>Your shopping bag is empty</h2></div>';
}else{

   
$compte = $_SESSION['compte'];
$number_format = $_SESSION['number_format'];

$y="";
$d ="";
$product = $_SESSION['product'];
echo '<form method="POST" action="?page=cart" >';
foreach($product as $productd){ 
    $idd = $productd->id_product;

    //affichage contenu
    $session_cart = $_SESSION['cart'][$idd];
    $delete = '<a href="?page=cart&delcart='.$idd.'" class="del"><img src="views/img/icones/delete1.png" /></a>';
    $title = htmlentities($productd->title);
    $desc = htmlentities($productd->description);
    $image = '<img src="views/img/'.$productd->id_product.'a.jpg" height="auto" width="80px" />';
    $date = htmlentities('Date : '.$productd->date);
    //$amount = htmlentities('Quantity : '.$productd->amount);
    $prix = htmlentities($productd->price.'€');
    $price = $productd->price;
    $tva = $price * 20/100;
    $lol = htmlentities('Quantity selected:'.$_SESSION['cart'][$idd]);
    $job = htmlentities($price * $session_cart.'€');
    $quantity = $session_cart;

    //$g = '<input type="text" name="cart['.'quantity'.']['.$idd.']" value="'.$_SESSION['cart'][$idd].'" style="width:20px;">';
    $g = '<nav>
<label for="dateTitle">quantity:</label>
<select name="cart['.'quantity'.']['.$idd.']">
    <option name="cart['.'quantity'.']['.$idd.']" value="'.$_SESSION['cart'][$idd].'">'.$_SESSION['cart'][$idd].'</option>
    <option name="cart['.'quantity'.']['.$idd.']" value="1"> 1 </option>
    <option name="cart['.'quantity'.']['.$idd.']" value="2"> 2 </option>
    <option name="cart['.'quantity'.']['.$idd.']" value="3"> 3 </option>
    <option name="cart['.'quantity'.']['.$idd.']" value="4"> 4 </option>
    <option name="cart['.'quantity'.']['.$idd.']" value="5"> 5 </option>
    <option name="cart['.'quantity'.']['.$idd.']" value="6"> 6 </option>
    <option name="cart['.'quantity'.']['.$idd.']" value="7"> 7 </option>
    <option name="cart['.'quantity'.']['.$idd.']" value="8"> 8 </option>
    <option name="cart['.'quantity'.']['.$idd.']" value="9"> 9 </option>
    <option name="cart['.'quantity'.']['.$idd.']" value="10"> 10 </option>
</select>
</nav>';

$y[] .= $idd;
$d[] .= $_SESSION['cart'][$idd];


$_SESSION['session_cart'] = $session_cart;

$fiche = 
'<table class="flotte">
    <tr id="rubric">
       <th ></th>
       <th>Title:</th>
       <th><div>Description:</div></th>
       <th>Price:</th>
       <th>Change quantity?</th>
       <th>Price:</th>
       <th>Quantity selected:</th>
       <th>Delete choice ?</th>
    </tr>

        <tr>
          <th>'.$image.'</th>'
        .'<th>'.$title.'</th>'
        .'<th><div>'.$desc.'</div></th>'
        .'<th>'.$prix.'</th>'
        .'<th>'.$g.'</th>'
        .'<th>'.$job.'</th>'
        .'<th>'.$quantity.'</th>'
        .'<th>'.$delete.'</th>
        </tr>

</table>';

echo $fiche.'<br /><br />';
}//fermeture foreach


echo '<input type="submit" value="recalculate">';
echo '</form>';

?>


<li class="items">
<span><span id="count">You have <b><?= $compte; ?></b> products in your cart</span></span>
</li>
<li class="total">
    TOTAL: <span><span id="total"><b><?= $number_format; ?>  €</b></span></span>
</li>

<script type="text/javascript" src="views/js/myFunction.js"></script>
<button onclick="myFunction()" id="confirm" name="confirm">Confirm</button><br /><br />

<?php
}

?>
