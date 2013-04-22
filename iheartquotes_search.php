<?php
	include("includes/funzioni.php");

	if (isset($_GET['num'])) {
?>

<!DOCTYPE html>
<html>
    <head>
		<title>Iheartquotes random quotes search</title>
    </head>
    <body>
        <div>
<?php
		for($i=0; $i<$_GET['num']; $i++) {
			$page_content = file_get_contents('http://iheartquotes.com/api/v1/random?format=json');
			$json = json_decode($page_content);
			$quotes[$i]['quote'] = $json->quote;
		}
		echo $_GET['num']." citazioni raccolte correttamente dal web.<br />";
		
		$db = apri_connessione();
		
		$count = 0;
		for($i=0; $i<$_GET['num']; $i++) {		
			$query = "INSERT INTO `av_quotes` (
				`quote`
				)
				VALUES (
				'".mysql_real_escape_string($quotes[$i]['quote'])."'
				);
			";
			
			if (!$result = mysql_query($query, $db)) {
				echo mysql_error()."<br />";
				echo $query."<br />";
		    	mysql_close($db);
				die("Problemi l'esecuzione della query.");
			}
			$count++;
		}
		echo $count." citazioni inserite correttamente nel DB.";
		mysql_close();
	} else echo "Hai provato ad usare il paramentro 'num' nella query?";
?>
        </div>
    </body>
</html>