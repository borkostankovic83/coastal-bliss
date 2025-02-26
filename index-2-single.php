<?php 
    $head_title="Purerelax | Spa & Beauty PHP Template | Home 02 Single";
    //include rev slider css and js files in header and footer
    $include_revslider_css_js = true;
	$single_menu_file = "parts/header/menu-single.php";
?>

<?php require_once('parts/header/header2.php'); ?>

<?php

    require_once('parts/home2/slider.php');
    require_once('parts/home2/services.php');
    require_once('parts/home2/about.php');
    require_once('parts/home2/packages.php');
    require_once('parts/home2/product.php');
    require_once('parts/home2/product2.php');	
    require_once('parts/home1/contact.php');
    require_once('parts/home2/testimonial.php');
    require_once('parts/home2/features.php');
    require_once('parts/home2/team.php');
    require_once('parts/home2/funfact.php');
    require_once('parts/home1/blog.php');

?>

<?php require_once('parts/footer/footer2.php'); ?>

