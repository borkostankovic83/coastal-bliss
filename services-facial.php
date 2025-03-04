<?php
    $head_title="Purerelax | Spa & Beauty PHP Template | Services";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
	$page_title = "Services";
	require_once('parts/page-title.php');
?>

<?php
 // Services Section
 $services = [
     [
         "title" => "Facials – Featuring Eminence Organic Skincare",
         "price" => "$150 (60 min)",
         "description" => "Nourish, restore, and transform your skin with the power of organic botanicals.",
         "services" => [
             ["Coastal Glow Facial", "A classic, fully customized facial designed to hydrate, refresh, and restore your skin’s natural glow. Includes deep cleansing, exfoliation, gentle extractions, a relaxing facial massage, and a nourishing mask."],
             ["Hydra Renewal Facial", "Quench dehydrated skin with hyaluronic-rich botanicals, leaving your skin plump, refreshed, and dewy."],
             ["Sun-Kissed Glow Facial", "Brighten and even skin tone with a powerful infusion of vitamin C, citrus extracts, and antioxidants to combat dullness and unveil a luminous, sun-kissed glow."],
             ["Age-Defying Botanical Facial", "A luxurious anti-aging treatment designed to lift, firm, and smooth the skin. Using Eminence’s organic peptides and botanical retinol alternatives, this facial enhances elasticity and reduces fine lines."],
             ["Probiotic Rescue Facial", "A powerful detoxifying facial designed to combat breakouts, balance oil production, and soothe inflammation. Featuring Eminence’s natural salicylic acid, charcoal, and probiotic-rich ingredients, this treatment deeply cleanses pores while promoting a clear, healthy complexion."],
             ["Soothing Sensitive Skin Facial", "Calm and strengthen sensitive or rosacea-prone skin with gentle, anti-inflammatory botanicals that reduce redness and irritation while restoring hydration."],
             ["Mangosteen Glow Renewal Facial", "Experience the power of lactic acid and antioxidant-rich mangosteen to refine pores, smooth texture, and reveal a luminous, healthy glow."],
             ["Blueberry Detox Radiance Facial", "A stimulating and detoxifying facial with blueberry, paprika, and natural acids to deeply exfoliate and brighten while boosting circulation."],
         ]
     ],
     [
         "title" => "Dermaplaning Facial",
         "price" => "$195 (75 min)",
         "description" => "A luxurious resurfacing facial that removes dead skin cells and peach fuzz for a smooth, radiant complexion. Includes deep cleansing, dermaplaning, an Eminence masque, and organic finishing serums.",
     ],
     [
         "title" => "Ultimate Bliss Back Facial",
         "description" => "Indulge in a luxurious full-back experience that melts away tension while deeply revitalizing the skin. This back facial includes an organic double cleanse, gentle exfoliation with fruit enzymes, steam, extractions (if needed), and a nourishing botanical masque to soften and refresh the skin. Includes a nourishing warm oil massage to enhance relaxation and restore a silky-smooth feel. Finished with a rich Eminence moisturizer to lock in hydration and glow.",
         "services" => [
             ["Hot Stone Add-On", "$20 - Extend this relaxing experience with hot stones to relieve muscle tension and promote circulation."],
         ]
     ],
     [
         "title" => "Enhance Any Facial",
         "price" => "$20 Add-On",
         "services" => [
             ["Firming Neck & Décolleté Treatment", "A targeted anti-aging treatment to firm and hydrate the delicate neck and chest area."],
             ["Eye & Lip Rejuvenation", "A soothing treatment to hydrate and smooth the delicate eye and lip areas."],
             ["Gua Sha Facial Massage", "A traditional facial massage technique that sculpts, lifts, and promotes lymphatic drainage."],
             ["Hot Stone Facial Massage", "Warm stones are gently massaged over the face to promote circulation, relaxation, and deeper muscle release."],
             ["Soothing CBD & Peppermint Crème Massage", "Infused with CBD and peppermint, this calming massage relieves hand and arm tension and inflammation while deeply hydrating the skin."],
             ["Refined Radiance Dermaplaning", "Upgrade your facial with gentle dermaplaning to smooth skin texture, remove peach fuzz, and boost skincare absorption for a flawless finish."],
         ]
     ]
 ];
 ?>

 <section id="services" class="py-5" style="color: #222; background-color: #FAFAFA;">
     <div class="container">
         <h2 class="text-center mb-4" style="color: #BEAC5A; font-weight: bold;">Facial Services</h2>
         <?php foreach ($services as $service) : ?>
             <div class="mb-5" style="padding-bottom: 20px; border-bottom: 2px solid #BEAC5A;">
                 <h3 style="color: #BEAC5A; font-weight: bold; font-size: 1.5em; margin-bottom: 10px;"> <?= $service["title"] ?> </h3>
                 <?php if (isset($service["price"])) : ?>
                     <h4 style="color: #666; font-weight: bold; font-size: 1.2em; margin-bottom: 10px;"> <?= $service["price"] ?> </h4>
                 <?php endif; ?>
                 <p style="color: #333; font-size: 1.1em; line-height: 1.5; margin-bottom: 15px;"> <?= $service["description"] ?? "" ?> </p>
                 <?php if (isset($service["services"])) : ?>
                     <ul style="color: #555; padding-left: 20px; line-height: 1.6;">
                         <?php foreach ($service["services"] as $subService) : ?>
                             <li style="margin-bottom: 10px;"><strong style="color: #222; font-size: 1.1em;"> <?= $subService[0] ?>:</strong> <?= $subService[1] ?></li>
                         <?php endforeach; ?>
                     </ul>
                 <?php endif; ?>
             </div>
         <?php endforeach; ?>
     </div>
 </section>


<?php require_once('parts/footer/footer3.php'); ?>