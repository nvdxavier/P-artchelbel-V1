<?php
require_once("models/settings/model_settings.php");
$general->logged_out_protect();
affichageDuSite('views/user/view_settings.php');

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


if (isset($_GET['success']) && empty($_GET['success'])) {
    echo '<h3>Your details have been updated!</h3>';
}else{

if(empty($_POST) === false){

				if (isset($_POST['first_name']) && !empty ($_POST['first_name'])){
					if (ctype_alpha($_POST['first_name']) === false) {
					$errors[] = '<h3 style="color:red">Please enter your First Name with only letters!</h3>';
					}	
				}
				if (isset($_POST['last_name']) && !empty ($_POST['last_name'])){
					if (ctype_alpha($_POST['last_name']) === false) {
					$errors[] = '<h3 style="color:red">Please enter your Last Name with only letters!</h3>';
					}	
				}
	
					if (!isset($_POST['address']) && empty($_POST['address'])){
						$errors[] = '<h3 style="color:red">billing address required for transaction purchase</h3>';
					}
					if (isset($_POST['postal_code']) && !empty ($_POST['postal_code'])){
						if(is_numeric($_POST['postal_code']) === false){
						$errors[] = '<h3 style="color:red">Only numeric Postal code required for transaction purchase</h3>';
						}
					}
					if (isset($_POST['town']) && !empty ($_POST['town'])){
						if (ctype_alpha($_POST['last_name']) === false) {
						$errors[] = '<h3 style="color:red">Town required for transaction purchase</h3>';
						}
					}
					if (isset($_POST['country']) && !empty ($_POST['country'])){
						if (ctype_alpha($_POST['last_name']) === false) {
						$errors[] = '<h3 style="color:red">Country required for transaction purchase</h3>';
						}
					}

				if (isset($_POST['gender']) && !empty($_POST['gender'])){
				$allowed_gender = array('undisclosed', 'Male', 'Female');

					if (in_array($_POST['gender'], $allowed_gender) === false){
					$errors[] = '<h3 style="color:red">Please choose a Gender from the list</h3>';	
					}

				} 

			$pattern  = "#^[ +()._0123456789-]+$#";
			  if(preg_match($pattern, $_POST['phone_number']) === false) {
				$errors[] = '<h3 style="color:red">special caractere are not allowed except (+,-,(),.)</h3>';	
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
					$errors[] = '<h3 style="color:red">Image file type not allowed</h3>';	
					}
					
					if ($file_size > 2097152){
					$errors[] = '<h3 style="color:red">File size must be under 2mb</h3>';
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

					$errors[] = '<h3 style="color:red">Please'.' '.$username.' '.'enter your email adress.</h3>';
					}else{

						if ((filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) || ((filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) != $email)))
						{				
						$errors[] = '<h3 style="color:red">Come on !!'.' '.$username.' '.'it\'s not serious !! Enter your real email address</h3>';		
						}
					}//fin else

					if(empty($errors) === true){
						$usernews = $settings->valide_newsletter($int,$email, $id);
						header('Location: ?page=home.php?success');
						exit();
					}		
				///SUBSCRIBE NEWSLETTERS
			}

