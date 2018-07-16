<?php
	//start session
	session_start();

	//attach all required files
	require 'DataBase.php';
	require 'users.php';
	#require 'ClassCategory.php';

	$user = new ClassClient($db);
	#$category = new ClassCategory($db);
 ?>
