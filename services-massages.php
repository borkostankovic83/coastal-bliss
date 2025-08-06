<?php
    $head_title="Coastal Bliss | Massages";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
    $page_title = "Services - Massages";
    require_once('parts/page-title.php');

    // Database connection
    require_once "../database.php";
    $conn = getDatabaseConnection();

    // Query massage categories, services, and options from the database
    $sql = "
        SELECT 
            mc.id AS category_id,
            mc.title AS category_title,
            m.id AS massage_id,
            m.name AS massage_name,
            m.description AS massage_description,
            mo.duration AS option_duration,
            mo.price AS option_price
        FROM massage_categories mc
        JOIN massages m ON mc.id = m.category_id
        JOIN massage_options mo ON m.id = mo.massage_id
        ORDER BY mc.id, m.id, mo.id
    ";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Database Query Failed: " . mysqli_error($conn));
    }

    // Group data into a structured array: category -> massages -> options
    $categories = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $catId = $row['category_id'];
        if (!isset($categories[$catId])) {
            $categories[$catId] = [
                'title'    => $row['category_title'],
                'massages' => []
            ];
        }
        $massageId = $row['massage_id'];
        if (!isset($categories[$catId]['massages'][$massageId])) {
            $categories[$catId]['massages'][$massageId] = [
                'name'        => $row['massage_name'],
                'description' => $row['massage_description'],
                'options'     => []
            ];
        }
        $categories[$catId]['massages'][$massageId]['options'][] = [
            'duration' => $row['option_duration'],
            'price'    => number_format($row['option_price'], 2)
        ];
    }

    // Query massage add-ons from the database
    $addonQuery = "SELECT name, price FROM massage_add_ons ORDER BY name";
    $addonResult = mysqli_query($conn, $addonQuery);
    $addons = [];
    while ($row = mysqli_fetch_assoc($addonResult)) {
        $addons[] = $row;
    }

?>

<section id="services" class="py-5 container">
    <div class="container">
        <img src="images/ART-Provider Logo.png" alt="Sorella Apothecary" style="display: block; margin: 0 auto; width: 20%;">
        
        <?php foreach ($categories as $category): ?>
            <div class="service-section">
                <h2 class="font-bold text-center text-gold"><?= htmlspecialchars($category['title']); ?></h2>
                
                <?php foreach ($category['massages'] as $massage): ?>
                    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                        <h3 style="color:#212936; font-weight: bold; font-size: 2.2em; margin-bottom: 10px;">
                            <?= htmlspecialchars($massage['name']); ?>
                        </h3>
                        <?php if (!empty($massage['options'])): ?>
                            <h4 class="text-gray">
                                <?php foreach ($massage['options'] as $option): ?>
                                    <?php 
                                        $duration = htmlspecialchars($option['duration']);
                                        $price = floatval($option['price']);
                                        if ($price > 0) {
                                            // Display both duration and price when price is greater than zero
                                            echo $duration . " - $" . number_format($price, 2);
                                        } else {
                                            // If price is $0.00, show only the duration
                                            echo $duration;
                                        }
                                    ?>
                                    <br>
                                <?php endforeach; ?>
                            </h4>
                        <?php endif; ?>
                        <p style="color: #333; font-size: 1.1em; line-height: 1.5; margin-bottom: 15px;">
                            <?= nl2br(htmlspecialchars($massage['description'])); ?>
                        </p>
                    </div>
                    <div class="mb-5 facials-section"></div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
       
        <div class="service-section">
            <h3 class="addon-heading">Massage Add-Ons</h3>
            <ul style="font-size: 1.1em; line-height: 1.6; margin-top: 15px; padding-left: 20px; list-style-type: disc;">
                <?php foreach ($addons as $addon): ?>
                    <li>
                        <?php echo htmlspecialchars($addon['name']); ?> - $<?php echo number_format($addon['price'],2); ?>
                    </li>
                <?php endforeach; ?>
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
    color: #9f8958;
    font-weight: bold;
    font-size: 2.2em;
    margin-bottom: 10px;
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
