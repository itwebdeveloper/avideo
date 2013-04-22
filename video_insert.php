<?php
	include("includes/funzioni.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Video insert</title>
	</head>
	<body>
<?php
	if (isset($_POST['videos_insert'])) {
		$db = apri_connessione();
		
		for ($i=0; $i<$_POST['max_rows']; $i++) {
			$query = "INSERT INTO `avideo`.`av_videos` (
				`host` ,
				`host_video_ID` ,
				`title` ,
				`description` ,
				`thumbnail_default` ,
				`thumbnail_medium` ,
				`thumbnail_high`,
				`timestamp_insert`,
				`timestamp_edit`
				)
				VALUES (
				'".$_POST['host']."', '".$_POST['host_video_ID_'.$i]."', '".mysql_real_escape_string($_POST['title_'.$i])."', '".mysql_real_escape_string($_POST['description_'.$i])."', '".$_POST['thumbnail_default_'.$i]."', '".$_POST['thumbnail_medium_'.$i]."', '".$_POST['thumbnail_high_'.$i]."', '".$current_timestamp."', '".$current_timestamp."'
				);
			";
			
			if (!$result = mysql_query($query, $db)) {
				echo mysql_error()."<br />";
				echo $query."<br />";
		    	mysql_close($db);
				die("Problemi l'esecuzione della query.");
			}
		}
		echo $_POST['max_rows']." video inseriti correttamente nel DB.";
		mysql_close();
	}
?>
	</body>
</html>