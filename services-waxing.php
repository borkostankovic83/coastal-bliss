<?php
    $head_title = "Coastal Bliss | Waxing";
    require_once('parts/header/header.php');
    $page_title = "Services - Waxing";
    require_once('parts/page-title.php');

    require_once "../database.php";
    $conn = getDatabaseConnection();

    // Fetch categories with their descriptions and order
    $categories = [];
    $cat_sql = "SELECT * FROM waxing_categories ORDER BY sort_order, name";
    $cat_result = mysqli_query($conn, $cat_sql);
    while ($cat = mysqli_fetch_assoc($cat_result)) {
        $categories[$cat['id']] = $cat;
        $categories[$cat['id']]['services'] = [];
    }

    // Fetch services and group by category_id
    $svc_sql = "SELECT * FROM waxing_services ORDER BY category_id, sort_order";
    $svc_result = mysqli_query($conn, $svc_sql);
    while ($svc = mysqli_fetch_assoc($svc_result)) {
        if (isset($categories[$svc['category_id']])) {
            $categories[$svc['category_id']]['services'][] = $svc;
        }
    }
?>

<section id="services" class="py-5" style="color: #222; background-color: #FAFAFA;">
    <div class="container">
        <?php foreach ($categories as $cat): ?>
            <?php if (empty($cat['services'])) continue; // Skip empty categories ?>
            <div class="mb-5" style="padding-bottom: 20px; border-bottom: 2px solid #9f8958;">
                <h3 style="color:#212936; font-weight: bold; font-size: 2.2em; margin-bottom: 10px;">
                    <?= htmlspecialchars($cat['name']) ?>
                </h3>
                <?php if (!empty($cat['description'])): ?>
                    <div style="color:#666; margin-bottom: 10px;"><?= nl2br(htmlspecialchars($cat['description'])) ?></div>
                <?php endif; ?>
                <ul style="color: #555; padding-left: 20px; line-height: 1.6;">
                    <?php foreach ($cat['services'] as $service): ?>
                        <li style="margin-bottom: 10px;">
                            <strong style="color: #9f8958; font-size: 1.2em; font-weight: bold;">
                                <?= htmlspecialchars($service['title']) .': ' ?>
                            </strong>
                            <?= $service['price'] ?  htmlspecialchars($service['price']) .' – ' : '' ?>
                            <?= htmlspecialchars($service['description']) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once('parts/footer/footer.php'); ?>