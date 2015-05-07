<?php 
$config = array(
	'host'		=> 'db532198427.db.1and1.com',
	'username' 	=> 'dbo532198427',
	'password' 	=> 'gymnopedie',
	'dbname' 	=> 'db532198427',

);
$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'], $config['username'], $config['password']);   
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>