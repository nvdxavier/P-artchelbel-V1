<?php
require_once("models/login/model_login.php");
require_once("models/admin/model_admin.php");

//$general->logged_in_protect();

if (empty($_POST) === false){

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'Sorry, but we need your username and password.';
	} else if ($login->user_exists($username) === false) {
		$errors[] = 'Sorry that username doesn\'t exists.';
	} else if ($login->email_confirmed($username) === false) {
		$errors[] = 'Sorry, but you need to activate your account. 
					 Please check your email.';
	}else{
		if (strlen($password) > 18) {
			$errors[] = 'The password should be less than 18 characters, without spacing.';
		}
		$logins = $login->login($username, $password);
		$logadmin = $admin->login_admin($username, $password);
if (($logins === false) || ($logadmin === false)){
			$errors[] = 'Sorry, that username/password is invalid';
		}else{
		session_regenerate_id(true);// destroying the old session id and creating a new one
		$_SESSION['id_users'] =  $logins;
		GLOBAL $logins;
		if($logadmin === true){
		$_SESSION['id_user'] =  $logadmin;
		}
		header('Location: ?page=home');
		exit();
		}


		if ($logins === false) {
			$errors[] = 'Sorry, that username/password is invalid';
		}else{
		session_regenerate_id(true);// destroying the old session id and creating a new one
		$_SESSION['id_users'] =  $logins;
		GLOBAL $logins;

		header('Location: ?page=home');
		exit();
		}


	}//else
}

affichageDuSite('views/user/view_login.php');

if(empty($errors) === false){
	echo '<p>' . implode('</p><p>', $errors) . '</p>';	
}

?>
