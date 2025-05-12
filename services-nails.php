<?php
    $head_title="Coastal Bliss | Nails";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
    $page_title = "Services";
    require_once('parts/page-title.php');
?>

<?php
 // Manicure Services Section
 $manicure_services = [
     [
         "title" => "Manicure Services",
         "price" => "",
         "description" => "Treat your hands to rejuvenating nail care with our signature manicures, designed to hydrate, restore, and beautify your hands.",
         "services" => [
             ["The Coastal Bliss Manicure", "$50 (Classic Spa Manicure) – A timeless treatment for beautifully groomed hands. Includes nail shaping, a warm hand soak, cuticle care, sugar scrub, warm towel wrap, and a deeply soothing hand massage."],
             ["The Luxe Gel Manicure", "$60 – A flawless, chip-resistant finish with expert nail shaping, detailed cuticle care, and strengthening gel polish for a glossy, long-lasting effect."],
             ["European Precision Gel Manicure", "$70 – A refined manicure using European e-file technique for meticulous cuticle care and a polished, long-lasting gel finish."],
         ]
     ]
 ];

 // Pedicure Services Section
 $pedicure_services = [
     [
         "title" => "Pedicure Services",
         "price" => "",
         "description" => "Pamper your feet with luxurious pedicures designed to refresh, nourish, and provide lasting beauty.",
         "services" => [
             ["The Coastal Bliss Pedicure", "$85 (Classic Spa Pedicure) – A rejuvenating pedicure with a warm foot soak, nail and cuticle care, exfoliation, relaxing foot massage, and polish application."],
             ["The Luxe Gel Pedicure", "$95 – A refined, long-lasting pedicure with a gel polish application for a flawless, chip-free finish and a hydrating foot massage."],
         ]
     ]
 ];

 // Customize Your Experience Section
 $custom_services = [
     [
         "title" => "Customize Your Experience for Extra Luxury",
         "services" => [
             ["Extended Massage", "$25 – Enjoy an additional 15 minutes of therapeutic massage on hands, feet, or both."],
             ["Hot Stone Massage", "$15 – Experience deep relaxation with warm basalt stones during your hand or foot massage."],
             ["CBD & Peppermint Crème", "$15 – A soothing, anti-inflammatory treatment to hydrate and calm tired hands and feet."],
             ["Hydrating Paraffin Treatment", "$20 – A warm, ultra-moisturizing infusion for silky-smooth hands or feet."],
             ["Gel Polish Removal", "Complimentary for services done at Coastal Bliss Wellness / $15 for outside gel removal."],
             ["French Polish", "$20 - Complete your manicure or pedicure with a classic French polish for a timeless, elegant finish. Perfect for any occasion!"],
         ]
     ]
 ];
 ?>

 <section id="services" class="py-5" style="color: #222; background-color: #FAFAFA;">
     <div class="container">

         <!-- Manicure Services Section -->
         <?php foreach ($manicure_services as $service) : ?>
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

         <!-- Pedicure Services Section -->
         <?php foreach ($pedicure_services as $service) : ?>
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

         <!-- Customize Your Experience Section -->
         <?php foreach ($custom_services as $service) : ?>
             <div class="mb-5" style="padding-bottom: 20px; border-bottom: 2px solid #665d34;">
                 <h3 style="color:#212936; font-weight: bold; font-size: 2.2em; margin-bottom: 10px;"> <?= $service["title"] ?> </h3>
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
