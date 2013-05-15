random.php
<?php
    include("includes/funzioni.php");

    $howmany = 10000;

    for($i=1;$i<$howmany;$i++){



        $SQL = "INSERT INTO `avideo`.`av_videos`
        (`ID`, `host`, `host_video_ID`, `title`, `description`, `thumbnail_default`, `thumbnail_medium`, `thumbnail_high`, `user_ID`, `views`, `timestamp_insert`, `timestamp_edit`, `daily_views`, `weekly_views`, `monthly_views`, `votes`, `daily_votes`, `weekly_votes`, `monthly_votes`) VALUES
        (NULL, '".generateRandomString(10)."', '".rand(0,99999999999)."', '".generateRandomString(10)."',
        '".generateRandomString(20)."', '".generateRandomString(20)."', '".generateRandomString(20)."',
         '".generateRandomString(20)."', '".rand(0,9999999)."', '".rand(0,9999999)."', NOW(), NOW(),
        ".rand(0,9999999).", ".rand(0,9999999).", ".rand(0,9999999).", ".rand(0,9999999).", ".rand(0,9999999).", ".rand(0,9999999).", ".rand(0,9999999).");";
        mysql_query($SQL) or die(mysql_error());
        print($SQL."\n");

    }



?>