<?php
require_once("models/search/modelsearch.php");

$showall = $coremodel->showAll();
$keyword = isset($_POST['keyword']) ? $_POST['keyword']: '';
$critere1 = $keyword;

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


$selection = TRUE;
$countfiche ='';
	foreach($showall as $all){

		$idd = $all['id_product'];
		$title = $all['title'];
		$desc = $all['description'];
		$gstring = $all['generated_string'];
		$category = $all['category'];
		$concat = $title.$desc.$gstring.$category;

		$selection = ( (strlen($critere1)==0) || ((strlen($critere1)!=0) && ($search->compareChaines($concat, $critere1))) );
		if(isset($_POST) && !empty($_POST) && $selection == true){
			
			$id= $all['id_product'];
			$countfiche[] .= $id;
			$_SESSION['countfiche'] = $countfiche;

		}//fin du "IF"
	}//fin du "FOREACH"

if(isset($_SESSION['countfiche'])){
$countfiche = $_SESSION['countfiche'];	
$nbArt = count($countfiche);
$listid = implode(", ", $countfiche);
$nom['nbArt'] = (string)$nbArt;
$perPage = 12;
$nbPage = ceil($nom['nbArt']/$perPage);


	if(isset($_GET['d']) && $_GET['d']>0 && $_GET['d']<=$nbPage){
		$cPage = $_GET['d'];    
		}else{
		 $cPage = 1;
		}

$compta = $search->getProduct($listid, $cPage, $perPage);
$_SESSION['compta']  = $compta;
$_SESSION['cPage'] = $cPage;
$_SESSION['nbPage'] = $nbPage;
}

//affichageDuSite('views/product/search.php');
affichageDuSite('views/product/view_search.php');
?>

