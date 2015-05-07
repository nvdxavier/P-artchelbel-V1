<?php
session_start();

require 'connect/database.php';
require 'classes/core_model.php';
require 'classes/core_controller.php';
require 'classes/core_general.php';
require 'classes/core_bcrypt.php';
require 'classes/core_admin.php';



$coremodel   = new Model($db);
$general = new General();
$corecontroller = new Controller();
$bcrypt 	= new Bcrypt(12);
$admin = new Admin($db);

error_reporting();
if ($general->logged_in() === true)  {
	$user_id = $_SESSION['id_users'];
	$user 	= $coremodel->userdata($user_id);
}
$errors = array();
ob_start();

