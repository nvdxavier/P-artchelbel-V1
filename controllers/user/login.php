<?php
require_once("models/login/model_login.php");

//$general->logged_in_protect();

if (empty($_POST) === false){

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	if (empty($username) === true || empty($password) === true) {
		$errors[] = '<h3 style="color:red">Sorry, but we need your username and password.</h3>';
	} else if ($login->user_exists($username) === false) {
		$errors[] = '<h3 style="color:red">Sorry that username doesn\'t exists.</h3>';
	} else if ($login->email_confirmed($username) === false) {
		$errors[] = '<h3 style="color:red">Sorry, but you need to activate your account. 
					 Please check your email.</h3>';
	}else{
		if (strlen($password) > 18) {
			$errors[] = '<h3 style="color:red">The password should be less than 18 characters, without spacing.</h3>';
		}
		$logins = $login->login($username, $password);
if ($logins === false){
			$errors[] = '<h3 style="color:red">Sorry, that username/password is invalid</h3>';
		}else{
			session_regenerate_id(true);// destroying the old session id and creating a new one
			$_SESSION['id_users'] =  $logins;
			GLOBAL $logins;
			header('Location: ?page=home');
			exit();
		}

	}


	}//else

affichageDuSite('views/user/view_login.php');

if(empty($errors) === false){
	echo '<p>' . implode('</p><p>', $errors) . '</p>';	
}

?>
