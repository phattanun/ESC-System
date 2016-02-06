<?php
/** ********************************************** **
	@DEMO AUTOSUGGEST
	@Last Update	2:39 PM Wednesday, June 03, 2015
*************************************************** **/

	if(isset($_REQUEST['search']) && !empty($_REQUEST['search'])) {
	
		/**
			PARAMS
			$LIMIT 		= limit your query [1 - 1000]
			$KEYWORD 	= Letters/Keywords typed by the user
			
			USE THESE PARAMS TO CREATE THE QUERY.
			Quick Mysql Query Example:
			
			mysql_query("SELECT * FROM my_table WHERE title LIKE '%$KEYWORK%' LIMIT $LIMIT");
			
			Add All results to an array and encode the array with JSON. Please, see below!
		**/
		$LIMIT 		= isset($_REQUEST['limit']) 	? (int) 	$_REQUEST['limit'] 		: 30;
		$KEYWORD 	= isset($_REQUEST['search']) 	? (string) 	$_REQUEST['search'] 	: null;








		/**
			Country Array List - Demo Purpose Only!

		**/
		$array = array(
			"5631011021","5631009821","5631008121","563100121","5631011021","5631011021","5631011021"
		);

		// Convert to JSON
		$json = json_encode($array);

		// Print JSON
		die($json);

	}
?>