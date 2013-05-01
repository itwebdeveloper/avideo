<?php
	include("includes/config.php");

	function apri_connessione()
	{
		include("includes/config.php");
		$db = mysql_connect($db_host, $db_user, $db_password);
		if ($db == TRUE)	{
			mysql_select_db($db_name, $db) or die ("Errore nella selezione del database.");
		};
		return $db;
	}

	function date_time_conversion($timestamp) {
		$date_time = date(DATE_RFC822, $timestamp);
		return $date_time;
	}

	$operator = "1";
	$current_timestamp = time();

	$link = @mysql_connect($db_host,$db_user,$db_password) or die('Unable to establish a DB connection');

	mysql_set_charset('utf8');
	mysql_select_db($db_name,$link);

	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}


?>