?>
   		<h2>Settings.</h2>
            <hr />

            <form action="" method="post" enctype="multipart/form-data">
      		<!--<link rel="stylesheet" href="views/css/partchelbel.css" type="text/css" />-->

                <div id="profile_picture">
                 
               		<h3>Change Profile Picture</h3>
                    <ul>
        				<?php
        				 //$image ="";
                        if(!empty ($user['image_location'])){
                            $image = $user['image_location'];
                            echo "<img src='$image'>";
                        }
                        ?>
                        <li>
                        <input type="file" name="myfile" />
                        </li>
                        <?php if($image !== 'views/img/avatars/default_avatar.png'){ ?>
	                        <li>
	                        <input type="checkbox" name="use_default" id="use_default" /> <label for="use_default">Use default picture</label>
	                        </li>
	                        <?php } ?>
                    </ul>
                </div>
            
            	<div id="personal_info">
	            <h3 >Change Profile Information </h3>
	                <ul>
	                    <li>
	                        <h4>First name:</h4>
	                        <input type="text" name="first_name" value="<?php if (isset($_POST['first_name']) ){echo htmlentities(strip_tags($_POST['first_name']));} else { echo $user['first_name']; }?>">
	                    </li>    
	                    <li>
	                        <h4>Last name: </h4>
	                        <input type="text" name="last_name" value="<?php if (isset($_POST['last_name']) ){echo htmlentities(strip_tags($_POST['last_name']));} else { echo $user['last_name']; }?>">
	                    </li>
	                    <li>
	                        <h4>Gender:</h4>
	                        <?php
	                       	 	$gender 	= $user['gender'];
	                        	$options 	= array("undisclosed", "Male", "Female");
	                        	echo '<select name="gender">';
	                            foreach($options as $option){
	                               	if($gender == $option){
	                               		$sel = 'selected="selected"';
	                               	}else{
	                               	$sel='';
	                               	}
	                                echo '<option '. $sel .'>' . $option . '</option>';
	                            }
	                        ?>
	                        </select>
	                    </li>

	                    <li>
	                        <h4>Phone number:</h4>
	                        <input type="text" name="phone_number" value="<?php if (isset($_POST['phone_number']) ){echo htmlentities(strip_tags($_POST['phone_number']));} else { echo $user['phone_number']; }?>">
	                    </li>
	                    <li>
	                        <h4>Billing Address:</h4>
	                        <input type="text" name="address" style="width:250px" value="<?php if (isset($_POST['address']) ){echo htmlentities(strip_tags($_POST['address']));} else { echo $user['address']; }?>">
	                    </li>
	                    <li>
	                        <h4>Postal code:</h4>
	                        <input type="text" name="postal_code" style="width:90px" value="<?php if (isset($_POST['postal_code']) ){echo htmlentities(strip_tags($_POST['postal_code']));} else { echo $user['postal_code']; }?>">
	                    </li>
	                    <li>
	                        <h4>Town:</h4>
	                        <input type="text" name="town" style="width:150px" value="<?php if (isset($_POST['town']) ){echo htmlentities(strip_tags($_POST['town']));} else { echo $user['town']; }?>">
	                    </li>
	                    <li>
	                        <h4>Country:</h4>
	                        <input type="text" name="country" style="width:150px" value="<?php if (isset($_POST['country']) ){echo htmlentities(strip_tags($_POST['country']));} else { echo $user['country']; }?>">
	                    </li>
	                    <li>
	                        <h4>Email:</h4>
	                        <input type="text" name="email" style="width:200px" value="<?php if (isset($_POST['email']) ){echo htmlentities(strip_tags($_POST['email']));} else { echo $user['email']; }?>">
	                    </li>
	                    <li>
	                        <h4>Bio:</h4>
	                        <textarea name="bio"><?php if (isset($_POST['bio']) ){echo htmlentities(strip_tags($_POST['bio']));} else { echo $user['bio']; }?></textarea>
	                    </li>
					<li>
						<?php 
						$username = htmlentities($user['username']);
						if($settings->verifnl($username) == true){
						echo '<li>Unsubscribe to newsletter <input type="checkbox" name="check" id="checkbox" value="0"/></li>';
						}else{
						echo'<li><h4>Subscribe to newsletter ??</h4>
							<p><input type="text" name="email" placeholder="e-mail" /></li>';
						}
						?>
					</li> 
	            	</ul>    
            	</div>

            	<div class="clear"></div>
            	<p>
            		<span>Update Changes:</span>
                    <input type="submit" value="Update">
               
            </form>
<?php 
if(empty($errors) === false){
echo '<p>' . implode('</p><p>', $errors) . '</p>';	
}

			if(isset($_POST['checkbox']) && $_POST['value'] === 0){
			$intzero = 0;
			$usernews = $settings->valide_newsletter($intzero,$email, $id);
			
			}

}
?>