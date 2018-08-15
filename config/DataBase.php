<?php
	//config for Database
	$config = array(
		'host' => 'localhost' ,
		'username' => 'root' ,
		'password' => '' ,
		'dbname' => 'waterworks2'
		);

	//connect to dataBase
	$db = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=utf8', $config['username'], $config['password']);

	//error handling
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
