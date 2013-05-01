#!C:\xampp\php\php.exe -q

<?php
	include("includes/funzioni.php");
			
	$db = apri_connessione();
		
	$query_videos_update[0] = "UPDATE ".$_CONFIG["table_suffix"]."videos SET ".$_CONFIG["table_suffix"]."videos.views = (SELECT COUNT(*) FROM ".$_CONFIG["table_suffix"]."views WHERE ".$_CONFIG["table_suffix"]."views.video_ID = ".$_CONFIG["table_suffix"]."videos.ID);";
	$query_videos_update[1] = "UPDATE ".$_CONFIG["table_suffix"]."videos SET ".$_CONFIG["table_suffix"]."videos.daily_views = (SELECT COUNT(*) FROM ".$_CONFIG["table_suffix"]."views WHERE ".$_CONFIG["table_suffix"]."views.video_ID = ".$_CONFIG["table_suffix"]."videos.ID AND date = CURDATE());"; 
	$query_videos_update[2] = "UPDATE ".$_CONFIG["table_suffix"]."videos SET ".$_CONFIG["table_suffix"]."videos.weekly_views = (SELECT COUNT(*) FROM ".$_CONFIG["table_suffix"]."views WHERE ".$_CONFIG["table_suffix"]."views.video_ID = ".$_CONFIG["table_suffix"]."videos.ID AND date >= FROM_UNIXTIME(".strtotime("This Monday")."));";
	$query_videos_update[3] = "UPDATE ".$_CONFIG["table_suffix"]."videos SET ".$_CONFIG["table_suffix"]."videos.monthly_views = (SELECT COUNT(*) FROM ".$_CONFIG["table_suffix"]."views WHERE ".$_CONFIG["table_suffix"]."views.video_ID = ".$_CONFIG["table_suffix"]."videos.ID AND date >= FROM_UNIXTIME(".strtotime("First day of this month")."));";
	
	for ($i=0; $i<4; $i++) {
		if (!$result_videos_update = mysql_query($query_videos_update[$i], $db)) {
				echo mysql_error()."<br />";
				echo $query_videos_update[$i]."<br />";
		    	mysql_close($db);
				die("Problemi l'esecuzione della query.");
		} else echo "query_videos_update[".$i."] eseguita correttamente.\n";
	}
	mysql_close();
?>