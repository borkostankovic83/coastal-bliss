<?php 
    $head_title="Coastal Bliss | Contact Us";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
	$page_title = "Contact Us";
	require_once('parts/page-title.php');
?>

<?php
if (isset($_GET['status']) && isset($_GET['message'])) {
    $status = $_GET['status'];
    $message = urldecode($_GET['message']);
    echo "<div class='alert " . ($status == "true" ? "alert-success" : "alert-danger") . "'>$message</div>";
}
?>

<!-- Contact Details Start -->
<section class="contact-details pt-100 pb-70">
  <div class="container ">
    <div class="row">
      <div class="col-xl-7 col-lg-6">
        <div class="sec-title">
          <span class="sub-title">Send us email</span>
          <h2>Feel free to write</h2>
        </div>
        <!-- Contact Form -->
        <form id="contact_form" name="contact_form" class="" action="includes/sendmail.php" method="post">
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <input name="form_name" class="form-control required" type="text" placeholder="Enter Name">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <input name="form_email" class="form-control required email" type="email" placeholder="Enter Email">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3">
                <input name="form_subject" class="form-control required" type="text" placeholder="Enter Subject">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3">
                <input name="form_phone" class="form-control" type="text" placeholder="Enter Phone">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <textarea name="form_message" class="form-control required" rows="7" placeholder="Enter Message"></textarea>
          </div>
          <div class="mb-5">
            <input name="form_botcheck" class="form-control" type="hidden" value="" />
            <button type="submit" class="theme-btn btn-style-one mb-3 mb-sm-0" data-loading-text="Please wait..."><span class="btn-title">Send message</span></button>
            <button type="reset" class="theme-btn btn-style-one bg-theme-color5"><span class="btn-title">Reset</span></button>
          </div>
        </form>
        <!-- Contact Form Validation-->
      </div>
      <div class="col-xl-5 col-lg-6">
        <div class="contact-details__right">
          <div class="sec-title">
            <span class="sub-title">Need any help?</span>
            <h2>Get in touch</h2>
            <div class="text">Relax and rejuvenate with us! Whether you have questions about our services or want to book an appointment, we’re here to help.</div>
          </div>
          <ul class="list-unstyled contact-details__info">
            <li class="d-block d-sm-flex align-items-sm-center ">
              <div class="icon">
                <span class="lnr-icon-phone-plus"></span>
              </div>
              <div class="text ml-xs--0 mt-xs-10">
                <h6>Have any question?</h6>
                <a href="tel:3022609667"><span>Free</span> 302 260 9667</a>
              </div>
            </li>
            <li class="d-block d-sm-flex align-items-sm-center ">
              <div class="icon">
                <span class="lnr-icon-envelope1"></span>
              </div>
              <div class="text ml-xs--0 mt-xs-10">
                <h6>Write email</h6>
                <a href="mailto:info@coastalblissrehoboth.com">info@coastalblissrehoboth.com</a>
              </div>
            </li>
            <li class="d-block d-sm-flex align-items-sm-center ">
              <div class="icon">
                <span class="lnr-icon-location"></span>
              </div>
              <div class="text ml-xs--0 mt-xs-10">
                <h6>Visit anytime</h6>
                <span>323c Rehoboth Ave, Rehoboth Beach DE 19971</span>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Contact Details End-->

<!-- Map Section-->
<section class="map-section">
  <iframe
    class="map w-100"
    width="100%"
    height="600"
    style="border:0;"
    loading="lazy"
    allowfullscreen
    referrerpolicy="no-referrer-when-downgrade"
    src="https://maps.google.com/maps?q=323c+Rehoboth+Ave,+Rehoboth+Beach,+DE+19971&output=embed">
  </iframe>
</section>

<!--End Map Section-->

<?php require_once('parts/footer/footer.php'); ?>
