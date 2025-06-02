<?php
    $head_title = "Coastal Bliss | Lash & Brow";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
    $page_title = "Lash & Brow";
    require_once('parts/page-title.php');
?>

<?php
$lashBrowServices = [
    [
        "title" => "Lash & Brow Enhancements",
        "intro" => "Enhance your natural beauty with our expert lash and brow treatments designed to define and lift without the need for extensions or makeup.",
        "services" => [
            [
                "name" => "Lash Lift + Tint",
                "duration" => "60 min | $95",
                "description" => "A perfect duo for longer, darker, and more defined lashes. This treatment lifts the lashes from the root and adds a custom tint for a mascara-like finish."
            ],
            [
                "name" => "Lash Lift",
                "duration" => "45 min | $75",
                "description" => "A semi-permanent curl that opens up the eyes and enhances your natural lashes."
            ],
            [
                "name" => "Lash Tint",
                "duration" => "20 min | $25",
                "description" => "Darkens and defines lashes with a custom shade to suit your features."
            ],
            [
                "name" => "Eyebrow Tint",
                "duration" => "20 min | $25",
                "description" => "Enhances the shape and fullness of your brows with a subtle, natural-looking tint."
            ]
        ]
    ]
];
?>

<section id="services" class="py-5 container">
    <div class="container">

        <?php foreach ($lashBrowServices as $category): ?>
            <div class="service-section">
                <h2 class="font-bold text-center text-gold"><?= htmlspecialchars($category['title']) ?></h2>
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
