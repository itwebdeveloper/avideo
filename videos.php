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
	$db = apri_connessione();
	$query = "SELECT * FROM ".$_CONFIG["table_suffix"]."videos WHERE host='1'"; 
	$result = mysql_query($query, $db);
	
	for($i=0;$i<3;$i++) {
		for($j=0;$j<4;$j++) {
			$row = mysql_fetch_array($result);
			
			$query_views = "SELECT * FROM ".$_CONFIG["table_suffix"]."views WHERE video_ID=".$row['ID']; 
			$result_views = mysql_query($query_views, $db);
	
			$views = mysql_num_rows($result_views);
			
			if ($j == 0) {
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
                  	<p><strong><a href="video.php?id=<?php echo $row['ID'] ?>"><?php echo $row['title'] ?></a></strong></p>
                    <a href="video.php?id=<?php echo $row['ID'] ?>"><img src="<?php echo $row['thumbnail_default'] ?>" alt="<?php echo $row['title'] ?>" width="220" height="153" /></a>
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