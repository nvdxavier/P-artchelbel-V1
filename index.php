<?php
require_once('core/init.php');
(isset($_GET['page'])) ? $page = $_GET['page'] : $page = 'latestprod';
$_SESSION['latestprod'] = $page;



$logins='';
if(isset($_SESSION['id_users'])){
$logins = $_SESSION['id_users'];
}
if($admin->is_admin($logins) === true){
require_once("controllers/admin/adminmenu.php");
}

//-----------------------------------------------------------------------
switch($page)
	{
	case 'latestprod':
	require_once("controllers/products/latestprod.php");
		break;
	// ...............................................
	case 'promoprod':
	require_once("controllers/products/promoprod.php");
		break;
		
	case 'popprod':
require_once("controllers/products/popprod.php");
	break;

	case 'search':
	require_once("controllers/products/search.php");
		break;

	case 'detailproduct':
	require_once("controllers/products/detailproduct.php");
		break;

	case 'addcart':
	require_once("controllers/products/addcart.php");
		break;

	case 'cart':
	require_once("controllers/products/cart.php");
		break;
		
	case 'cart_confirmed':
	require_once("controllers/products/cart_confirmed.php");
		break;

	case 'order_history':
	require_once("controllers/products/order_history.php");
		break;

	case 'registration':
	require_once("controllers/user/registration.php");
		break;

	case 'activate':
	require_once("controllers/user/activate.php");
		break;

	case 'login':
	require_once("controllers/user/login.php");
		break;

	case 'home':
	require_once("controllers/user/home.php");
		break;

	case 'logout':
	require_once("controllers/user/logout.php");
		break;

	case 'recover':
	require_once("controllers/user/recover.php");
		break;

	case 'recoverpaswd':
	require_once("controllers/user/recoverpaswd.php");
		break;

	case 'settings':
	require_once("controllers/user/settings.php");
		break;

	case 'profile':
	require_once("controllers/user/profile.php");
		break;

	case 'change_password':
	require_once("controllers/user/change_password.php");
		break;

	case 'manage_users':
	require_once("controllers/admin/manage_users.php");
		break;


	case 'popup':
	require_once("controllers/products/popup.php");
		break;

	case 'legals_mentions':
	require_once("controllers/legals_mentions/legals_mentions.php");
		break;

	case 'insert_users':
	require_once("controllers/admin/insert_users.php");
		break;

	case 'contact_users':
	require_once("controllers/admin/contact_users.php");
		break;

	case 'manage_products':
	require_once("controllers/admin/manage_products.php");
		break;

	case 'update_image':
	require_once("controllers/admin/update_image.php");
		break;

	case 'insert_products':
	require_once("controllers/admin/insert_products.php");
		break;

	case 'manage_order_history':
	require_once("controllers/admin/manage_order_history.php");
		break;

	case 'site_map':
	require_once("controllers/sitemap/sitemap.php");
		break;

	default:
	// ...
	break;
	}
//------------------------------------------------------------------------
function affichageDuSite($vue)//($vue) = views/membre/inscription.html'
	{
	global $msg;
	require_once('views/haut_de_site.php');
	require_once('views/menu.php');
	require_once('views/contenu.php');
	require_once($vue);	
	}
require_once('views/bas_de_site.php');

?>


	<?php require_once("models/cart/modelcart.php"); ?>


<?php
$count = $modelscart->count(); 
$_SESSION['count']=$count;

$total = $modelscart->total(); 
$_SESSION['total']=$total;
?>