<?php
    $head_title="Coastal Bliss | Facials";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
	$page_title = "Services";
	require_once('parts/page-title.php');
?>

<section id="services" class="py-5 container">
    <div class="container">

        <img src="images/eminence-logo.png" alt="Image" class="img-center">

        <!-- Facials Section -->
        <div class="mb-5 facials-section">
            <h3 class="facial-heading">Facials – Featuring Eminence Organic Skincare</h3>
            <h4 class="text-gray">$150 (60 min)</h4>
            <p class="head_title">Nourish, restore, and transform your skin with the power of organic botanicals.</p>
            <ul class="text-dark">
                <li><span class="text-brown">Coastal Glow Facial:</span> A classic, fully customized facial designed to hydrate, refresh, and restore your skin’s natural glow. Includes deep cleansing, exfoliation, gentle extractions, a relaxing facial massage, and a nourishing mask.</li>
                <li><span class="text-brown">Hydra Renewal Facial:</span> Quench dehydrated skin with hyaluronic-rich botanicals, leaving your skin plump, refreshed, and dewy.</li>
                <li><span class="text-brown">Sun-Kissed Glow Facial:</span> Brighten and even skin tone with a powerful infusion of vitamin C, citrus extracts, and antioxidants to combat dullness and unveil a luminous, sun-kissed glow.</li>
                <li><span class="text-brown">Age-Defying Botanical Facial:</span> A luxurious anti-aging treatment designed to lift, firm, and smooth the skin. Using Eminence’s organic peptides and botanical retinol alternatives, this facial enhances elasticity and reduces fine lines.</li>
                <li><span class="text-brown">Probiotic Rescue Facial:</span> A powerful detoxifying facial designed to combat breakouts, balance oil production, and soothe inflammation. Featuring Eminence’s natural salicylic acid, charcoal, and probiotic-rich ingredients, this treatment deeply cleanses pores while promoting a clear, healthy complexion.</li>
                <li><span class="text-brown">Soothing Sensitive Skin Facial:</span> Calm and strengthen sensitive or rosacea-prone skin with gentle, anti-inflammatory botanicals that reduce redness and irritation while restoring hydration.</li>
                <li><span class="text-brown">Mangosteen Glow Renewal Facial:</span> Experience the power of lactic acid and antioxidant-rich mangosteen to refine pores, smooth texture, and reveal a luminous, healthy glow.</li>
                <li><span class="text-brown">Blueberry Detox Radiance Facial:</span> A stimulating and detoxifying facial with blueberry, paprika, and natural acids to deeply exfoliate and brighten while boosting circulation.</li>
                <li><span class="text-brown">Ultimate Bliss Back Facial:</span> Indulge in a luxurious full-back experience that melts away tension while deeply revitalizing the skin. This back facial includes an organic double cleanse, gentle exfoliation with fruit enzymes, steam, extractions (if needed), and a nourishing botanical masque to soften and refresh the skin. Includes a nourishing warm oil massage to enhance relaxation and restore a silky-smooth feel. Finished with a rich Eminence moisturizer to lock in hydration and glow.</li>
            </ul>
        </div>

        <!-- Platinum Coastal Bliss Facial -->
        <div class="mb-5 facials-section">
            <h3 class="facial-heading">Platinum Coastal Bliss Facial</h3>
            <h4 class="text-gray">$195 (75 min)</h4>
            <ul class="text-dark">
                <li><span class="text-brown">Dermaplaning Facial:</span> A luxurious resurfacing facial that removes dead skin cells and peach fuzz for a smooth, radiant complexion. Includes deep cleansing, dermaplaning, an Eminence masque, and organic finishing serums.</li>
            </ul>
        </div>

        <!-- Enhance Any Facial Section -->
        <div class="mb-5 facials-section">
            <h3 class="facial-heading">Enhance Any Facial</h3>
            <h4 class="addon-heading">$20 Add-On</h4>
            <ul class="text-dark">
                <li><span class="text-brown">Firming Neck & Décolleté Treatment:</span> A targeted anti-aging treatment to firm and hydrate the delicate neck and chest area.</li>
                <li><span class="text-brown">Eye & Lip Rejuvenation:</span> A soothing treatment to hydrate and smooth the delicate eye and lip areas.</li>
                <li><span class="text-brown">Gua Sha Facial Massage:</span> A traditional facial massage technique that sculpts, lifts, and promotes lymphatic drainage.</li>
                <li><span class="text-brown">Hot Stone:</span> Warm stones are gently massaged over the face to promote circulation, relaxation, and deeper muscle release.</li>
                <li><span class="text-brown">Soothing CBD & Peppermint Crème Massage:</span> Infused with CBD and peppermint, this calming massage relieves hand and arm tension and inflammation while deeply hydrating the skin.</li>
            </ul>
            <h4 class="addon-heading">$45 Add-On</h4>
            <ul class="text-dark">
                <li><span class="text-brown">Refined Radiance Dermaplaning:</span> Upgrade your facial with gentle dermaplaning to smooth skin texture, remove peach fuzz, and boost skincare absorption for a flawless finish.</li>
            </ul>
        </div>


    </div>
</section>

<?php require_once('parts/footer/footer3.php'); ?>
<style>
.text-brown {
    color: #665d34;
    font-size: 1.2em;
    font-weight: bold;
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
    border-bottom: 2px solid #665d34;
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