<?php
    $head_title="Coastal Bliss | Waxing";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
    $page_title = "Services";
    require_once('parts/page-title.php');
?>

<?php
// Waxing Services Section
$waxing_services = [
    [
        "title" => "Waxing Services ✨",
        "price" => "",
        "description" => "Smooth, flawless skin with our gentle and effective waxing techniques.",
        "services" => [
            ["Brow Shaping and Wax", "$25 – Expert shaping to enhance your natural features and define your brows."],
            ["Lip or Chin", "$15 – Quick, gentle hair removal for a smooth, clean look."],
            ["Full Face", "$50 – Includes brows, lip, chin, and cheeks for a radiant, polished finish."],
            ["Underarms", "$30 – Achieve soft, hair-free underarms with long-lasting results."],
            ["Half Arm / Full Arm", "$40 / $55 – Silky smooth skin from wrist to elbow or full arm."],
            ["Bikini Line", "$45 – Cleans up the sides and top for a neat, natural bikini look."],
            ["Brazilian", "$75 – Complete front-to-back hair removal for a smooth and confident feel."],
            ["Brazilian Bikini", "$100 – A premium treatment including front, back, and sides for the ultimate clean, smooth look."],
            ["Half Leg / Full Leg", "$50 / $80 – Smooth legs from knee down or full length, perfect for any season."],
        ]
    ],
    [
        "title" => "Men’s Waxing",
        "price" => "",
        "description" => "Achieve smooth, hair-free skin with our tailored waxing services for men.",
        "services" => [
            ["Back", "$65 – Full back waxing for a clean, groomed appearance."],
            ["Chest", "$60 – Removes chest hair for a sleek and smooth result."],
        ]
    ]
];
?>

 <section id="services" class="py-5" style="color: #222; background-color: #FAFAFA;">
     <div class="container">
         <!-- Waxing Services Section -->
         <?php foreach ($waxing_services as $service) : ?>
             <div class="mb-5" style="padding-bottom: 20px; border-bottom: 2px solid #9f8958;">
                 <h3 style="color:#212936; font-weight: bold; font-size: 2.2em; margin-bottom: 10px;"> <?= $service["title"] ?> </h3>
                 <?php if (isset($service["price"])) : ?>
                     <h4 style="color: #666; font-weight: bold; font-size: 1.2em; margin-bottom: 10px;"> <?= $service["price"] ?> </h4>
                 <?php endif; ?>
                 <p style="color: #333; font-size: 1.1em; line-height: 1.5; margin-bottom: 15px;"> <?= $service["description"] ?? "" ?> </p>
                 <?php if (isset($service["services"])) : ?>
                     <ul style="color: #555; padding-left: 20px; line-height: 1.6;">
                         <?php foreach ($service["services"] as $subService) : ?>
                             <li style="margin-bottom: 10px;"><strong style="color: #9f8958; font-size: 1.2em; font-weight: bold;"> <?= $subService[0] ?>:</strong> <?= $subService[1] ?></li>
                         <?php endforeach; ?>
                     </ul>
                 <?php endif; ?>
             </div>
         <?php endforeach; ?>
     </div>
 </section>

<?php require_once('parts/footer/footer.php'); ?>
