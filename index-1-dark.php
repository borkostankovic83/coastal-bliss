<?php 
    $head_title="Purerelax | Spa & Beauty PHP Template | Home 01 Dark";
    //include rev slider css and js files in header and footer
    $include_revslider_css_js = true;
    $dark_mode=true;
    $dark_logo_url="images/logo-2.png";
    $sticky_logo_url="images/logo-2.png";
?>

<?php require_once('parts/header/header.php'); ?>

<?php

    require_once('parts/home1/slider.php');
    require_once('parts/home1/about.php');
    require_once('parts/home1/clients.php');
    require_once('parts/home1-dark/services.php');
    require_once('parts/home1-dark/marquee.php');
    require_once('parts/home1-dark/video.php');
    require_once('parts/home1/gallery.php');
    require_once('parts/home1-dark/pricing.php');
    require_once('parts/home1/contact.php');
    require_once('parts/home1-dark/testimonial.php');
    require_once('parts/home1-dark/team.php');
    require_once('parts/home1-dark/instagram.php');
    require_once('parts/home1-dark/blog.php');

?>

<?php require_once('parts/footer/footer.php'); ?>
