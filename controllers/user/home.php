<?php
require_once("models/login/model_login.php");
require_once("core/init.php");

$general->logged_out_protect();

$_SESSION['tps'] = 1800;
$_SESSION['time'] = time();
if(isset($_SESSION['id_users'])){

	if(isset($_SESSION['tps'] )){
		if($_SESSION['time']>($_SESSION['tps'] + $_SESSION['time'])){
			session_destroy();	
			echo '<script language="javascript" type="text/javascript">
			alert("you are deconnected");
			header("Location: ?page=login");
			</script>';
		}else{
			$logins = $_SESSION['id_users'];
			$_SESSION['tps'] = 1800;
			$_SESSION['time'] = time();
		}
	}
}


$user = $login->userdata($_SESSION['id_users']);
$username = $user['username'];
$username = htmlentities($user['username']);

$_SESSION['username'] = $username;

if (isset($_GET['success']) && empty($_GET['success'])) {
			$username = htmlentities($user['username']);
echo '<h2>Thank you for subscribe to newsletter'.' '.$username.' '.'. Please check your email.</h2>';
}



if (isset($_GET['unsubscribe']) && empty($_GET['unsubscribe'])) {
			$username = htmlentities($user['username']);
echo  $username.'<h2>You have successfully unsubscribed !!</h2>';
}


affichageDuSite('views/user/view_home.php');
?>
