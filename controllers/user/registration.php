<?php 
require_once("models/registration/model_registration.php");

//$general->logged_in_protect();


if (isset($_POST['submit'])) {

	if(empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])){

        $errors[] = '<h2 style="color:red;">All fields are required.</h2>';

	}else{
        
        if ($register->user_exists($_POST['username']) === true) {
            $errors[] = '<h2 style="color:red;">That username already exists</h2>';
            
        }
        if(!ctype_alnum($_POST['username'])){
            $errors[] = '<h2 style="color:red;">Please enter a username with only alphabets and numbers</h2>';	
        }
        if (strlen($_POST['password']) <6){
            $errors[] = '<h2 style="color:red;">Your password must be atleast 6 characters</h2>';
        } else if (strlen($_POST['password']) >18){
            $errors[] = '<h2 style="color:red;">Your password cannot be more than 18 characters long</h2>';
        }
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors[] = '<h2 style="color:red;">Please enter a valid email address</h2>';
        }else if ($register->email_exists($_POST['email']) === true) {
            $errors[] = '<h2 style="color:red;">That email already exists.</h2>';
        }
	}

	if(empty($errors) === true){
		
		$username 	= htmlentities($_POST['username']);
		$password 	= $_POST['password'];
		$email 		= htmlentities($_POST['email']);

		$register->register($username, $password, $email);
		header('Location: ?page=registration&success');
		exit();
	}
}

$form=   '<form method="post" action="">
            <h4>Username:</h4>
            <input type="text" name="username" />
            <h4>Password:</h4>
            <input type="password" name="password" />
            <h4>Email:</h4>
            <input type="text" name="email" />  
            <br/>
            <input type="submit" name="submit" />
        </form>';
$_SESSION['form'] = $form;


affichageDuSite('views/user/view_registration.php');

        if(empty($errors) === false){
            echo '<p>' . implode('</p><p>', $errors) . '</p>';  
        }
        if (isset($_GET['success']) && empty($_GET['success'])) {
          echo '<h2 style="color:green;">Thank you for registering. Please check your email.</h2>';
        }

?>
