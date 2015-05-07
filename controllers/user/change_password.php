<?php 
require_once("core/init.php");
require_once("models/recover/model_recover.php");
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


if(isset($_GET['user']) && empty($_GET['user']) === false) {
        if(empty($_POST) === false) {
           
            if(empty($_POST['current_password']) || empty($_POST['password']) || empty($_POST['password_again'])){

                $errors[] = '<h3 style="color:red">All fields are required</h3>';

            }else if($bcrypt->verify($_POST['current_password'], $user['password']) === true) {

                if (trim($_POST['password']) != trim($_POST['password_again'])) {
                    $errors[] = '<h3 style="color:red">Your new passwords do not match</h3>';
                } else if (strlen($_POST['password']) < 6) { 
                    $errors[] = '<h3 style="color:red">Your password must be at least 6 characters</h3>';
                } else if (strlen($_POST['password']) >18){
                    $errors[] = '<h3 style="color:red">Your password cannot be more than 18 characters long</h3>';
                } 

            } else {
                $errors[] = '<h3 style="color:red">Your current password is incorrect</h3>';
            }
        }

        if (isset($_GET['success']) === true && empty ($_GET['success']) === true ) {
    		echo '<h3>Your password has been changed!</h3>';
        } else {?>

            
            <?php
            if (empty($_POST) === false && empty($errors) === true) {
                $recover->change_password($user['id_users'], $_POST['password']);
                header('Location: ?page=change_password&success');
                echo '<h3>your password has been successfully changed !</h3>';
            } else if (empty ($errors) === false) {
                    
                echo '<p>' . implode('</p><p>', $errors) . '</p>';  
            
            }
affichageDuSite('views/user/view_change_password.php');

        }
    }
        ?> 