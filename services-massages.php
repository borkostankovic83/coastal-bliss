<?php
    $head_title="Coastal Bliss | Massages";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
    $page_title = "Services - Massages";
    require_once('parts/page-title.php');
?>

<?php
$massagesJson = file_get_contents(__DIR__ . '/data/massages.json');
$massages = json_decode($massagesJson, true);
?>

<section id="services" class="py-5 container">
    <div class="container">
    <img src="images/ART-Provider Logo.png" alt="Sorella Apothecary" style="display: block; margin: 0 auto; width: 20%;">

    <?php foreach ($massages as $category): ?>
        <div class="service-section">
            <h2 class="font-bold text-center text-gold"><?= htmlspecialchars($category['title']) ?></h2>

            <?php foreach ($category['services'] as $service): ?>
                <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h3 style="color:#212936; font-weight: bold; font-size: 2.2em; margin-bottom: 10px;"><?= htmlspecialchars($service['name']) ?></h3>
                    <h4 class="text-gray"><?= htmlspecialchars($service['duration']) ?></h4>
                    <p style="color: #333; font-size: 1.1em; line-height: 1.5; margin-bottom: 15px;"><?= nl2br(htmlspecialchars($service['description'])) ?></p>
                </div>
                <div class="mb-5 facials-section"></div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
   
    <div class="service-section">
        <h3 class="addon-heading">Massage Add-Ons</h3>
        <ul style="font-size: 1.1em; line-height: 1.6; margin-top: 15px; padding-left: 20px; list-style-type: disc;">
            <li>Hot stones - $25</li>
            <li>Aromatherapy - $15</li>
            <li>CBD Sports Cream - $35</li>
            <li>Sinus & Headache Oil - $15</li>
            <li>Scalp Treatment - $20</li>
            <li>Beard Treatment - $30</li>
            <li>Cupping - $25</li>
            <li>Scraping - $45</li>
            <li>Reflexology - $30</li>
            <li>Theragun - $25</li>
            <li>Red light therapy - $65</li>
            <li>TMJ Release - $35</li>
            <li>Body Scrub Sampler - $20</li>
            <li>Guided meditation - $25</li>
        </ul>
    </div>

    <img src="images/ART-Provider-certs.PNG" alt="ART Provider" style="display: block; margin: 0 auto; width: 50%;">

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
.addon-heading {
    color: #9f8958;
    font-weight: bold;
    font-size: 2.2em;
    margin-bottom: 10px;
}
</style>
