<?php
	include("includes/funzioni.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Random views insert</title>
	</head>
	<body>
		<h1>Random views insert</h1>

<?php
 	if (isset($_GET['views'])) {			
			$num_users = 5;
			
			$db = apri_connessione();
			
			$query_videos_select = "SELECT * FROM ".$_CONFIG["table_suffix"]."videos"; 
			$result_videos_select = mysql_query($query_videos_select, $db);
	
			$num_videos = mysql_num_rows($result_videos_select);
			$views_count = 0;
			
			for ($i=0; $i<$_GET['views']; $i++) {
				$random_timestamp = rand(strtotime('Last Month'), time());
				
				$query_views_insert = "INSERT INTO `avideo`.`av_views` (
						`video_ID` ,
						`timestamp_insert` ,
						`user_ID`
						)
						VALUES (
						'".rand(1, $num_videos)."', '".$random_timestamp."',".rand(1, $num_users)."
						);
				";
						
				if (!$result_views_insert = mysql_query($query_views_insert, $db)) {
					echo mysql_error()."<br />";
					echo $query_views_insert."<br />";
			    	mysql_close($db);
					die("Problemi l'esecuzione della query.");
				}
				$views_count++;
			}
		echo $views_count." visite casuali inserite correttamente nel DB.";
		mysql_close();
	} else echo "Hai provato ad usare il paramentro 'views' nella query?";
?>

	</body>
</html>