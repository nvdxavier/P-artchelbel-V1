<?php
$general->logged_in_protect();

require_once("models/recover/model_recover.php");

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


if (isset($_GET['success']) === true && empty ($_GET['success']) === true) {
            ?>
            <h3>Thank you, we've send you a randomly generated password in your email.</h3>
            <?php
            
        } else if (isset ($_GET['email'], $_GET['generated_string']) === true) {
            
            $email		=trim($_GET['email']);
            $string	    =trim($_GET['generated_string']);	
            
            if ($recover->email_exists($email) === false || $recover->recover($email, $string) === false) {
                $errors[] = '<h3 style="color:red">Sorry, something went wrong and we couldn\'t recover your password.</h3>';
            }
            
            if (empty($errors) === false) {    		

        		echo '<p>' . implode('</p><p>', $errors) . '</p>';
    			
            } else {

                header('Location: ?page=recoverpaswd&success');
                exit();
            }
        
        } else {
            header('Location: index.php'); // If the required parameters are not there in the url. redirect to index.php
            exit();
        }

affichageDuSite('views/user/view_recoverpaswd.php');
?>