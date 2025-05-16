<?php
    $head_title="Coastal Bliss | Services";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
	$page_title = "Services";
	require_once('parts/page-title.php');
?>

<!-- Services Section Two -->
<section class="services-section pt-100">
  <div class="service1-pattrn1 bounce-y"></div>
  <div class="auto-container">
    <div class="outer-box">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <!-- Service Block -->
          <div class="service-block" data-link="services-facial.php">
            <div class="inner-box">
              <div class="image-box">
                <div class="bg-image" style="background-image:url(./images/resource/service1-2.png);"></div>
                <div class="bg-image-two" style="background-image:url(./images/resource/service1-2.png);"></div>
              </div>
              <div class="content-box">
                <figure class="icon mb-0"><img src="images/icons/theme-icon6.png" alt="Image"></figure>
                <h4 class="title"><a href="services-facial.php">Facial Treatments</a></h4>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-sm-6">
          <!-- Service Block -->
          <div class="service-block" data-link="services-nails.php">
            <div class="inner-box">
              <div class="image-box">
                <div class="bg-image" style="background-image:url(./images/resource/service1-2.png);"></div>
                <div class="bg-image-two" style="background-image:url(./images/resource/service1-2.png);"></div>
              </div>
              <div class="content-box">
                <figure class="icon mb-0"><img src="images/icons/theme-icon7.png" alt="Image"></figure>
                <h4 class="title"><a href="services-nails.php">Hand & Foot Care</a></h4>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-sm-6">
          <!-- Service Block -->
          <div class="service-block" data-link="services-waxing.php">
            <div class="inner-box">
              <div class="image-box">
                <div class="bg-image" style="background-image:url(./images/resource/service1-2.png);"></div>
                <div class="bg-image-two" style="background-image:url(./images/resource/service1-2.png);"></div>
              </div>
              <div class="content-box">
                <figure class="icon mb-0"><img src="images/icons/theme-icon8.png" alt="Image"></figure>
                <h4 class="title"><a href="services-waxing.php">Waxing</a></h4>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-sm-6">
          <!-- Service Block -->
          <div class="service-block" data-link="services-massages.php">
            <div class="inner-box">
              <div class="image-box">
                <div class="bg-image" style="background-image:url(./images/resource/service1-2.png);"></div>
                <div class="bg-image-two" style="background-image:url(./images/resource/service1-2.png);"></div>
              </div>
              <div class="content-box">
                <figure class="icon mb-0"><img src="images/icons/theme-icon3.png" alt="Image"></figure>
                <h4 class="title"><a href="services-massages.php">Massage</a></h4>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>
<!--End Services Section -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
      document.querySelectorAll(".service-block").forEach(block => {
        block.style.cursor = "pointer"; // Change cursor to indicate clickability
        block.addEventListener("click", function (event) {
          // Prevent triggering if clicking on an actual <a> tag (avoid double navigation)
          if (!event.target.closest("a")) {
            window.location.href = this.getAttribute("data-link");
          }
        });
      });
    });
</script>
<!-- Instagram Section -->
<section class="instagram-section">
  <div class="icon-instagram1-6 bounce-x"></div>
  <div class="icon-instagram1-7 bounce-y"></div>
  <div class="auto-container">
    <div class="sec-title text-center">
      <h4 class="words-slide-up text-split">Welcome to Coastal Bliss</h4>
    </div>
    <div class="row">
      <!-- pricing-block -->
      <!-- <div class="instagram-block col-lg-2 col-md-3 col-sm-6">
        <div class="inner-box">
          <div class="image-box">
            <figure class="image">
              <a href="#"><img src="images/resource/instagram1-1.jpg" alt="Image"></a>
            </figure>
            <i class="icon fab fa-instagram"></i>
          </div>
        </div>
      </div> -->
      <!-- pricing-block -->
      <!-- <div class="instagram-block col-lg-2 col-md-3 col-sm-6">
        <div class="inner-box">
          <div class="image-box">
            <figure class="image">
              <a href="#"><img src="images/resource/instagram1-2.jpg" alt="Image"></a>
            </figure>
            <i class="icon fab fa-instagram"></i>
          </div>
        </div>
      </div> -->
      <!-- pricing-block -->
      <!-- <div class="instagram-block col-lg-2 col-md-3 col-sm-6">
        <div class="inner-box">
          <div class="image-box">
            <figure class="image">
              <a href="#"><img src="images/resource/instagram1-3.jpg" alt="Image"></a>
            </figure>
            <i class="icon fab fa-instagram"></i>
          </div>
        </div>
      </div> -->
      <!-- pricing-block -->
      <!-- <div class="instagram-block col-lg-2 col-md-3 col-sm-6">
        <div class="inner-box">
          <div class="image-box">
            <figure class="image">
              <a href="#"><img src="images/resource/instagram1-1.jpg" alt="Image"></a>
            </figure>
            <i class="icon fab fa-instagram"></i>
          </div>
        </div>
      </div> -->
      <!-- pricing-block -->
      <!-- <div class="instagram-block col-lg-2 col-md-3 col-sm-6">
        <div class="inner-box">
          <div class="image-box">
            <figure class="image">
              <a href="#"><img src="images/resource/instagram1-4.jpg" alt="Image"></a>
            </figure>
            <i class="icon fab fa-instagram"></i>
          </div>
        </div>
      </div> -->
      <!-- pricing-block -->
      <!-- <div class="instagram-block col-lg-2 col-md-3 col-sm-6">
        <div class="inner-box">
          <div class="image-box">
            <figure class="image">
              <a href="#"><img src="images/resource/instagram1-5.jpg" alt="Image"></a>
            </figure>
            <i class="icon fab fa-instagram"></i>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</section>
<!-- End Instagram Section -->

<?php require_once('parts/footer/footer.php'); ?>
