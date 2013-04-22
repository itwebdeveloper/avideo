<?php
	include("includes/funzioni.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home page - Avideo</title>
    <!-- inizio META TAG -->
<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="author" content="Andrea CANNUNI" />
	<meta name="robots" content="index, follow" />
	<meta name="revisit-after" content="7 days" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<!-- fine META TAG -->
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/superfish.js"></script>
	 <script type="text/javascript" src="js/jquery.responsivemenu.js"></script>
   <script type="text/javascript" src="js/jquery.mobilemenu.js"></script>
   <script type="text/javascript" src="http://fast.fonts.com/jsapi/86ac751a-e730-4d0e-a4ec-3e10d0169fa5.js"></script>
   <script type="text/javascript" src="js/web_fonts_banner_remover.js"></script>
	 <script src="js/script.js"></script>
	<!--[if lt IE 8]>
   <div style=' clear: both; text-align:center; position: relative;'>
     <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
       <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
    </a>
  </div>
<![endif]-->
    <!--[if lt IE 9]>
   	<script type="text/javascript" src="js/html5.js"></script>
    	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
    <![endif]-->
</head>
<body>
  <div class="aux_box">
    <div class="container_12">
      <div class="wrapper">
        <div class="grid_12">
          <div class="date"></div>
          <ul class="user">
            <li><a href="#">login</a></li>
          </ul>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="main_box">
    <div class="container_12">
    <!--==============================header=================================-->
        <div class="grid_12">
          <header>
            <h1><a class="logo" href="index.html">Avideo</a></h1>
            <nav>
                <ul class="sf-menu">
                  <li><a href="videos.php">Videos</a></li>
                  <li><a href="most_viewed_videos.php">Most viewed</a>
					<ul>
						<li><a href="most_viewed_videos.php">Most viewed</a></li>
						<li><a href="most_viewed_videos.php?period=today">Most viewed - Today</a></li>
						<li><a href="most_viewed_videos.php?period=week">Most viewed - Last week</a></li>
						<li><a href="most_viewed_videos.php?period=month">Most viewed - Last month</a></li>
                    </ul>
                  </li>
                  <li><a href="most_commented_videos.php">Most commented</a>
					<ul>
						<li><a href="most_voted_videos.php">Most commented</a></li>
						<li><a href="most_voted_videos.php?period=today">Most voted - Today</a></li>
						<li><a href="most_voted_videos.php?period=week">Most voted - Last week</a></li>
						<li><a href="most_voted_videos.php?period=month">Most voted - Last month</a></li>
                    </ul>
                  </li>
               </ul>
              </nav>
            <div class="clear"></div>
          </header>
          <div class="bg"></div>
        </div>
        <div class="clear"></div>
    <!--==============================content================================-->
        <section id="content">
         
<?php
	if (isset($_GET['period'])) {
		switch($_GET['period']) {
			case 'today': $query_votes_period = " WHERE timestamp_insert >= ".strtotime("Today");
			break;
			case 'week': $query_votes_period = " WHERE timestamp_insert >= ".strtotime("This Monday");
			break;
			case 'month': $query_votes_period = " WHERE timestamp_insert >= ".strtotime("First day of this month");
			break;
		}
	} else $query_votes_period = "";

	$db = apri_connessione();
	
	/* Sort votes */
	$query_video_select = "SELECT * FROM ".$_CONFIG["table_suffix"]."videos"; 
	$result_video_select = mysql_query($query_video_select, $db);
	while($row_video_select = mysql_fetch_array($result_video_select)){
		$videos_sort[$row_video_select['ID']]['views'] = 0;
		$videos_sort[$row_video_select['ID']]['votes'] = 0;
		$videos[$row_video_select['ID']]['ID'] = $row_video_select['ID'];
		$videos[$row_video_select['ID']]['host'] = $row_video_select['host'];
		$videos[$row_video_select['ID']]['host_video_ID'] = $row_video_select['host_video_ID'];
		$videos[$row_video_select['ID']]['title'] = $row_video_select['title'];
		$videos[$row_video_select['ID']]['description'] = $row_video_select['description'];
		$videos[$row_video_select['ID']]['thumbnail_default'] = $row_video_select['thumbnail_default'];
		$videos[$row_video_select['ID']]['thumbnail_medium'] = $row_video_select['thumbnail_medium'];
		$videos[$row_video_select['ID']]['thumbnail_high'] = $row_video_select['thumbnail_high'];
		$videos[$row_video_select['ID']]['user_ID'] = $row_video_select['user_ID'];
		$videos[$row_video_select['ID']]['timestamp_insert'] = $row_video_select['timestamp_insert'];
		$videos[$row_video_select['ID']]['timestamp_edit'] = $row_video_select['timestamp_edit'];
	}
	
	$query_comments_select = "SELECT * FROM ".$_CONFIG["table_suffix"]."comments".$query_votes_period; 
	$result_comments_select = mysql_query($query_comments_select, $db);
	while($row_comments_select = mysql_fetch_array($result_comments_select)){
		$videos_sort[$row_comments_select['video_ID']]['votes']++;
	}
	arsort($videos_sort);
	
	$videos_count = 0;
	foreach($videos_sort as $videos_sort_key => $videos_sort_values)
    {
    	$videos_sorted[$videos_count]['ID'] = $videos_sort_key;
    	$videos_sorted[$videos_count]['votes'] = $videos_sort[$videos_sort_key]['votes'];
    	$videos[$videos_sort_key]['votes'] = $videos_sort[$videos_sort_key]['votes'];
    	$videos_count++;
    }
    
    // echo '<pre>';
	// echo print_r($videos_sorted);
	// echo '</pre>';
	/* Sort votes EoF */
	
	$videos_sorted_count = 0;
	for($i=0;$i<3;$i++) {
		for($j=0;$j<4;$j++) {
			if ($j == 0) {
				$query_views = "SELECT * FROM ".$_CONFIG["table_suffix"]."views WHERE video_ID=".$videos[$videos_sorted[$videos_sorted_count]['ID']]['ID']; 
				$result_views = mysql_query($query_views, $db);
		
				$views = mysql_num_rows($result_views);
?>
          <div class="wrapper">
            <article class="grid_12">
<?php
            if ($i == 0) {
?>
              <h3 class="ind3">Videos</h3>
<?php
            }
?>
              <div class="wrapper m_bot2">
<?php 
			}
			if ($j == 0) $col_indicator = " alpha";
			else if ($j == 3) $col_indicator = " omega last-col";
			else $col_indicator = "";
?>
                <div class="grid_3<?php echo $col_indicator ?>">
                  <div class="division">
                  	<p><strong><a href="video.php?id=<?php echo $videos[$videos_sorted[$videos_sorted_count]['ID']]['ID'] ?>"><?php echo $videos[$videos_sorted[$videos_sorted_count]['ID']]['title'] ?></a></strong></p>
                    <a href="video.php?id=<?php echo $videos[$videos_sorted[$videos_sorted_count]['ID']]['ID'] ?>"><img src="<?php echo $videos[$videos_sorted[$videos_sorted_count]['ID']]['thumbnail_default'] ?>" alt="<?php echo $videos[$videos_sorted[$videos_sorted_count]['ID']]['title'] ?>" width="220" height="153" /></a>
                    Views: <?php echo $views ?>
                  </div>
                </div>
<?php 
			if ($j == 3) {
?>
              </div>
            </article>
          </div>
<?php 
			}
			$videos_sorted_count++;
		}
	}
	mysql_close();
?>
        </section>
    </div>  
  </div>
  <!--==============================footer=================================-->
    <footer>
      <div class="container_12">
        <div class="wrapper">
          <article class="grid_12">
            <div class="social">
              <a href="#" title="YouTube"><img src="images/soc1.png" width="32" height="64" alt=""></a>
              <a href="#" title="RSS"><img src="images/soc2.png" width="32" height="64" alt=""></a>
              <a href="#" title="Twitter"><img src="images/soc3.png" width="32" height="64" alt=""></a>
              <a href="#" title="Facebook"><img src="images/soc4.png" width="32" height="64" alt=""></a>
            </div>  
            <div class="privacy">
              Andrea Cannuni &copy; 2013 All Rights Reserved  &nbsp; | &nbsp;  <span><a href="webmaster.html">Webmaster</a></span> &nbsp; | &nbsp;  <span><a href="privacy_policy.html">Privacy Policy</a></span>
            </div>
          </article>
        </div>
      </div>
    </footer>
</body>
</html>