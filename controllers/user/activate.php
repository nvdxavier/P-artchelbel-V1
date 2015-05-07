<?php
require_once("models/registration/model_registration.php");

affichageDuSite('views/user/view_success.php');

        if (isset($_GET['success']) === true && empty ($_GET['success']) === true) {
	    ?>    
	    <h2 style="color:green;">Thank you, we've activated your account. You're free to log in!</h2>
	     
	   <?php      
        } else if (isset ($_GET['email'], $_GET['email_code']) === true) {
            
            $email		=trim($_GET['email']);
            $email_code	=trim($_GET['email_code']);	
            
            if ($register->email_exists($email) === false) {
                $errors[] = '<h2 style="color:red;">Sorry, we couldn\'t find that email address</h2>';
            } else if ($register->activate($email, $email_code) === false) {
                $errors[] = '<h2 style="color:red;">Sorry, we have failed to activate your account</h2>';
            }
            
			if(empty($errors) === false){
			
				echo '<p>' . implode('</p><p>', $errors) . '</p>';	
		
			}else{
                header('Location: ?page=activate&success');
                exit();
            }
        
        }else{
            header('Location: ?page=latestprod');
            exit();
        }

?>