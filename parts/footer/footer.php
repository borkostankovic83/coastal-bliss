<?php
require_once "../database.php";
$conn = getDatabaseConnection();

// Fetch all footer data
$footer_data = [];
$res = mysqli_query($conn, "SELECT `key`, `value` FROM site_content");
while ($row = mysqli_fetch_assoc($res)) {
    $footer_data[$row['key']] = $row['value'];
}
$open_hours = json_decode($footer_data['open_hours'] ?? '{}', true);
?>
<!-- Main Footer -->
<footer class="main-footer">
<!--Widgets Section-->
<div class="widgets-section">
  <div class="footer1-1 bounce-x"></div>
  <div class="auto-container">
    <div class="row">
      <!--Footer Column-->
      <div class="footer-column col-lg-4 col-md-6 order-1">
        <div class="footer-widget timetable-widget">
          <h3 class="widget-title">Open Hours</h3>
          <ul class="timetable">
            <?php foreach ($open_hours as $day => $hours): ?>
              <li><?= htmlspecialchars($day) ?>: <span><?= htmlspecialchars($hours) ?></span></li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
      <!--Footer Column-->
      <div class="footer-column col-lg-4 col-md-6 order-0 order-lg-1">
        <div class="footer-widget about-widget text-center">
          <div class="logo"><a href="index.php"><img src="<?= htmlspecialchars($footer_data['footer_logo'] ?? '') ?>" alt=""></a></div>
          <div class="text"><?= htmlspecialchars($footer_data['footer_text'] ?? '') ?></div>
          <ul class="social-icon">
            <li><a href="<?= htmlspecialchars($footer_data['facebook_url'] ?? '#') ?>"><i class="icon fab fa-facebook-f"></i></a></li>
            <li><a href="<?= htmlspecialchars($footer_data['instagram_url'] ?? '#') ?>"><i class="icon fab fa-instagram"></i></a></li>
          </ul>
        </div>
      </div>
      <!--Footer Column-->
      <div class="footer-column col-lg-4 col-md-6 order-2">
        <div class="footer-widget contacts-widget">
          <h3 class="widget-title">Contact</h3>
          <div class="text"><?= $footer_data['address'] ?? '' ?></div>
          <ul class="contact-info">
            <li><a href="tel:<?= htmlspecialchars($footer_data['phone'] ?? '') ?>"><?= htmlspecialchars($footer_data['phone'] ?? '') ?></a></li>
            <li><a href="mailto:<?= htmlspecialchars($footer_data['email'] ?? '') ?>"><?= htmlspecialchars($footer_data['email'] ?? '') ?></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer Bottom-->
<div class="footer-bottom">
  <div class="auto-container">
    <div class="inner-container">
      <figure class="image"><img src="images/icons/footer-bottom-img-1.png" alt="Image"></figure>
      <div class="copyright-text">&copy; Coastal Bliss Wellness<a href="index.php"></a></div>
      <a class="link" href="index.php">Terms & Conditions</a>
    </div>
  </div>
</div>
</footer>
<!--End Main Footer -->
</div><!-- End Page Wrapper -->
<?php require_once('parts/footer/footer-js.php'); ?>
</body>
</html>