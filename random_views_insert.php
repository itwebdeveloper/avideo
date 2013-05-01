#!C:\xampp\php\php.exe -q

<?php
	include("includes/funzioni.php");

 	if (isset($_SERVER["argv"][1])) {
			
			$db = apri_connessione();
			
			$query_videos_select = "SELECT * FROM ".$_CONFIG["table_suffix"]."videos"; 
			$result_videos_select = mysql_query($query_videos_select, $db);
	
			$num_videos = mysql_num_rows($result_videos_select);
			$views_count = 0;
			
			for ($i=0; $i<$_SERVER["argv"][1]; $i++) {
				$random_timestamp = rand(strtotime('Last Month'), time());
				
				$query_views_insert = "INSERT INTO `avideo`.`av_views` (
						`video_ID` ,
						`date`,
						`slot` ,
						`cnt`
						)
						VALUES (
						'".rand(1, $num_videos)."', FROM_UNIXTIME(".$random_timestamp."), RAND() * 100, 1
						) ON DUPLICATE KEY UPDATE cnt = cnt + 1;
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
	} else echo "Hai provato ad usare il numero di righe da inserire come argomento?";
?>