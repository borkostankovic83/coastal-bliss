<?php
$head_title="Coastal Bliss | Nails";
require_once('parts/header/header.php');
$page_title = "Services - Nails";
require_once('parts/page-title.php');
require_once "../database.php";
$conn = getDatabaseConnection();

// Fetch sections
$sections = [];
$sec_sql = "SELECT * FROM nail_service_sections ORDER BY sort_order, name";
$sec_result = mysqli_query($conn, $sec_sql);
while ($sec = mysqli_fetch_assoc($sec_result)) {
    $sections[$sec['id']] = $sec;
    $sections[$sec['id']]['services'] = [];
}

// Fetch services and group by section_id
$svc_sql = "SELECT * FROM nail_services ORDER BY section_id, sort_order";
$svc_result = mysqli_query($conn, $svc_sql);
while ($svc = mysqli_fetch_assoc($svc_result)) {
    if (isset($sections[$svc['section_id']])) {
        $sections[$svc['section_id']]['services'][] = $svc;
    }
}
?>
<section id="services" class="py-5" style="color: #222; background-color: #FAFAFA;">
    <div class="container">
        <?php foreach ($sections as $section): ?>
            <?php
                $is_addons = !empty($section['is_addons']) && $section['is_addons'] == 1;
            ?>
            <div class="mb-5" style="padding-bottom: 20px; border-bottom: 2px solid #9f8958;">
                <h3 style="color:#212936; font-weight: bold; font-size: 2.2em; margin-bottom: 10px;">
                    <?= htmlspecialchars($section['name']) ?>
                </h3>
                <?php if (!empty($section['description'])): ?>
                    <p style="color: #333; font-size: 1.1em; line-height: 1.5; margin-bottom: 15px;">
                        <?= nl2br(htmlspecialchars($section['description'])) ?>
                    </p>
                <?php endif; ?>
                <?php if (!empty($section['services'])): ?>
                    <ul style="color: #555; padding-left: 20px; line-height: 1.6;">
                        <?php foreach ($section['services'] as $service): ?>
                            <?php if (!$is_addons): ?>
                                <li style="margin-bottom: 10px;">
                                    <h4 class="text-gray"><?= $service['price'] ? htmlspecialchars($service['price']) : '' ?></h4>
                                    <strong style="color: #9f8958; font-size: 1.2em; font-weight: bold;">
                                        <?= htmlspecialchars($service['title']) ?>
                                    </strong>
                                    <?= htmlspecialchars($service['description']) ?>
                                </li>
                            <?php else: ?>
                                <li style="margin-bottom: 10px;">
                                    <span style="color: #9f8958; font-weight: bold; font-size: 1.2em;">
                                        <?= htmlspecialchars($service['title']) .': '?>
                                    </span>
                                    <?php if ($service['price']): ?>
                                        <span><?= htmlspecialchars($service['price']) .' – ' ?></span>
                                    <?php endif; ?>
                                    <span style="color:#555;"><?= htmlspecialchars($service['description']) ?></span>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<style>
.text-gray {
    color: #666;
    font-weight: bold;
    font-size: 1.2em;
    margin-top: 20px;
}
</style>
<?php require_once('parts/footer/footer.php'); ?>