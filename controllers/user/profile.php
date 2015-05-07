
<?php 
require_once("models/profile/model_profile.php");
require_once("core/init.php");

$general->logged_out_protect();

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


affichageDuSite('views/user/view_profile.php');

if(isset($_GET['username']) && empty($_GET['username']) === false) { // Putting everything in this if block.

 	$username   = htmlentities($_GET['username']); // sanitizing the user inputed data (in the Url)
	if ($profile->user_exists($username) === false) { // If the user doesn't exist
		header('Location:index.php'); // redirect to index page. Alternatively you can show a message or 404 error
		die();
	}else{
		$profile_data 	= array();
		$user_id 		= $profile->fetch_info('id_users', 'username', $username); // Getting the user's id from the username in the Url.
		$profile_data	= $profile->userdata($user_id);
	}
?>
		<title><?php echo $username; ?></title>

			<h1><?php echo $profile_data['username']; ?>'s Profile</h1>

	    	<div id="profile_picture">

	    		<?php 
	    			$image = $profile_data['image_location'];
	    			echo "<img src='$image'>";
	    		?>
	    	</div>
	    	<div id="info">
	    		

	    		<?php
	    		 if(!empty($profile_data['first_name']) || !empty($profile_data['last_name'])){
	    			?>

		    		<span><strong>Name</strong>: </span>
		    		<span><?php if(!empty($profile_data['first_name'])) echo $profile_data['first_name'], ' ';
		    		 if(!empty($profile_data['last_name'])) echo $profile_data['last_name']; ?></span>

		    		<br>	
	    		<?php 
	    		} 
	    		
	    		if($profile_data['gender'] != 'undisclosed'){
	    		?>
		    		<span><strong>Gender</strong>: </span>
		    		<span><?php echo $profile_data['gender']; ?></span>
		    
		    		<br>
	    		<?php }

	    		if(!empty($profile_data['bio'])){
		    		?>
		    		<span><strong>Bio</strong>: </span>
		    		<span><div><?php echo $profile_data['bio']; ?></div></span>
		    		<?php 
	    		}
	    		?>
	    	</div>
	    	<div class="clear"></div>
	    </div> 
	    <p> 
<a href="?page=settings">settings</a>&nbsp;&nbsp;&nbsp;
<a href="?page=change_password&user=<?php echo $username;?>">change password</a><?php
}


	?>