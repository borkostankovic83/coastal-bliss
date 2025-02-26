<!DOCTYPE html>
<html <?php if(isset($rtl_mode)&&!empty($rtl_mode)) {?>dir="rtl"<?php }?> lang="en">
<head>
<meta charset="utf-8">
<title><?php echo $head_title;?></title>
<!-- Stylesheets -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<?php if(isset($include_revslider_css_js)&&!empty($include_revslider_css_js)) {?>
<link href="plugins/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
<link href="plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
<link href="plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
<?php }?>

<?php if(isset($rtl_mode)&&!empty($rtl_mode)) {?>
<link href="css/style-rtl.css" rel="stylesheet">
<?php } else {?>
<link href="css/style.css" rel="stylesheet">
<?php }?>

<?php if(isset($dark_mode)&&!empty($dark_mode)) {?>
	<link href="css/style-dark.css" rel="stylesheet">
<?php }?>

<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<link rel="icon" href="images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body
<?php if(isset($body_class)&&!empty($body_class)) {?>
class="<?php echo $body_class;?>"
<?php }?>
<?php if(isset($body_bg_image)&&!empty($body_bg_image)) {?>
data-tm-bg-img="<?php echo $body_bg_image;?>"
<?php }?>
>