<?php
require_once("models/admin/model_manage_users.php");
require_once("models/search/modelsearch.php");
require_once("core/init.php");

$general->logged_out_protect();
$members  = $manage_users->get_users();
$username = isset($_POST['username']) ? $_POST['username']: '';
$datepicker = isset($_POST['datepicker']) ? $_POST['datepicker']: '';
affichageDuSite('views/admin/view_manage_usersv2.php');


foreach ($members as $member)
{
$selection = TRUE;

$selection =( (strlen($username)==0) || ((strlen($username)!=0) && ($search->compareChaines($member->username, $username))) );
$selection1 = ( (strlen($datepicker)==0) || ((strlen($datepicker)!=0) && $search->compareCp($member->time, date($datepicker) )) );
	if(!empty($_POST) && $selection && $selection1 == true)
	{







				if (isset($_GET['success']) && empty($_GET['success'])) {
				    echo '<h3>Your details have been updated!</h3>';
				}else{

				if(empty($_POST) === false){

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
					
									if (!isset($_POST['address']) && empty($_POST['address'])){
										$errors[] = 'billing address required for transaction purchase';
									}
									if (isset($_POST['postal_code']) && !empty ($_POST['postal_code'])){
										if(is_numeric($_POST['postal_code']) === false){
										$errors[] = 'Only numeric Postal code required for transaction purchase';
										}
									}
									if (isset($_POST['town']) && !empty ($_POST['town'])){
										if (ctype_alpha($_POST['last_name']) === false) {
										$errors[] = 'Town required for transaction purchase';
										}
									}
									if (isset($_POST['country']) && !empty ($_POST['country'])){
										if (ctype_alpha($_POST['last_name']) === false) {
										$errors[] = 'Country required for transaction purchase';
										}
									}

								if (isset($_POST['gender']) && !empty($_POST['gender'])){
								$allowed_gender = array('undisclosed', 'Male', 'Female');

									if (in_array($_POST['gender'], $allowed_gender) === false){
									$errors[] = 'Please choose a Gender from the list';	
									}

								} 

							$pattern  = "#^[ +()._0123456789-]+$#";
							  if(preg_match($pattern, $_POST['phone_number']) === false) {
								$errors[] = 'special caractere are not allowed except (+,-,(),.)';	
							  }

								if (isset($_FILES['myfile']) && !empty($_FILES['myfile']['name'])){
									
									$name 			= $_FILES['myfile']['name'];
									$tmp_name 		= $_FILES['myfile']['tmp_name'];
									$allowed_ext 	= array('jpg', 'jpeg', 'png', 'gif' );
									$a 				= explode('.', $name);
									$file_ext 		= strtolower(end($a)); unset($a);
									$file_size 		= $_FILES['myfile']['size'];		
									$path 			= "views/img/avatars";
									
									if (in_array($file_ext, $allowed_ext) === false){
									$errors[] = 'Image file type not allowed';	
									}
									
									if ($file_size > 2097152){
									$errors[] = 'File size must be under 2mb';
									}
									
								}else{
								$newpath = $user['image_location'];
								}

								if(empty($errors) === true) {
									
									if (isset($_FILES['myfile']) && !empty($_FILES['myfile']['name']) && $_POST['use_default'] != 'on'){
								
										$newpath = $general->file_newpath($path, $name);
										move_uploaded_file($tmp_name, $newpath);

									}else if(isset($_POST['use_default']) && $_POST['use_default'] === 'on'){
				                    $newpath = 'views/img/avatars/default_avatar.png';
				                    }
											
									$first_name 	= htmlentities(trim($_POST['first_name']));
									$last_name 		= htmlentities(trim($_POST['last_name']));	
									$gender 		= htmlentities(trim($_POST['gender']));
									$bio 			= htmlentities(trim($_POST['bio']));
									$image_location	= htmlentities(trim($newpath));
									$phone_number 	= htmlentities(trim($_POST['phone_number']));
									$address 		= htmlentities(trim($_POST['address']));
									$postal_code 	= htmlentities(trim($_POST['postal_code']));
									$town 			= htmlentities(trim($_POST['town']));
									$country 		= htmlentities(trim($_POST['country']));
									$email 			= htmlentities(trim($_POST['email']));
									$settings->update_user($first_name, $last_name, $gender, $bio, $image_location, $phone_number, $address, $postal_code, $town, $country, $email, $user_id);
									header('Location: ?page=settings&success');
									exit();
								
								}else if (empty($errors) === false){
								echo '<p>' . implode('</p><p>', $errors) . '</p>';	
								}

								///SUBSCRIBE NEWSLETTERS
								$int 	  = 1;            
								$username = htmlentities($user['username']);
								$email 	  = htmlentities($user['email']);
								$id 	  = $user['id_users'];


									if(empty($_POST['email'])){

									$errors[] = 'Please'.' '.$username.' '.'enter your email adress.';
									}else{

										if ((filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) || ((filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) != $email)))
										{				
										$errors[] = 'Come on !!'.' '.$username.' '.'it\'s not serious !! Enter your real email address';		
										}
									}//fin else

									if(empty($errors) === true){
										$usernews = $settings->valide_newsletter($int,$email, $id);
										header('Location: ?page=home.php?success');
										exit();
									}		
								///SUBSCRIBE NEWSLETTERS
							}

	}
}


if(empty($errors) === false){
echo '<p>' . implode('</p><p>', $errors) . '</p>';	
}

			if(isset($_POST['checkbox']) && $_POST['value'] === 0){
			$intzero = 0;
			$usernews = $settings->valide_newsletter($intzero,$email, $id);
			
			}

}



?>

