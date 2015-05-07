<?php
require_once("models/admin/model_manage_users.php");
require_once("models/search/modelsearch.php");
require_once("core/init.php");

$general->logged_out_protect();


$members  = $manage_users->get_users();

$username = isset($_POST['username']) ? $_POST['username']: '';
$datepicker = isset($_POST['datepicker']) ? $_POST['datepicker']: '';


affichageDuSite('views/admin/view_manage_users.php');

echo '<div id="themembers">';
foreach ($members as $member)
{
$selection = TRUE;

	     $selection =( (strlen($username)==0) || ((strlen($username)!=0) && ($search->compareChaines($member->username, $username))) );      
	     $selection1 = ( (strlen($datepicker)==0) || ((strlen($datepicker)!=0) && $search->compareCp($member->time, date($datepicker) )) );
if(!empty($_POST) && $selection && $selection1 == true)
{
	if (isset($_GET['success']) && empty($_GET['success'])) {
    echo '<h3 style="color:red;">User\'s Details have been updated!</h3>';
}
	if (isset($_GET['delete']) && empty($_GET['delete'])) {
    echo '<h3>User suppression successfull !!!</h3>';
}
echo '<form action="?page=manage_users" method=post>';

$users = '<a href="?page=profile&username='. $member->username .'">'.$member->username.'</a> ID:'.$member->id_users.'<br/>'.'joined:'.  date('j F, Y', $member->time) .'<br/>';
?>
				
                <div id="profile_picture">
                 
               		<h3><b><?= $users ?></b></h3>
                    <ul>
        				<?php
        				 $image ="";
                        if(!empty ($member->image_location)){
                            $image = $member->image_location;
                            echo "<img src='$image'>";
                        }
                        ?>
                        <li>
                        <!--<input type="file" name="myfile" /> en cours de développement-->
                        </li>
                        <?php if($image !== 'views/img/avatars/default_avatar.png'){ ?>
	                        <li>
	                        <input type="checkbox" name="use_default" id="use_default" /> <label for="use_default">Use default picture</label>
	                        </li>
	                        <?php } ?>
						
                    </ul>
                </div>

<?php

echo'
<div id="personal_info">
<ul> <h3 >Manage Users</h3>

		 <li>
		 <h4>username:</h4>
		 <input type=text name="username" value="'. $member->username .'"/>
		 </li>
		 <li>
		 <h4>first name:</h4>
		 <input type=text name="first_name" value="'. $member->first_name .'"/>
		 </li> 

		 <li>
		 <h4>last name:</h4>
		 <input type=text name="last_name" value="'. $member->last_name .'"/>
		 </li> 
		<li>
		<h4>Password:</h4>
		<input type=text name="password" value="'. $member->password .'"/>
		</li>
		
		<!--<li>
		<h4>ID:</h4>
		<input type=text style="width:20px;" name="id" value="'. $member->id_users .'"/>
		</li>-->

		<li>
		<h4>newsletter:</h4>
		<input type=text name="newsletter" style="width:20px;height:20px;" value="'. $member->newsletter .'"/>
		</li>';

    echo'<li><h4>'.$member->gender.'</h4>';
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
            };                        
	echo'</select></li>';
	      
	echo'<li>
		<h4>statut:</h4>
		<input type=text name="confirmed" style="width:20px;" value="'. $member->confirmed .'"/>
		</li>
		<li>
		<h4>email:</h4>
		<input type=text name="email" value="'. $member->email .'"/>
		</li>
		<li>
		<h4>Image location:</h4>
		<input type=text style="width:200px;" name="image_location" value="'. $member->image_location .'"/>
		</li>

		<li>
		 <h4>Billing address:</h4>
		 <input type="text" name="address" style="width:250px" value="'. $member->address .'"/>
		</li>
		<li>
		<h4>Postal code:</h4>
		<input type="text" name="postal_code" style="width:90px" value="'.$member->postal_code.'"/>
		</li>
		<li>
		<h4>Town:</h4>
		<input type="text" name="town" style="width:90px" value="'.$member->town.'"/>
		</li>
		<li>
		<h4>Country:</h4>
		<input type="text" name="country" style="width:90px" value="'.$member->country.'"/>
		</li>
		<li>
		<h4>Phone number:</h4>
		<input type=text style="width:200px;" name="phone_number" value="'. $member->phone_number .'"/>
		</li>
		<li>
		<textarea name="bio">'. $member->bio .'</textarea>
		</li>
		<input type=hidden name="hidden" value='. $member->id_users .'/>
		</ul>
	</div>

	<div class="clear"></div>	
		<span>Update Changes:</span>
		<input type="submit" name="update" value="update" />
		<input type="submit" name="delete" value="delete"/>
</form>
<p>';


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
				$newpath = $member->image_location;
				}


		if(empty($errors) === true) {

			if(isset($_POST['update']))
			{
					if (isset($_FILES['myfile']) && !empty($_FILES['myfile']['name']) && $_POST['use_default'] != 'on')
					{
					$newpath = $general->file_newpath($path, $name);
					move_uploaded_file($tmp_name, $newpath);

					}else if(isset($_POST['use_default']) && $_POST['use_default'] === 'on'){
                    $newpath = 'views/img/avatars/default_avatar.png';
                    }


				$image_location	= htmlentities(trim($newpath));
				
				if($manage_users->admin_update_user($_POST['username'], $_POST['first_name'], $_POST['last_name'],
						$_POST['email'], $_POST['gender'], $_POST['image_location'],
						$_POST['password'],$_POST['confirmed'],$_POST['bio'], $_POST['newsletter'], $_POST['address'], $_POST['postal_code'], $_POST['town'], $_POST['country'], $_POST['phone_number'], $_POST['hidden']))
				{
				header('Location: ?page=manage_users&success');
				echo ' update successfull !!!';
				exit();
				}
			}

}else if (empty($errors) === false){
				echo '<p>' . implode('</p><p>', $errors) . '</p>';	
				}

	$lol = $member->id_users;
	if(isset($_POST['delete']))
	{
		$manage_users->delete_user($lol);
		header('Location: ?page=manage_users&delete');
		exit();
	}
}
}//FIN FOREACH
?>
