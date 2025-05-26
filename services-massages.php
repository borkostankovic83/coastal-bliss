<?php
    $head_title="Coastal Bliss | Massages";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
    $page_title = "Services - Massages";
    require_once('parts/page-title.php');
?>

<?php
$massages = [
    [
        "title" => "Therapeutic Massage & Bodywork",
        "services" => [
            [
                "name" => "Swedish Relaxation",
                "duration" => "$145 (60 min) or  $220 (90 min)",
                "description" => "A traditional massage that focuses on relaxing the body through gentle techniques that
                    improves circulation, relieves muscle tension and promotes overall well-being. This massage is
                    often used to ease stress."
            ],
            [
                "name" => "Deep Tissue Recovery",
                "duration" => "$170 (60 min) or  $255 (90 min)",
                "description" => "Targeting deeper layers of the muscle and connective tissue, this massage is curated for those
                    seeking a release from chronic patterns of tension and pain by addressing the root cause.
                    Techniques used but not limited to include myofascial release, pinch and pull, trigger point
                    therapy as well as slow strokes with firm pressure. From athletes with sports related injuries or
                    to the person who simply feels overworked you are bound to find relief with this massage."
            ],
            [
                "name" => "Dreamscape Massage",
                "duration" => "$185 (60 min) or  $245 (90 min)",
                "description" => "A treatment with the intention of putting you in a deep state of relaxation. This session begins
                    with a head massage that progresses down to the face and neck targeting high tension points
                    using cold stones along with aromatherapy inhalation. From there we then treat the rest of the
                    body. Swedish massage techniques are primarily used that are traditionally lighter in pressure.
                    This is for the person looking to drift away from life stresses here by the beach."
            ],
            [
                "name" => "CBD Bliss",
                "duration" => "$200 (60 min) or  $300 (90 min)",
                "description" => "A relaxing treatment that uses Full Spectrum Spagyric (spuh-jeer-ik) CBD oil, with your choice of
                    scent (Lavender, Orange Blossom, Lemongrass or Unscented), to alleviate pain and
                    inflammation to the fullest. Spagyric CBD extracts are the fullest full spectrum available on the
                    market to date. This treatment also includes a serving of 25mg broad spectrum CBD gummies.
                    If you are looking to calm your body and mind while seeking immediate relief from pains and
                    aches then this is for you."
            ]
        ]
    ]
];
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
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
   

    <img src="images/ART-Provider-certs.png" alt="Sorella Apothecary" style="display: block; margin: 0 auto; width: 50%;">

    </div>
</section>

<?php require_once('parts/footer/footer3.php'); ?>

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
