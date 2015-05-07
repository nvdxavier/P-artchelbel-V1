<?php 
$config = array(
	'host'		=> 'db550163213.db.1and1.com',
	'username' 	=> 'dbo550163213',
	'password' 	=> 'gymnopedie',
	'dbname' 	=> 'db550163213',

);


$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);   
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>