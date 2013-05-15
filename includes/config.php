<?php


	error_reporting(E_ALL);
	ini_set('display_errors',1);
	ini_set("html_errors", 1);
	/* File di configurazione del sito */

	/* Inizio configurazione generale */
	// Prefisso della tabella nel database MySQL
	$_CONFIG['table_suffix']="av_";
	/* Fine configurazione generale */

	/* Inizio parametri del database */
	$db_host = "localhost";
	$db_user = "borghesia";
	$db_password = "tianming";
	$db_name = "avideo";
	/* Fine parametri del database */

	require("funzioni.php");
  	require('libs/Smarty.class.php');

	$operator = "1";
	$current_timestamp = time();

	$link = @mysql_connect($db_host,$db_user,$db_password) or die('Unable to establish a DB connection');

	mysql_set_charset('utf8');
	mysql_select_db($db_name,$link);


?>