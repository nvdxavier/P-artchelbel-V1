<?php
require_once("models/latestprod/fonction_inc.php");
require_once("models/latestprod/modellatestprod.php");

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


$nbArt = $coremodel->count();
$perPage = 12;
$nbPage = ceil($nbArt['nbArt']/$perPage);

if(isset($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbPage){
    $cPage = $_GET['p'];    
}else{
    $cPage = 1;
}
$compte = $modelsprod->getSpecial($cPage,$perPage);
$_SESSION['compte'] = $compte;
$_SESSION['cPage'] = $cPage;
$_SESSION['nbPage'] = $nbPage;

affichageDuSite('views/product/view_latestprod.php');

?>