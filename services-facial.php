<?php
$head_title = "Coastal Bliss | Facials";
require_once('parts/header/header.php');

$page_title = "Services - Facials";
require_once('parts/page-title.php');

// Connect to database
require_once "../database.php";
$conn = getDatabaseConnection();

// Query facial treatments ordered by section and price
$facials_sql = "SELECT * FROM facials ORDER BY section ASC, sort_order ASC, id ASC";
$result = mysqli_query($conn, $facials_sql);
$facials = [];
while ($row = mysqli_fetch_assoc($result)) {
    $facials[$row['section']][] = $row;
}

// Query grouped facial add-ons
$addons_sql = "SELECT 
    fa.price,
    GROUP_CONCAT(
      CONCAT(
         fa.id, '::',
         fa.name, ': ', fa.description,
         IF(
           (SELECT COUNT(*) 
            FROM facial_add_on_options fo 
            WHERE fo.add_on_id = fa.id) > 0, 
            CONCAT('||', (
              SELECT GROUP_CONCAT(fo.option_text SEPARATOR '||') 
              FROM facial_add_on_options fo 
              WHERE fo.add_on_id = fa.id
            )),
            ''
         )
      ) SEPARATOR '##'
    ) AS addon_group
FROM facial_add_ons fa
GROUP BY fa.price
ORDER BY fa.price ASC";

$addons_result = mysqli_query($conn, $addons_sql);
$addons = array();
while ($row = mysqli_fetch_assoc($addons_result)) {
    $addons[] = $row;
};

?>
<section id="services" class="py-5 container">
    <div class="container">
        <img src="images/Sorella_wordmark-gold.png" alt="Sorella Apothecary" class="img-center">
        
        <?php
        // Define the correct display order
        $sectionOrder = ['Basic Facials', 'Signature Facials', 'Extended Facials'];

        // Sort the facials array based on this order
        $sortedFacials = [];
        foreach ($sectionOrder as $sectionName) {
            if (isset($facials[$sectionName])) {
                $sortedFacials[$sectionName] = $facials[$sectionName];
            }
        }
        ?>
        <!-- Display Facials Dynamically by Section -->
        <?php foreach ($sortedFacials as $section => $facialGroup): ?>


        <!-- Section Header -->
    <div class="mb-5 facials-section"></div>
    <?php if ($section == 'Basic Facials'): ?>
        <h3 style="color: #9f8958">Everyday Glow</h3>
        <div class="mb-5 facials-section"></div>

    <?php elseif ($section == 'Signature Facials'): ?>
        <h3 style="color: #9f8958">Our Advanced Facials</h3>
        <p style="color: #555; font-size: 1rem; margin-top: 0.5rem;">
            Experience the essence of our spa with facials crafted to rejuvenate, restore, and reveal your natural radiance.
        </p>
        <div class="mb-5 facials-section"></div>

    <?php else: ?>
        <h3 style="color: #9f8958">Extend the moment. Elevate the glow.</h3>
        <div class="mb-5 facials-section"></div>
    <?php endif; ?>

    <!-- Facial Items -->
    <?php foreach ($facialGroup as $facial): ?>
        <div class="mb-5">
            <h3 class="facial-heading"><?php echo htmlspecialchars($facial['name']); ?></h3>
            <h4 class="text-gray">$<?php echo number_format($facial['price'], 2); ?> (<?php echo htmlspecialchars($facial['duration']); ?>)</h4>
            <p class="text-dark"><?php echo nl2br(htmlspecialchars($facial['description'])); ?></p>

            <?php
            // Retrieve options dynamically for this specific facial
            $stmt = $conn->prepare("SELECT option_title, option_description FROM facial_options WHERE facial_id = ?");
            $stmt->bind_param("i", $facial['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            $options = $result->fetch_all(MYSQLI_ASSOC);
            $stmt->close();

            // Display options
            if (!empty($options)) {
                echo "<ul>";
                foreach ($options as $option) {
                    echo "<li>";
                    echo "<span class='text-gold'>" . htmlspecialchars($option['option_title']) . "</span> ";
                    echo "<span>" . htmlspecialchars($option['option_description']) . "</span>";
                    echo "</li>";
                }
                echo "</ul>";
                echo "<p>Each facial includes a relaxing massage, exfoliation, and customized mask for the ultimate glow.</p>";
                echo "<div class='mb-5 facials-section'></div>";
            }
            ?>
        </div>
    <?php endforeach; ?>

<?php endforeach; ?>

<!-- Divider -->
<div class="mb-5 facials-section"></div>

<!-- Display Facial Add-Ons Dynamically -->
<div class="mb-5 facials-section">
    <h3 class="facial-heading">Enhance Any Facial</h3>
    <?php foreach ($addons as $addon_row): ?>
        <h4 class="addon-heading">$<?php echo number_format($addon_row['price'], 2); ?> Add-On</h4>
        <ul class="text-dark">
            <?php 
            // Explode the concatenated add-on entries by "##"
            $add_on_items = explode('##', $addon_row['addon_group']);
            foreach ($add_on_items as $item): 
                $temp = explode('::', $item, 2);
                $id = trim($temp[0]);
                $rest = isset($temp[1]) ? $temp[1] : '';
                $parts = explode('||', $rest);
                $mainText = trim($parts[0]);
                $subOptions = array_slice($parts, 1);
            ?>
                <li>
                    <span class="text-gold">
                        <?php 
                        $temp2 = explode(': ', $mainText, 2);
                        echo htmlspecialchars(trim($temp2[0])); 
                        ?>
                    </span>: 
                    <span>
                        <?php echo isset($temp2[1]) ? htmlspecialchars(trim($temp2[1])) : ''; ?>
                    </span>

                    <?php if (!empty($subOptions)): ?>
                        <ul class="sub-option-list mt-2 mb-3">
                            <?php foreach ($subOptions as $option): ?>
                                <li><?php echo htmlspecialchars(trim($option)); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</div>

<img src="images/Feed-Your-Skin-Treat-Your-Soul-.png" alt="Sorella Apothecary" class="img-center">
</div>
</section>
<?php require_once('parts/footer/footer.php'); ?>

<style>
.text-gold {
    color: #9f8958;
    font-size: 1.2em;
    font-weight: bold;
}
.sub-option-list {
    list-style-type: disc !important;
    list-style: disc !important;
    margin-left: 1.5rem;
    /* Additional styling as desired */
    font-style: normal;
    color: #333;
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
ul li ul {
  list-style-type: disc;
  margin-left: 1.5rem;
  font-style: italic;
  color: #666;
}

</style>