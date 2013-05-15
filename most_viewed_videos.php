<?php


  require("includes/config.php");
	
	/* Settings */
	// Results layout
	$display_cols = 3;
	$display_rows = 4;
	$display_results = $display_cols * $display_rows;	
	/* Settings EoF */

  if (isset($_GET['period'])) {
    switch($_GET['period']) {
      case 'today': $period_field = "daily_views"; 
      break;
      case 'week': $period_field = "weekly_views"; 
      break;
      case 'month': $period_field = "monthly_views"; 
      break;
      default: $period_field = "daily_views";
    }
  } else $query_views_period = "";
  
  $db = apri_connessione();
  
  if (!($stmt = $db -> prepare("SELECT ID, title, thumbnail_default, views FROM ".$_CONFIG["table_suffix"]."videos ORDER BY ? DESC LIMIT ".$display_results.";"))) {
    echo "Prepare failed: (" . $mysqli -> errno . ") " . $mysqli -> error;
  }

  if (!$stmt -> bind_param("s", $period_field)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }

  if (!$stmt -> execute()) {
    echo "Execute failed: (" . $stmt -> errno . ") " . $stmt -> error;
  }
 
  while($result = $stmt -> fetch()) {
    $stmt->bind_result($ID, $title, $thumbnail_default, $views);
    $row_video_select[] = array(
                'ID' => $ID,
                'title' => $title,
                'thumbnail_default' => $thumbnail_default,
                'views' => $views
    );
    
  }

  $db->close();


  // create object
  $smarty = new Smarty;

  // assign some content. This would typically come from
  // a database or other source, but we'll use static
  // values for the purpose of this example.
  $smarty->assign('video_select', $row_video_select);


  // display it
  $smarty->display('most_viewed_videos.tpl');
?>