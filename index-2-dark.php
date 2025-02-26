<?php 
    $head_title="Purerelax | Spa & Beauty PHP Template | Home 02 Dark";
    //include rev slider css and js files in header and footer
    $include_revslider_css_js = true;
    $dark_mode=true;
    $dark_logo_url="images/logo-2.png";
    $sticky_logo_url="images/logo-2.png";
?>

<?php require_once('parts/header/header2.php'); ?>

<?php

    require_once('parts/home2-dark/slider.php');
    require_once('parts/home2-dark/services.php');
    require_once('parts/home2-dark/about.php');
    require_once('parts/home2-dark/packages.php');
    require_once('parts/home2-dark/product.php');
    require_once('parts/home2-dark/product2.php');
    require_once('parts/home2-dark/testimonial.php');
    require_once('parts/home2-dark/features.php');
    require_once('parts/home2-dark/team.php');
    require_once('parts/home2-dark/funfact.php');
    require_once('parts/home2-dark/blog.php');

?>

<?php require_once('parts/footer/footer2.php'); ?>

