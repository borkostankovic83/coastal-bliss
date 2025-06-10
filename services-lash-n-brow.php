<?php
$head_title = "Coastal Bliss | Lash & Brow";
require_once('parts/header/header.php');
$page_title = "Lash & Brow";
require_once('parts/page-title.php');
require_once "../database.php";
$conn = getDatabaseConnection();

// Fetch categories
$categories = [];
$cat_sql = "SELECT * FROM lash_brow_categories ORDER BY sort_order, name";
$cat_result = mysqli_query($conn, $cat_sql);
while ($cat = mysqli_fetch_assoc($cat_result)) {
    $categories[$cat['id']] = $cat;
    $categories[$cat['id']]['services'] = [];
}

// Fetch services and group by category_id
$svc_sql = "SELECT * FROM lash_brow_services ORDER BY category_id, sort_order";
$svc_result = mysqli_query($conn, $svc_sql);
while ($svc = mysqli_fetch_assoc($svc_result)) {
    if (isset($categories[$svc['category_id']])) {
        $categories[$svc['category_id']]['services'][] = $svc;
    }
}
?>

<section id="services" class="py-5 container">
    <div class="container">
        <?php foreach ($categories as $category): ?>
            <div class="service-section">
                <h2 class="font-bold text-center text-gold"><?= htmlspecialchars($category['name']) ?></h2>
                <p class="text-center text-dark" style="font-size: 1.2em; margin-bottom: 30px;">
                    <?= htmlspecialchars($category['intro']) ?>
                </p>
                <?php foreach ($category['services'] as $service): ?>
                    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                        <h3 style="color:#212936; font-weight: bold; font-size: 2.2em; margin-bottom: 10px;">
                            <?= htmlspecialchars($service['name']) ?>
                        </h3>
                        <h4 class="text-gray"><?= htmlspecialchars($service['duration']) ?></h4>
                        <p style="color: #333; font-size: 1.1em; line-height: 1.5; margin-bottom: 15px;">
                            <?= nl2br(htmlspecialchars($service['description'])) ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once('parts/footer/footer.php'); ?>
<!-- Keep your CSS as is -->

<style>
.text-gold {
    color: #9f8958;
}
.text-dark {
    color: #212936;
}
.text-gray {
    color: #666;
    font-weight: bold;
    font-size: 1.2em;
    margin-top: 20px;
}
.facial-heading {
    color: #212936;
    font-weight: bold;
    font-size: 2.2em;
    margin-bottom: 10px;
}
.addon-heading {
    color: #666;
    font-weight: bold;
    font-size: 1.2em;
    margin-top: 20px;
}
.facials-section {
    padding-bottom: 20px;
    border-bottom: 2px solid #9f8958;
}
.head_title {
    color: #333;
    font-size: 1.5em;
    line-height: 1.5;
    margin-bottom: 15px;
}
li {
    margin-bottom: 10px;
}
</style>
