<?php
	include("includes/funzioni.php");
?>

<?php

// Error reporting:
error_reporting(E_ALL^E_NOTICE);

include ("includes/comment.class.php");


/*
/	Select all the comments and populate the $comments array with objects
*/

$comments = array();
$result = mysql_query("SELECT * FROM ".$_CONFIG["table_suffix"]."comments WHERE video_ID='".$_GET['id']."' ORDER BY id ASC");

while($row = mysql_fetch_assoc($result))
{
	$comments[] = new Comment($row);
}

?>

<?php
	$db = apri_connessione();
	
	$query_views_insert = "INSERT INTO `avideo`.`av_views` (
						`video_ID` ,
						`date`,
						`slot` ,
						`cnt`
						)
						VALUES (
						'".$_GET['id']."', CURDATE(), RAND() * 100, 1
						) ON DUPLICATE KEY UPDATE cnt = cnt + 1;
				";
			
	if (!$result_views_insert = mysql_query($query_views_insert, $db)) {
		echo mysql_error()."<br />";
		echo $query_views_insert."<br />";
    	mysql_close($db);
		die("Problemi l'esecuzione della query.");
	}
	
	
	$query = "SELECT * FROM ".$_CONFIG["table_suffix"]."videos WHERE ID=".$_GET['id']; 
	$result = mysql_query($query, $db);
	
	$row = mysql_fetch_array($result);
	
	$query_views_select = "SELECT COUNT(*) AS count FROM ".$_CONFIG["table_suffix"]."views WHERE video_ID=".$_GET['id']; 
	$result_views_select = mysql_query($query_views_select, $db);
	$row_views_select = mysql_fetch_array($result_views_select);
	
	$views = $row_views_select['count'];
	
	switch ($row['host']) {
		case '1': $host = "http://www.youtube.com/watch?v=";
		break;
		case '2': $host = "http://www.metacafe.com/watch/";
		break;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $row['title'] ?> - Avideo</title>
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
    <link rel="stylesheet" type="text/css" media="screen" href="css/comment_styles.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/comment_script.js"></script>
    <script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery.responsivemenu.js"></script>
	<script type="text/javascript" src="js/jquery.mobilemenu.js"></script>
	<script type="text/javascript" src="http://fast.fonts.com/jsapi/86ac751a-e730-4d0e-a4ec-3e10d0169fa5.js"></script>
	<script type="text/javascript" src="js/web_fonts_banner_remover.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript">
		<!--
		function sendMailTo(name, company, domain) {
		locationstring = 'mai' + 'lto:' + name + '@' + company + '.' + domain;
		window.location.replace(locationstring);
		};
		// -->
	</script>
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
	        	<div class="wrapper">
	          		<article class="grid_12">
	          			<h3><?php echo $row['title'] ?></h3>
	          			<div class="video_watch">
		        			<figure><a href="<?php echo $host.$row['host_video_ID'] ?>" target="_blank"><img src="<?php echo $row['thumbnail_default'] ?>" alt="Play <?php echo $row['title'] ?>" /></a></figure>
						</div>
						<div class="video_properties">
		        			<?php if($row['description']) { ?><div class="video_description"><strong>Description:</strong> <?php echo $row['description'] ?></div><?php } ?> <div class="video_submitted"><strong>Submitted:</strong> <?php echo date_time_conversion($row['timestamp_insert']) ?> by Anonimous</div> <div class="video_views"><strong>Views:</strong> <?php echo $views ?></div> <div><strong>Rating:</strong> </div>
						</div>
<?php
	mysql_close();
?>
<div id="main">
	<h4>Comments</h4>
<?php

/*
/	Output the comments one by one:
*/

foreach($comments as $c){
	echo $c->markup();
}

?>

							<div id="addCommentContainer">
								<p>Add a Comment</p>
								<form id="addCommentForm" method="post" action="">
							    	<div>							            							            
							            <label for="vote">Vote (over 5)</label>
							            <input type="text" name="vote" id="vote" />
							            
							            <label for="comment">Comment Body</label>
							            <textarea name="comment" id="comment" cols="20" rows="5"></textarea>
							            
							            <input type="hidden" name="video_ID" id="video_ID" value="<?php echo $row['ID'] ?>" />
							            
							            <input type="submit" id="submit" value="Submit" />
							        </div>
							    </form>
							</div>
						
						</div>
	          		</article>
				</div>
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