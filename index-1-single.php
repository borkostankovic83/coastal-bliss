<?php 
    $head_title="Purerelax | Spa & Beauty PHP Template | Home 01 Single";
    //include rev slider css and js files in header and footer
    $include_revslider_css_js = true;
    $single_menu_file = "parts/header/menu-single.php";
?>

<?php require_once('parts/header/header.php'); ?>

<?php

require_once('parts/home1/slider.php');
require_once('parts/home1/about.php');
require_once('parts/home1/clients.php');
require_once('parts/home1/services.php');
require_once('parts/home1/marquee.php');
require_once('parts/home1/video.php');
require_once('parts/home1/gallery.php');
require_once('parts/home1/pricing.php');
require_once('parts/home1/contact.php');
require_once('parts/home1/testimonial.php');
require_once('parts/home1/team.php');
require_once('parts/home1/instagram.php');
require_once('parts/home1/blog.php');

?>

<?php require_once('parts/footer/footer.php'); ?>
