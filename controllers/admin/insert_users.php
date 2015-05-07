<?php
require_once("models/admin/model_insert_users.php");
require_once("core/init.php");
require_once("models/search/modelsearch.php");
$general->logged_out_protect();


	    if (isset($_GET['success']) && empty($_GET['success'])) {
	        echo '<h3>A new user are created!</h3>';	
      
	    }else{

            if(empty($_POST) === false) {
				if (isset($_POST['username']) && !empty ($_POST['username'])){
					if (ctype_alpha($_POST['username']) === false) {
					$errors[] = 'Please enter your Username with only letters!';
					}
				}
				if (isset($_POST['first_name']) && !empty ($_POST['first_name'])){
					if (ctype_alpha($_POST['first_name']) === false) {
					$errors[] = 'Please enter your First Name with only letters!';
					}	
				}
				if (isset($_POST['last_name']) && !empty ($_POST['last_name'])){
					if (ctype_alpha($_POST['last_name']) === false) {
					$errors[] = 'Please enter your Last Name with only letters!';
					}	
				}
				if (strlen($_POST['password']) <6){
						$errors[] = 'Your password must be atleast 6 characters';
					} else if (strlen($_POST['password']) >18){
						$errors[] = 'Your password cannot be more than 18 characters long';
					}
				if (isset($_POST['generated_string']) && !empty($_POST['generated_string'])) {
					$allowed_statut = array('0', '1');

					if (in_array($_POST['generated_string'], $allowed_statut) === false) {
					$errors[] = 'Please choose a Statut from the list';	
					}

				}
				if (isset($_POST['gender']) && !empty($_POST['gender'])) {
					$allowed_gender = array('undisclosed', 'Male', 'Female');

					if (in_array($_POST['gender'], $allowed_gender) === false) {
					$errors[] = 'Please choose a Gender from the list';	
					}

				}
		        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
		            	$errors[] = 'Please enter a valid email address';
		        	}else if ($insert_users->email_exists($_POST['email']) === true) {
		            	$errors[] = 'That email already exists.';
		        }				

				if (!isset($_POST['billing_address']) && empty($_POST['billing_address'])){
					$errors[] = 'billing address required for transaction purchase';
				}

				if (isset($_POST['postal_code']) && !empty ($_POST['postal_code'])){
					if(is_numeric($_POST['postal_code']) === false){
					$errors[] = 'Only numeric Postal code required for transaction purchase';
					}
				}

				if (isset($_POST['country']) && !empty ($_POST['country'])){
					if (ctype_alpha($_POST['last_name']) === false) {
					$errors[] = 'Country required for transaction purchase';
					}
				}

				$pattern  = "#^[+()._0123456789-]+$#";
			  if(preg_match($pattern, $_POST['phone_number']) === false) {
				$errors[] = 'special caractere are not allowed except (+,-,(),.)';	
			  }

				if (isset($_FILES['myfile']) && !empty($_FILES['myfile']['name'])) {
					
					$name 			= $_FILES['myfile']['name'];
					$tmp_name 		= $_FILES['myfile']['tmp_name'];
					$allowed_ext 	= array('jpg', 'jpeg', 'png', 'gif' );
					$a 				= explode('.', $name);
					$file_ext 		= strtolower(end($a)); unset($a);
					$file_size 		= $_FILES['myfile']['size'];		
					$path 			= "views/img/avatars";
					
					if (in_array($file_ext, $allowed_ext) === false) {
						$errors[] = 'Image file type not allowed';	
					}
					
					if ($file_size > 2097152) {
						$errors[] = 'File size must be under 2mb';
					}
					
				} else {
					$newpath = $user['image_location'];
				}

				if(empty($errors) === true) {
					
					if (isset($_FILES['myfile']) && !empty($_FILES['myfile']['name']) && $_POST['use_default'] != 'on') {
				
						$newpath = $general->file_newpath($path, $name);

						move_uploaded_file($tmp_name, $newpath);

					}else if(isset($_POST['use_default']) && $_POST['use_default'] === 'on'){
                        $newpath = 'avatars/default_avatar.png';
                    }
                    //ces variables doivent récupérer le résultat de chaque champs
					$username 		= htmlentities(trim($_POST['username']));		
					$first_name 	= htmlentities(trim($_POST['first_name']));
					$last_name 		= htmlentities(trim($_POST['last_name']));	
					$gender 		= htmlentities(trim($_POST['gender']));
					$bio 			= htmlentities(trim($_POST['bio']));
					$image_location	= htmlentities(trim($newpath));
					$password 		= trim($_POST['password']);
					$email 			= htmlentities(trim($_POST['email']));
					$confirmed 		= trim($_POST['confirmed']);
					//$generated_string = 0;
					$generated_string = htmlentities(trim($_POST['generated_string']));
//$generated_string = isset($_POST['generated_string']);
					$newsletter     = htmlentities(trim($_POST['newsletter']));
					$address		=  htmlentities(trim($_POST['billing_address']));
					$town			= htmlentities(trim($_POST['town']));
					$postal_code	= htmlentities(trim($_POST['postal_code']));
					$country 		= htmlentities(trim($_POST['country']));
					$phone_number 	= htmlentities(trim($_POST['phone_number']));


					$insert_users->create_user($username, $first_name, $last_name, $gender, $bio, $image_location, $password, $email, $confirmed, $generated_string, $newsletter, $address, $town, $postal_code, $country, $phone_number);
					header('Location: ?page=insert_users&success');
					//exit();
				
				} else if (empty($errors) === false) {
					echo '<p>' . implode('</p><p>', $errors) . '</p>';
					$error_message = implode(", ", $errors);
					$_SESSION['error_message'] = $error_message;

				}	
            }

 affichageDuSite('views/admin/view_insert_users.php'); 
 }      
?>		