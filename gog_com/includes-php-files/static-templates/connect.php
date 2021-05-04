
<?php

	$dsn = "mysql:host=localhost;dbname=gogcom";

	$option = array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" );

	try{

		// Connect To Database Login With
		$connect = new PDO($dsn, 'root', '', $option);

		// Add Attribute By Object In Class [PDO:In Language]
		$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		// define all tables name as global to use every where
		$allGameInOnePlaceTable = "gogcom_all_game_in_one_place";
		$userCartTable = "gogcom_cart";
		$userWishlistTable = "gogcom_wishlist";
		$gogLanguageTable = "gog_lang";
		$usersAccountInfo = "gog_users";
		/* tables of games change from game to another */
		// game table defination in your page [game page]
		// [$gameCommentsTableName] under this name


	} // If Found An Error In Database [Login] Will Catch It In This Method [catch]

	catch(PDOException $v){
		echo "Error: " . $v->getMessage();
	}
