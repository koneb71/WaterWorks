<?php
	//start session
	session_start();

	//attach all required files
	require 'DataBase.php';
	require 'users.php';
	require 'employee.php';
	require 'clients.php';
	require 'meter.php';
	require 'billingrate.php';
	#require 'ClassCategory.php';

	$user = new ClassUser($db);
	$employee= new ClassEmployee($db);
	$client = new ClassClients($db);
	$meter = new ClassMeter($db);
	$rate = new ClassBillingRate($db);
	#$category = new ClassCategory($db);
 ?>
