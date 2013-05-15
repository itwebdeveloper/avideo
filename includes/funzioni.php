<?php


	function apri_connessione() {
		global $db_host, $db_user, $db_password, $db_name, $db;
		$db = new mysqli($db_host, $db_user, $db_password, $db_name);
		return $db;
	}

	function date_time_conversion($timestamp) {
		$date_time = date(DATE_RFC822, $timestamp);
		return $date_time;
	}

	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}


?>