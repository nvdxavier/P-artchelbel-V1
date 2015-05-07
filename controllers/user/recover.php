<?php
//require_once("models/login/model_login.php");

require_once("models/recover/model_recover.php");
$general->logged_in_protect();
affichageDuSite('views/user/view_recover.php');

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


	if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
?>

	<h3>Thanks, please check your email to confirm your request for a password.</h3>
		
<?php			
	}else{ ?>
			
		  <h2>Recover Username / Password</h2>
		    <h3>Enter your email below so we can confirm your request.</h3>
		    <hr />

<?php
			if (isset($_POST['email']) === true && empty($_POST['email']) === false) {
				if ($recover->email_exists($_POST['email']) === true){
					$recover->confirm_recover($_POST['email']);

					header('Location:?page=recover&success');
					exit();
					
				} else {
					echo '<h3 style="color:red">Sorry, that email doesn\'t exist.</h3>';
				}
			} 
		?><form action="" method="post">
						<ul>
						<li>
						<!--<input type="text" required name="email">-->
						<input type="text" name="email" />
						</li>
						<li><input type="submit" value="Recover" /></li>
						</ul>
						</form>			
	<?php	}
    echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>';


	 ?>