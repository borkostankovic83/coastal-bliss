<?php
$head_title = "Coastal Bliss | Packages";
require_once('parts/header/header.php');
$page_title = "Services - Packages";
require_once "../database.php";
$conn = getDatabaseConnection();

// Fetch packages and their options
$packages = [];
$sql = "SELECT * FROM service_packages ORDER BY sort_order, id";
$res = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($res)) {
    $row['options'] = [];
    $packages[$row['id']] = $row;
}
if ($packages) {
    $ids = implode(',', array_keys($packages));
    $opt_sql = "SELECT * FROM service_package_options WHERE package_id IN ($ids) ORDER BY id";
    $opt_res = mysqli_query($conn, $opt_sql);
    while ($opt = mysqli_fetch_assoc($opt_res)) {
        $packages[$opt['package_id']]['options'][] = $opt;
    }
}
?>
<section class="page-title" style="background-image: url(images/slider/2.png);">

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
<section id="services" class="py-5" style="background: linear-gradient(120deg, #f8f6f2 0%, #f3f7fa 100%);">
    <div class="container">
        <?php foreach ($packages as $package): ?>
            <div class="package-section py-4 mb-5">
                <div class="row align-items-center">
                    <!-- Left: Package Info -->
                    <div class="col-md-7 mb-3 mb-md-0">
                        <h2 class="package-title mb-3"><?= htmlspecialchars($package['name']); ?></h2>
                        <p class="package-desc mb-0"><?= nl2br(htmlspecialchars($package['description'])); ?></p>
                    </div>
                    <!-- Right: Options -->
                    <div class="col-md-5">
                        <h5 class="options-title mb-3 text-gold">Options</h5>
                        <ul class="list-unstyled mb-0">
                            <?php foreach ($package['options'] as $option): ?>
                                <li class="option-item mb-2">
                                    <span class="option-title"><?= htmlspecialchars($option['option_title']); ?></span>
                                    <span class="option-price ms-2">$<?= number_format($option['option_price'], 2); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once('parts/footer/footer.php'); ?>

<style>
.package-section {
    border-bottom: 2px solid #e0d7c3;
    /* No card, just a clean divider */
}
.package-title {
    color: #212936;
    font-weight: 700;
    font-size: 2em;
    letter-spacing: 0.5px;
}
.package-desc {
    color: #444;
    font-size: 1.08em;
    line-height: 1.6;
}
.options-title {
    color: #9f8958;
    font-weight: 600;
    font-size: 1.15em;
    letter-spacing: 0.5px;
}
.option-item {
    padding: 0.3em 0;
    border-bottom: 1px dashed #e0d7c3;
}
.option-title {
    color: #212936;
    font-weight: 500;
}
.option-price {
    color: #9f8958;
    font-weight: 600;
    float: right;
}
@media (max-width: 991px) {
    .package-section .row {
        flex-direction: column;
    }
    .option-price {
        float: none;
        display: block;
        margin-top: 2px;
    }
}
.text-gold {
    color: #9f8958;
}
</style>