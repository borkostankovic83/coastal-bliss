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
             ["Brow Shaping and Wax", "$25 – Expertly shaped brows to frame your face beautifully."],
             ["Lip or Chin", "$15 – Quick and effective hair removal for a smooth finish."],
             ["Full Face", "$50 – Includes brows, lip, chin, and sides of the face for a polished look."],
             ["Underarms", "$30 – Silky-smooth underarms with long-lasting results."],
             ["Half Arm", "$40 / Full Arm", "$55 – Soft, hair-free skin from wrist to elbow or full arm."],
             ["Bikini Line", "$45 – A clean, natural look that removes hair along the bikini line."],
             ["Brazilian", "$75 – Complete hair removal for a smooth, confident feel."],
             ["Half Leg", "$50 / Full Leg", "$80 – Long-lasting silky legs, from knee-down or full length."],
         ]
     ],
     [
         "title" => "Men’s Waxing",
         "price" => "",
         "description" => "Achieve smooth, hair-free skin with our tailored waxing services for men.",
         "services" => [
             ["Back", "$65 – Removes hair for a clean, well-groomed appearance."],
             ["Chest", "$60 – Smooth, hair-free skin for a sleek look."],
         ]
     ]
 ];
 ?>

 <section id="services" class="py-5" style="color: #222; background-color: #FAFAFA;">
     <div class="container">
         <!-- Waxing Services Section -->
         <?php foreach ($waxing_services as $service) : ?>
             <div class="mb-5" style="padding-bottom: 20px; border-bottom: 2px solid #665d34;">
                 <h3 style="color:#212936; font-weight: bold; font-size: 2.2em; margin-bottom: 10px;"> <?= $service["title"] ?> </h3>
                 <?php if (isset($service["price"])) : ?>
                     <h4 style="color: #666; font-weight: bold; font-size: 1.2em; margin-bottom: 10px;"> <?= $service["price"] ?> </h4>
                 <?php endif; ?>
                 <p style="color: #333; font-size: 1.1em; line-height: 1.5; margin-bottom: 15px;"> <?= $service["description"] ?? "" ?> </p>
                 <?php if (isset($service["services"])) : ?>
                     <ul style="color: #555; padding-left: 20px; line-height: 1.6;">
                         <?php foreach ($service["services"] as $subService) : ?>
                             <li style="margin-bottom: 10px;"><strong style="color: #665d34; font-size: 1.2em; font-weight: bold;"> <?= $subService[0] ?>:</strong> <?= $subService[1] ?></li>
                         <?php endforeach; ?>
                     </ul>
                 <?php endif; ?>
             </div>
         <?php endforeach; ?>
     </div>
 </section>

<?php require_once('parts/footer/footer.php'); ?>
