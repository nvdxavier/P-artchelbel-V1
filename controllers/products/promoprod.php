<?php
require_once("models/promoprod/modelpromoprod.php");

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

$a="'goya'";
$b="'manga'";
$c="'evangelion'";
$promotions= $promo->getpromo($a,$b,$c);
$ids='';

  	foreach($promotions as $f){
$ids[] .= $f['id_product'];
$_SESSION['ids'] = $ids;
  	}
if(isset($_SESSION['ids'])) {

$ids = $_SESSION['ids'];
$nbArt = count($ids);
$lil = implode(",",$ids);

$nom['nbArt'] = (string)$nbArt;
$perPage = 12;
$nbPage = ceil($nom['nbArt']/$perPage);

if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPage){
    $cPage = $_GET['p'];    
}else{
    $cPage = 1;
}

$promop = $promo->promoprod($lil, $cPage, $perPage);
//$perPage = 6;
$nbPage = ceil($nom['nbArt']/$perPage);

$_SESSION['promop'] = $promop;
$_SESSION['cPage'] = $cPage;
$_SESSION['nbPage'] = $nbPage;
}
affichageDuSite('views/product/view_promoprod.php');


?>