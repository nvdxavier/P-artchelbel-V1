<link rel="stylesheet" href="views/css/adminstyle.css">
<h2>Add a new user.</h2>
            <hr />

            <form action="" method="post" enctype="multipart/form-data">
                <div id="profile_picture">
                 
               		<h3>Add Profile Picture</h3>
                    <ul>
        				<?php
                        if(!empty ($user['image_location'])) {
                            $image = $user['image_location'];
                            echo "<img src='$image'>";
                        }
                        $image ='';
                        ?>
                        
                        <li>
                        <input type="file" name="myfile" />
                        </li>
                        <?php if($image !== '../avatars/default_avatar.png'){ ?>
	                        <li>
	                            <input type="checkbox" name="use_default" id="use_default" /> <label for="use_default">Use default picture</label>
	                        </li>
	                        <?php } ?>
                    </ul>
                </div>
            	<div id="personal_info">
	            	<h3 >Insert Profile Information </h3>
	            	<h3 style="color:red;">
					<?php if(isset($_SESSION['error_message'])){
					 $error_message = $_SESSION['error_message'];
					 echo $error_message;
					} ?>
	            	</h3>

	                <ul>
	                	<li>
	                        <h4>Username:</h4>
	                        <input type="text" name="username" value="<?php if (isset($_POST['username']) ){echo htmlentities(strip_tags($_POST['username']));} //else { echo $user['username']; }?>">
	                    </li>
	                    <li>
	                        <h4>First name:</h4>
	                        <input type="text" name="first_name" value="<?php if (isset($_POST['first_name']) ){echo htmlentities(strip_tags($_POST['first_name']));} //else { echo $user['first_name']; }?>">
	                    </li>     
	                    <li>
	                        <h4>Last name: </h4>
	                        <input type="text" name="last_name" value="<?php if (isset($_POST['last_name']) ){echo htmlentities(strip_tags($_POST['last_name']));} //else { echo $user['last_name']; }?>">
	                    </li>
	                    <li>
	                        <h4>Password: </h4>
	                        <input type="text" name="password" value="<?php if (isset($_POST['password']) ){echo htmlentities(strip_tags($_POST['password']));} ?>">
	                    </li>
	                    <li>
	                        <h4>Email: </h4>
	                        <input type="text" name="email" value="<?php if (isset($_POST['email']) ){echo htmlentities(strip_tags($_POST['email']));} ?>">
	                    </li>
	                    <li>
	                        <h4>Phone number: </h4>
	                        <input type="text" name="phone_number" value="<?php if (isset($_POST['phone_number']) ){echo htmlentities(strip_tags($_POST['phone_number']));} ?>">
	                    </li>
	                    <li>
	                        <h4>Statut:</h4>
	                        <?php
	                        	$generated_string 	= ' ';
	                        	$options 	= array("0", "1");
	                            echo '<select name="generated_string">';
	                            foreach($options as $option){
	                               	if($generated_string == $option){
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
	                        <h4>Gender:</h4>
	                        <?php
	                        	$gender 	= ' ';
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
							<h4>Account confirmed ?:</h4>
							<select name="confirmed">
							    <option value="0">No</option>
							    <option value="1">Yes</option>
							</select>
						</li>
						<li>
							<h4>newsletter activated ?:</h4>
							<select name="newsletter">
							    <option value="0">No</option>
							    <option value="1">Yes</option>
							</select>
						</li>
						<li>
	                        <h4>Billing Address: </h4>
	                        <input type="text" name="billing_address" style="width:200px;" value="<?php if (isset($_POST['billing_address']) ){echo htmlentities(strip_tags($_POST['billing_address']));} //else { echo $user['last_name']; }?>">
	                    </li>
	                    <li>
	                        <h4>Postal code: </h4>
	                        <input type="text" name="postal_code" value="<?php if (isset($_POST['postal_code']) ){echo htmlentities(strip_tags($_POST['postal_code']));} //else { echo $user['last_name']; }?>">
	                    </li>
	                    <li>
	                        <h4>town: </h4>
	                        <input type="text" name="town" value="<?php if (isset($_POST['town']) ){echo htmlentities(strip_tags($_POST['town']));} //else { echo $user['last_name']; }?>">
	                    </li>
	                    <li>
	                        <h4>country: </h4>
	                        <input type="text" name="country" value="<?php if (isset($_POST['country']) ){echo htmlentities(strip_tags($_POST['country']));} //else { echo $user['last_name']; }?>">
	                    </li>
	                    <li>
	                        <h4>Bio:</h4>
	                        <textarea name="bio" cols="60" rows="12"><?php if (isset($_POST['bio']) ){echo htmlentities(strip_tags($_POST['bio']));} ?></textarea>
	                    </li>
	            	</ul>    
            	</div>
            	<div class="clear"></div>
            	<hr />
            		<span>Create User:</span>
                    <input type="submit" value="create">
               
            </form>
		<!--<div id="container"></div>-->
<!--<div id="admin2">  </div>-->


