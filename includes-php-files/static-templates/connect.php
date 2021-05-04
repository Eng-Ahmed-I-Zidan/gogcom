
<?php

	$dsn = "mysql:host=localhost;dbname=gogcom";

	$option = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" );

	try{

		// Connect To Database Login With
		$connect = new PDO($dsn, 'root', '', $option);

		// Add Attribute By Object In Class [PDO:In Language]
		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} // If Found An Error In Database [Login] Will Catch It In This Method [catch]

	catch(PDOException $v){
		echo "Error: " . $v->getMessage();
	}
