<?php
// $latestPosts = hw_latest_posts();

$frontPagePosts = hw_home_posts();

include(locate_template('templates/carousel.php'));
include(locate_template('templates/content-front.php'));
?>