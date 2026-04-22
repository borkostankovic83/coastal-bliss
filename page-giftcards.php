<?php 
    $head_title="Coastal Bliss| Gift Cards";

	require_once('parts/header/header.php'); 
	$page_title = "Gift Cards";
?>


<!-- Start main-content -->
<section class="page-title" style="background-image: url(images/background/giftcards_background.jpg);">

    <div class="image-curve"></div>
    <div class="auto-container">
        <div class="title-outer text-center">
            <h1 class="title"><?php if(isset($page_title)&&!empty($page_title)) { echo $page_title; } ?></h1>
            <ul class="page-breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li><?php if(isset($page_title)&&!empty($page_title)) { echo $page_title; } ?></li>
            </ul>
        </div>
    </div>
</section>
<!-- end main-content -->
<?php

	require_once "../database.php";
	$conn = getDatabaseConnection();

	$work_time = [];
	$res = mysqli_query($conn, "SELECT `key`, `value` FROM site_content");
	while ($row = mysqli_fetch_assoc($res)) {
    	$work_time[$row['key']] = $row['value'];
	}
	$open_hours = json_decode($work_time['open_hours'] ?? '{}', true);

?>

<div style="width:100%; height:100vh; overflow:hidden; position:relative;">
  
  <iframe
    src="https://na2.meevo.com/CustomerPortal/egift/order/gift-type?tenantId=502338&locationId=503285"
    style="
      position:absolute;
      top:0;
      left:0;
      width:100%;
      height:100%;
      border:0;
    ">
  </iframe>

</div>
<?php require_once('parts/footer/footer.php'); ?>
