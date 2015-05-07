<?php
require_once("models/popprod/fonction_inc.php");
require_once("models/popprod/modelpopprod.php");
affichageDuSite('views/product/view_popprod.php');

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

$u = $poprod->compte();

$lol='';
foreach($u as $i){
$lol[].=$i['id_product1'];
$lol[].=$i['id_product2'];
$lol[].=$i['id_product3'];
$lol[].=$i['id_product4'];
$lol[].=$i['id_product5'];
$lol[].=$i['id_product6'];
$lol[].=$i['id_product7'];
}
$array = array_filter($lol, function($var){
  return (!($var == '' || is_null($var)));
    });

$fuck = array_count_values($array);
$sta='';
$o ='';
arsort($fuck);
//var_dump($fuck);
foreach($fuck as $key => $val){
$sta[].= $key;
}
$sortbykey = array_slice($sta, 0, 10);
$p= count($sortbykey);
echo'<ul><li>';
echo '<div id="latestprod">';
foreach($sortbykey as $i){

	$ij = $poprod->getMarking($i);
	      echo '<div class="searchprod">';
	$price = $ij['price'].' €';
	$image = '<a href="views/product/detailproduct.php?id='.$ij['id_product'].'" rel="superbox[iframe][]">
	<img src="views/img/'.$ij['id_product'].'a.jpg" alt="image" height="100px;" width="100px;" /></a>';     
	$title= htmlentities($ij['title']);
	$addcart= '<a class="addcart" href="?page=addcart&amp;id='. $ij['id_product'].'" onclick="reloadPage()" ><img src="views/img/icones/basket.PNG" alt="basket" /></a><br/>';
	$fiche = 
	'<table class="flotte">
	    <tr class="rubric">
	       <th></th> 
	       <th>Title:</th>
	       <th>Price:</th>
	       <th></th>
	    </tr>

        <tr>
          <th>'.$image.'</th>'
        .'<th>'.$title.'</th>'
        .'<th>'.$price.'</th>'
        .'<th>'.$addcart.'</th>
        </tr>
	 </table>';
	echo $fiche; echo '<p></p>';
	      echo '</div><br/>';


}
echo '<div id="mode-iframe">
</div>
';
 echo '<br /><br />';
 echo '</div>';

echo'</li>
  </ul>';

//affichageDuSite('views/product/view_popprod.php');

?>
<script type="text/javascript" src="views/js/app.js"></script>
<script type="text/javascript">
     function reloadPage(){
    alert('product added to your cart !');
   window.location.reload(false);
       }
</script>