<!-- Start main-content -->
<section class="page-title" style="background-image: url(images/background/page-title-bg.png);">
    <h1 class="large-title"><?php if(isset($page_title)&&!empty($page_title)) { echo $page_title; } ?></h1>
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
