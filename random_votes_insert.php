#!C:\xampp\php\php.exe -q

<?php
	include("includes/funzioni.php");

 	if (isset($_SERVER["argv"][1])) {		
		$num_users = 5;
		
		$db = apri_connessione();
		
		$query_videos_select = "SELECT * FROM ".$_CONFIG["table_suffix"]."videos"; 
		$result_videos_select = mysql_query($query_videos_select, $db);

		$num_videos = mysql_num_rows($result_videos_select);
		
		$query_quotes_select = "SELECT * FROM ".$_CONFIG["table_suffix"]."quotes"; 
		$result_quotes_select = mysql_query($query_quotes_select, $db);

		$num_quotes = mysql_num_rows($result_quotes_select);
		
		$quotes_count = 0;
		while($row_quotes_select = mysql_fetch_array($result_quotes_select)){
			$quotes[$quotes_count] = $row_quotes_select['quote'];
			$quotes_count++;
		}
		
		
		$comments_count = 0;
		for ($i=0; $i<$_SERVER["argv"][1]; $i++) {
			$random_timestamp = rand(strtotime('Last Month'), time());
			$random_quote_ID = rand(1, $num_quotes);
			
			$query_comments_insert = "INSERT INTO `av_comments` (
					`video_ID` ,
					`vote` ,
					`comment` ,
					`timestamp_insert` ,
					`timestamp_edit` ,
					`user_ID`
					)
					VALUES (
					'".rand(1, $num_videos)."', '".rand(1, 5)."', '".mysql_real_escape_string($quotes[$random_quote_ID])."', FROM_UNIXTIME(".$random_timestamp."), FROM_UNIXTIME(".$random_timestamp."), ".rand(1, $num_users)."
					);
			";
					
			if (!$result_comments_insert = mysql_query($query_comments_insert, $db)) {
				echo mysql_error()."<br />";
				echo $query_comments_insert."<br />";
		    	mysql_close($db);
				die("Problemi l'esecuzione della query.");
			}
			$comments_count++;
		}
		echo $comments_count." voti/commenti casuali inserite correttamente nel DB.";
		mysql_close();
	} else echo "Hai provato ad usare il numero di commenti come argomento?";
?>