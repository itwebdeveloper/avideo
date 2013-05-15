  {include file="/localhost/test/header.tpl"}
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
{section name=i loop=$video_select}
                <div class="grid_3">
                  <div class="division">
                  	<p><strong><a href="video.php?id={$video_select[i]['ID']}">{$video_select[i]['title']}</a></strong></p>
                    <a href="video.php?id={$video_select[i]['ID']}"><img src="{$video_select[i]['thumbnail_default']}" alt="{$video_select[i]['title']}" width="220" height="153" /></a>
                    Views: {$video_select[i]['views']}
                  </div>
                </div>
{/section}
          </section>
      </div>  
    </div>
  {include file="/localhost/test/footer.tpl"}