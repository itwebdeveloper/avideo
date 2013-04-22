<!DOCTYPE html>
<html>
    <head>
		<title>Metacafe video search</title>
    </head>
    <body>
   	 	<h1>Metacafe video search</h1>
        <div>
        	<form id ="response" action="video_insert.php"  method="post">
 <?php
 	if (isset($_GET['q'])) {
	 	$page_content = file_get_contents('http://www.metacafe.com/api/videos/?vq='.$_GET['q']);
	
		$xml = new SimpleXMLElement($page_content);
		
		echo "<input name=\"host\" type=\"hidden\" value=\"2\" />";
	
		$i = 0;
	    foreach ($xml->channel->item as $item)
		{
	    	echo "title: <input type=\"text\" name=\"title_".$i."\" value=\"".$item->title."\" /> ";
	    	echo "description: <input type=\"text\" name=\"description_".$i."\" value=\"\" /> ";
	    	echo "thumbnail_default: <input type=\"text\" name=\"thumbnail_default_".$i."\" value=\"".$item->children('http://search.yahoo.com/mrss/')->thumbnail->attributes()."\" /> ";
	    	echo "thumbnail_medium: <input type=\"text\" name=\"thumbnail_medium_".$i."\" value=\"\" /> ";
	    	echo "thumbnail_high: <input type=\"text\" name=\"thumbnail_high_".$i."\" value=\"\" /> ";
	    	echo "videoId: <input type=\"text\" name=\"host_video_ID_".$i."\" value=\"".$item->id."\" /><br />";
	    	$i++;
	    }
	    echo "<input name=\"max_rows\" type=\"hidden\" value=\"".$i."\" />";
	    echo "<input name=\"videos_insert\" type=\"submit\" value=\"Salva nel DB\" />";
 	} else echo "Hai provato ad usare il paramentro 'q' nella query?";
?>
        	</form>
<?php 
        echo $i." risulati disponibili con questo parametro 'q'";
?>
        </div>
    </body>
</html>