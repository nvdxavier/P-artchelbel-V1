<?php
require_once("models/cart/modelcart.php");
affichageDuSite('views/product/view_cart_confirmed.php');

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

if(isset($_SESSION['id_users'])){
  $logins = $_SESSION['id_users'];    

  //$user = $coremodel->userdata($logins);
  $searchadress = $modelscart->searchinfo('users','id_users', $logins);
  //$billingaddress = "'".$searchadress->address."'";
  $billingaddress = $searchadress->address;
  $postalcode = $searchadress->postal_code;
  $town = $searchadress->town;
  $fname = $searchadress->first_name;
  $lname = $searchadress->last_name;
  $email = $searchadress->email;
  $country = $searchadress->country;

  $caractere = array(","," ", "'");
  $billing_address = str_replace($caractere," ",$billingaddress);
  var_dump($billing_address);
  $billing_postalcode = str_replace($caractere," ",$postalcode);
  $billing_town = str_replace($caractere,"-",$town);
  $billing_country = str_replace($caractere,"-",$country);
$final_billing_address = trim($billing_address);
  $order_date = date("Y/m/d");



  $state = '1';
  $final_price = $_SESSION['number_format'];		
  $ids = array_keys($_SESSION['cart']);
  if(empty($ids)){
      $products = array();
  }else{
  $products = $modelscart->queryOne('SELECT * FROM products WHERE id_product IN ('.implode(',',$ids).')');
  }


  echo '<form action="" method="post" name="nom">';
  $idproduct="";
  $quantitys ="";
  $prices ="";
  $p_subtotal = "";
  foreach($products as $product){
      
      $iddproduct = $product->id_product;
      $sessioncart = $_SESSION['cart'][$iddproduct];
      $lid = '<a href="addpanier.php?id='.$iddproduct.'" class="add">';
      $add = '<a class="add" href="addpanier.php?id='.$iddproduct.'  ">';
      $session_cart = $_SESSION['cart'][$iddproduct];

      //affichage contenu
      $title = htmlentities($product->title);
      $desc = htmlentities($product->description);
      $image = '<img src="views/img/'.$iddproduct.'a.jpg" height="auto" width="80px">';

      $date = htmlentities('Date:'.$product->date);
      //$quantity = htmlentities('quantity : '.$product->amount);
      $theprice = htmlentities($product->price);
      $price = $product->price;
      $tva = $price * 20/100;
      $subtotalprice = $price * $sessioncart;
      //$fiche = $iddproduct.'<br/>'.$title.'<br/>'.$quantity .'<br/>'.$desc .'<br/>'.$theprice.'<br/>'.$session_cart.'<br/>'.$subtotalprice.'<br/><br/>';
      $addfinale = $price + $tva; 

  $fiche = 
  '<table class="flotte">
      <tr id="rubric">
         <th ></th>
         <th>Title:</th>       
         <th>Price:</th>
         <th>Quantity:</th>
         <th>Sub-total: </th>
      </tr>

          <tr>
            <th>'.$image.'</th>'
          .'<th>'.$title.'</th>'         
          .'<th>'.$theprice.'€'.'</th>'
          .'<th>'.$session_cart.'</th>'
          .'<th>'.$subtotalprice.'</th>
          </tr>
  </table>';
//echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';

      echo $fiche; 

  $_SESSION['fiche'] = $fiche;
  $idproduct[] .= $iddproduct;
  $quantitys[] .= $_SESSION['cart'][$iddproduct];
  $prices[] .= $price;
  $p_subtotal[] .= $subtotalprice;
  }//FIN DU FOREACH

  $fichetotalprice ='<table class="flotte">
     <tr id="rubric">
         <th></th>
         <th></th>
         <th></th>
         <th>TOTAL</th>
         <th>'.$final_price.'€</th>
      </tr>
  </table><br/>';
 $the_address ='<table class="">
 <tr id="rubric">
         <th>Your billing address:</th>
         <th>'.$billing_address.'</th>
         <th><div> '.$billing_postalcode.'</div></th>
         <th>'.$billing_country.'</th>
         <th>'.$billing_town.'</th>
      </tr>

  </table><br/>';

  echo $fichetotalprice;
  echo $the_address;
    
      //$finalprice = "'".$final_price."'";
  /*echo '<li class="total">
      TOTAL<span><span id="total">  '.$final_price.'€</span></span> <div>Your billing address:'.$billing_address.'</div>
  </li>';*/

  /*echo'<A HREF="javascript:window.print()">Click to Print This Page</A>';*/


  if(isset($idproduct) && isset($quantitys) && isset($prices) && isset($p_subtotal)){

      $caractere = array(","," ");
      $trom = str_replace($caractere,".",$final_price);
      $finaltrom = "'".$trom."'";

      //echo 'your comment:<br /><textarea value="contenu" name="contenu"></textarea><br/>';
      //$adress = $_POST['contenu']; .$billing_postalcode.$billing_town
      //}  $fname = $searchadress->first_name;
  //$lname = $searchadress->last_name;
  //$email = $searchadress->email;
  //$country = $searchadress->country;

      if(empty($billing_town) && empty($billing_postalcode)&& empty($billing_town)
       && empty($country) && empty($lname) && empty($fname)){
        echo '<h3>Some information about your billing address, postal code, or town is missing.<br/><br/> Please check your "<a href="?page=profile&username='.$searchadress->username.'">Profile settings</a>" to purchase your cart validation </h3>';
      }else{
      echo'<input type="submit" value="Submit" name="submit" />';
       }
     
  echo'</form>';



      if(isset($_POST['submit'])){
           
              $modelscart->insertallinfo($logins, $idproduct, $quantitys, $prices, $p_subtotal, $finaltrom, "'".$billing_address."'", $state);
              $modelscart->zerotonull();
              unset($_SESSION['cart']);

              header('Location:?page=order_history&user='.$logins.'');


       }
      
  }
}else{
    echo'<h2>Please <a href="?page=login">Login</a> or <a href="?page=registration">Register</a> to complete your order</h2>';
    echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';
}
?>