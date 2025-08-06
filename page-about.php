<?php 
    $head_title="Coastal Bliss| About Us";

	require_once('parts/header/header.php'); 
	$page_title = "About Us";
	require_once('parts/page-title.php');

	require_once "../database.php";
	$conn = getDatabaseConnection();

	$work_time = [];
	$res = mysqli_query($conn, "SELECT `key`, `value` FROM site_content");
	while ($row = mysqli_fetch_assoc($res)) {
    	$work_time[$row['key']] = $row['value'];
	}
	$open_hours = json_decode($work_time['open_hours'] ?? '{}', true);

?>

<!-- About Section -->
<section class="about-section">
<div class="about1-9 bounce-y"></div>
<div class="auto-container">
	<div class="outer-box">
	<div class="row">
		<div class="image-column col-xl-5 col-lg-6 wow fadeInLeft">
		<div class="inner-column">
			<div class="image-box">
			<div class="exp-box">
				<div class="bg bg-image" style="background-image: url(./images/resource/about1-6.png)"></div>
				<div class="inner">
				<h2 class="title" data-text="25+">10+</h2>
				<span class="text">Experience</span>
				</div>
			</div>
			<figure class="image overlay-anim"><img src="images/resource/about1-1.png" alt="Image"></figure>
			<div class="bg bg-image-one bounce-x" style="background-image: url(./images/resource/about1-3.png)"></div>
			<div class="bg bg-image-two bounce-y" style="background-image: url(./images/resource/about1-4.png)"></div>
			<div class="bg bg-image-three" style="background-image: url(./images/resource/about1-7.png)"></div>
			<div class="bg bg-image-four bounce-Y" style="background-image: url(./images/resource/about1-8.png)"></div>
			</div>
		</div>
		</div>
		<div class="content-column col-xl-4 col-lg-6 col-md-6">
		<div class="inner-column">
			<div class="sec-title mb-0">
				<span class="sub-title">Get to know us</span>
				<h2 class="words-slide-up">Welcome to Coastal Bliss Wellness</h2>
				<div class="text">At Coastal Bliss, we believe in holistic wellness and personalized care. Founded by friends Vesna Josic and Milena Stankovic, 
					our mission is to create a serene environment where every guest feels valued from "good morning to goodbye.
					" We offer facials, massages, lash & brow services, waxing, manicures, and pedicures using natural and organic products whenever possible.</div>
				<div class="text">Located at 323C Rehoboth Ave, we opened our doors on June 18, 2025. Whether you’re from the local community or visiting the coast, we invite you to experience true relaxation and rejuvenation.</div>
			</div>
			
			<!-- <div class="author-box">
			<div class="inner d-block d-sm-flex">
				<button type="submit" class="theme-btn btn-style-two btn pricing-btn mb-4 mb-sm-0"><span class="btn-title">Learn More</span></button>
				<figure class="thumb"><img src="images/resource/about1-2.png" alt="Image"></figure>
				<div class="info">
				<div class="sign">
					<img src="images/resource/about-sign1.png" alt="Signature">
				</div>
				<div class="name">Milena - <span class="designation">Founder</span></div>
				</div>
			</div>
			</div> -->
		</div>
		</div>

		<div class="timetable-block col-xl-3 col-lg-6 col-md-6 wow fadeInRight">
		<div class="inner">
			<div class="content-top">
			<figure class="icon"><img src="images/icons/clock1.png" alt="Image"></figure>
			<h4 class="title">Opening Hours</h4>
			</div>
			<div class="content">
	
			<div class="time-box m-0">
				<?php foreach ($open_hours as $day => $hours): ?>
              <li><?= htmlspecialchars($day) ?>: <span class="opening-days"><?= htmlspecialchars($hours) ?></span></li>
            <?php endforeach; ?>
			</div>
			<div class="bg bg-image" style="background-image: url(./images/resource/about1-5.png)"></div>
			</div>
		</div>
		</div>
	</div>
	</div>
</div>
</section>
<!--End About Section -->
 <!-- Gallery Section -->
  <section class="gallery-section">
    <div class="container">
      <h2 class="gallery-title">Our Space in Photos</h2>
      <div class="row g-3">
        <!-- Repeat this block for each image -->
        <div class="col-6 col-md-4 gallery-item">
          <a href="images/gallery1.jpg" class="glightbox" data-gallery="spa-gallery">
            <img src="images/gallery1.jpg" alt="Cozy manicure station" class="img-fluid">
            <div class="overlay"><i class="fa fa-eye"></i></div>
          </a>
        </div>
        <div class="col-6 col-md-4 gallery-item">
          <a href="images/gallery2.jpg" class="glightbox" data-gallery="spa-gallery">
            <img src="images/gallery2.jpg" alt="Tranquil treatment room" class="img-fluid">
            <div class="overlay"><i class="fa fa-eye"></i></div>
          </a>
        </div>
        <div class="col-6 col-md-4 gallery-item">
          <a href="images/gallery7.jpg" class="glightbox" data-gallery="spa-gallery">
            <img src="images/gallery7.jpg" alt="Reception area" class="img-fluid">
            <div class="overlay"><i class="fa fa-eye"></i></div>
          </a>
        </div>
        <div class="col-6 col-md-4 gallery-item">
          <a href="images/gallery4.jpg" class="glightbox" data-gallery="spa-gallery">
            <img src="images/gallery4.jpg" alt="Natural products display" class="img-fluid">
            <div class="overlay"><i class="fa fa-eye"></i></div>
          </a>
        </div>
        <div class="col-6 col-md-4 gallery-item">
          <a href="images/gallery5.jpg" class="glightbox" data-gallery="spa-gallery">
            <img src="images/gallery5.jpg" alt="Co-founders Vesna & Milena" class="img-fluid">
            <div class="overlay"><i class="fa fa-eye"></i></div>
          </a>
        </div>
        <div class="col-6 col-md-4 gallery-item">
          <a href="images/gallery6.jpg" class="glightbox" data-gallery="spa-gallery">
            <img src="images/gallery6.jpg" alt="Coastal decor detail" class="img-fluid">
            <div class="overlay"><i class="fa fa-eye"></i></div>
          </a>
        </div>
      </div>
    </div>
  </section>

<!-- Gallery Section -->
<section class="gallery-section pt-100">
  <div class="outer-box">
    <div class="row g-3">
      <!-- Big Image Left -->
      <div class="col-lg-6">
        <div class="gallery-block h-100">
          <div class="inner-box h-100">
            <div class="image-box h-100">
              <figure class="image m-0 h-100" style="height:100%;">
                <a class="lightbox-image" href="images/gallery1.jpg">
                  <img src="images/gallery1.jpg" alt="Image" class="img-fluid w-100 h-100 object-fit-cover" style="min-height:300px;">
                </a>
              </figure>
              <a class="icon" href="images/gallery1.jpg"><i class="fa-sharp fa-light fa-eye"></i></a>
            </div>
          </div>
        </div>
      </div>
      <!-- Four Small Images Right -->
      <div class="col-lg-6">
        <div class="row g-3">
          <div class="col-6">
            <div class="gallery-block">
              <div class="inner-box">
                <div class="image-box">
                  <figure class="image m-0">
                    <a class="lightbox-image" href="images/gallery2.jpg">
                      <img src="images/gallery2.jpg" alt="Image" class="img-fluid w-100 object-fit-cover" style="min-height:140px;">
                    </a>
                  </figure>
                  <a class="icon" href="page-about.php"><i class="fa-sharp fa-light fa-eye"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="gallery-block">
              <div class="inner-box">
                <div class="image-box">
                  <figure class="image m-0">
                    <a class="lightbox-image" href="images/gallery4.jpg">
                      <img src="images/gallery4.jpg" alt="Image" class="img-fluid w-100 object-fit-cover" style="min-height:140px;">
                    </a>
                  </figure>
                  <a class="icon" href="page-about.php"><i class="fa-sharp fa-light fa-eye"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="gallery-block">
              <div class="inner-box">
                <div class="image-box">
                  <figure class="image m-0">
                    <a class="lightbox-image" href="images/gallery5.jpg">
                      <img src="images/gallery5.jpg" alt="Image" class="img-fluid w-100 object-fit-cover" style="min-height:140px;">
                    </a>
                  </figure>
                  <a class="icon" href="page-about.php"><i class="fa-sharp fa-light fa-eye"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="gallery-block">
              <div class="inner-box">
                <div class="image-box">
                  <figure class="image m-0">
                    <a class="lightbox-image" href="images/gallery6.jpg">
                      <img src="images/gallery6.jpg" alt="Image" class="img-fluid w-100 object-fit-cover" style="min-height:140px;">
                    </a>
                  </figure>
                  <a class="icon" href="page-about.php"><i class="fa-sharp fa-light fa-eye"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Gallery Section -->
<!-- Client Section -->
<section class="clients-section">
<div class="auto-container">
	<div class="carousel-outer">
	<div class="clients-carousel owl-carousel owl-theme custom-navs-two">
		<!-- client block -->
		<div class="client-block">
		<div class="inner-box">
			<div class="image-box">
			<figure class="image"><a href="#"><img src="images/resource/client1-1.png" alt="Image"></a></figure>
			</div>
		</div>
		</div>
		<!-- client block -->
		<div class="client-block">
		<div class="inner-box">
			<div class="image-box">
			<figure class="image"><a href="#"><img src="images/resource/client1-2.png" alt="Image"></a></figure>
			</div>
		</div>
		</div>
		<!-- client block -->
		<div class="client-block">
		<div class="inner-box">
			<div class="image-box">
			<figure class="image"><a href="#"><img src="images/resource/client1-3.png" alt="Image"></a></figure>
			</div>
		</div>
		</div>
		<!-- client block -->
		<div class="client-block">
		<div class="inner-box">
			<div class="image-box">
			<figure class="image"><a href="#"><img src="images/resource/client1-4.png" alt="Image"></a></figure>
			</div>
		</div>
		</div>
		<!-- client block -->
		<div class="client-block">
		<div class="inner-box">
			<div class="image-box">
			<figure class="image"><a href="#"><img src="images/resource/client1-5.png" alt="Image"></a></figure>
			</div>
		</div>
		</div>
		<!-- client block -->
		<div class="client-block">
		<div class="inner-box">
			<div class="image-box">
			<figure class="image"><a href="#"><img src="images/resource/client1-2.png" alt="Image"></a></figure>
			</div>
		</div>
		</div>
		<!-- client block -->
		<div class="client-block">
		<div class="inner-box">
			<div class="image-box">
			<figure class="image"><a href="#"><img src="images/resource/client1-3.png" alt="Image"></a></figure>
			</div>
		</div>
		</div>
	</div>
	</div>
</div>
</section>
<!-- End Client Section -->

<!-- Video Section -->
<section class="video-section">
<div class="bg bg-image" style="background-image: url(./images/background/bg-video1.jpg);"></div>
<div class="auto-container">
	<div class="row">
	<div class="col-lg-6">
		<div class="sec-title mb-0">
		<h2 class="words-slide-up text-split">Book & feel our Incredible <br> Spa Experience</h2>
		<button type="submit" class="theme-btn btn-style-two btn pricing-btn"><span class="btn-title">Make Appointment</span></button>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="outer-box">
		<h4>Watch Now</h4>
		<a href="https://www.youtube.com/watch?v=Fvae8nxzVz4" class="play-now" data-fancybox="gallery" data-caption="">
			<i class="icon fas fa-play" aria-hidden="true"></i>
			<span class="ripple"></span>
		</a>
		</div>
	</div>
	</div>
</div>
</section>
<!-- End Video Section -->

<!-- Pricing Section -->
<!-- <section class="pricing-section">
<div class="leaf1 bounce-x"></div>
<div class="leaf2 bounce-x"></div>
<div class="auto-container">
	<div class="sec-title text-center">
	<figure class="image"><img src="images/icons/icon1.png" alt="Image"></figure>
	<span class="sub-title">Price</span>
	<h2 class="words-slide-up text-split">Spa Treatments With <br> Pricing</h2>
	</div>
	<div class="row align-items-center">
	<div class="content-column col-lg-4">

		<div class="pricing-block">
		<div class="inner-box">
			<div class="image-box">                                        
			<figure class="image overlay-anim mb-0">
				<a href="page-pricing.php"><img src="images/resource/price1-2.jpg" alt="Image"></a>
			</figure>
			</div>
			<div class="content-box">
			<div class="inner">
				<h5 class="title"><a href="page-pricing.php">Manicure</a></h5>
				<div class="text">20mins revitalize facial</div>
			</div>
			<span class="price">$30</span>
			</div>
		</div>
		</div>

		<div class="pricing-block">
		<div class="inner-box">
			<div class="image-box">                                        
			<figure class="image overlay-anim mb-0"><a href="page-pricing.php"><img src="images/resource/price1-3.jpg" alt="Image"></a></figure>
			</div>
			<div class="content-box">
			<div class="inner">
				<h5 class="title"><a href="page-pricing.php">Face facial</a></h5>
				<div class="text">20mins revitalize facial</div>
			</div>
			<span class="price">$40</span>
			</div>
		</div>
		</div>

		<div class="pricing-block">
		<div class="inner-box">
			<div class="image-box">                                        
			<figure class="image overlay-anim mb-0"><a href="page-pricing.php"><img src="images/resource/price1-4.jpg" alt="Image"></a></figure>
			</div>
			<div class="content-box">
			<div class="inner">
				<h5 class="title"><a href="page-pricing.php">Makeup & Massage</a></h5>
				<div class="text">20mins revitalize facial</div>
			</div>
			<span class="price">$50</span>
			</div>
		</div>
		</div>
	</div>
	<div class="image-column col-lg-4">
		<div class="inner-box">
		<div class="bg bg-image bounce-y" style="background-image: url(./images/resource/flower1.png);"></div>
		<figure class="image overlay-anim mb-0">
			<img src="images/resource/price1-1.png" alt="Image">
		</figure>
		</div>
	</div>
	<div class="content-column col-lg-4">

		<div class="pricing-block">
		<div class="inner-box">
			<div class="image-box">                                        
			<figure class="image overlay-anim mb-0">
				<a href="page-pricing.php"><img src="images/resource/price1-2.jpg" alt="Image"></a>
			</figure>
			</div>
			<div class="content-box">
			<div class="inner">
				<h5 class="title"><a href="page-pricing.php">Manicure</a></h5>
				<div class="text">20mins revitalize facial</div>
			</div>
			<span class="price">$30</span>
			</div>
		</div>
		</div>

		<div class="pricing-block">
		<div class="inner-box">
			<div class="image-box">                                        
			<figure class="image overlay-anim mb-0"><a href="page-pricing.php"><img src="images/resource/price1-3.jpg" alt="Image"></a></figure>
			</div>
			<div class="content-box">
			<div class="inner">
				<h5 class="title"><a href="page-pricing.php">Face facial</a></h5>
				<div class="text">20mins revitalize facial</div>
			</div>
			<span class="price">$40</span>
			</div>
		</div>
		</div>

		<div class="pricing-block">
		<div class="inner-box">
			<div class="image-box">                                        
			<figure class="image overlay-anim mb-0"><a href="page-pricing.php"><img src="images/resource/price1-4.jpg" alt="Image"></a></figure>
			</div>
			<div class="content-box">
			<div class="inner">
				<h5 class="title"><a href="page-pricing.php">Makeup & Massage</a></h5>
				<div class="text">20mins revitalize facial</div>
			</div>
			<span class="price">$50</span>
			</div>
		</div>
		</div>
	</div>
	</div>
</div>
</section> -->
<!-- End Pricing Section -->

<!-- Contact Section -->
<section class="contact-section">
<div class="bg bg-image" style="background-image: url(./images/background/bg-contact1-1.jpg)"></div>
<div class="bg bg-image curved-shape-top" style="background-image: url(./images/resource/curved-shape-top.png)"></div>
<div class="bg bg-image curved-shape-bottom" style="background-image: url(./images/resource/curved-shape-bottom.png)"></div>
<div class="auto-container">
	<div class="outer-box">
	<div class="row">
		<!-- Form Column -->
		<div class="form-column offset-xl-7 col-xl-5 offset-lg-6 col-lg-6 offset-md-4 col-md-8">
		<div class="inner-column">
			<!-- Contact Form -->
			<div class="contact-form">
			<div class="sec-title">
				<figure class="image"><img src="images/icons/icon1.png" alt="Image"></figure>
				<span class="sub-title">Appointment</span>
				<h3 class="words-slide-up text-split">Book Now</h3>
				<div class="text">Proin efficitur, mauris vel condimentum pulvinar, velit <br> orci consectetur ligula.</div>
			</div>
			<!--Contact Form-->
			<form id="contact_form" name="contact_form" class="" action="includes/sendmail.php" method="post">
				<div class="row">
				<div class="form-group col-lg-6 col-md-6">
					<input type="text" name="form_name" placeholder="Name *" required>
				</div>
				<div class="form-group col-lg-6 col-md-6">
					<input type="email" name="form_email" placeholder="Email Address *" required>
				</div>
				<div class="form-group col-lg-6 col-md-6">
					<input type="select" name="form_subject" placeholder="Select Service *" required>
				</div>
				<div class="form-group col-lg-6 col-md-6">
					<input type="date" name="date" placeholder="Select Date *" required>
				</div>
				<div class="form-group col-lg-12">
					<textarea name="form_textarea" placeholder="Write a Message" rows="2"></textarea>
				</div>
				<div class="form-group col-lg-12">
							<input name="form_botcheck" class="form-control" type="hidden" value="" />
							<button type="submit" class="theme-btn btn-style-one mb-3 mb-sm-0" data-loading-text="Please wait..."><span class="btn-title">Book Now</span></button>
				</div>
				</div>
			</form>
			</div>
			<!--End Contact Form -->
		</div>
		</div>
	</div>
	</div>
</div>
</section>
<!-- End Contact Section -->

<!-- Testimonial Section -->
<section class="testimonial-section">
<div class="testimonial-pattrn1-1 bounce-y"></div>
<div class="auto-container">
	<div class="sec-title text-center">
	<figure class="image"><img src="images/icons/icon1.png" alt="Image"></figure>
	<span class="sub-title">Testimonial</span>
	<h2 class="words-slide-up text-split">What they say?</h2>
	</div>
	<div class="carousel-outer col-lg-8 offset-lg-2">
	<div class="testimonial-carousel-three owl-carousel owl-theme default-dots">

		<!-- Testimonial Block -->
		<div class="testimonial-block">
		<div class="inner-box text-center">
			<div class="rating">
			<i class="icon fa fa-star"></i>
			<i class="icon fa fa-star"></i>
			<i class="icon fa fa-star"></i>
			<i class="icon fa fa-star"></i>
			<i class="icon fa fa-star"></i>
			</div>
			<div class="text">“  Suspendisse sit amet neque euismod, convallis quam eget, dignissim massa. Aliquam blandit risus purus, in congue nunc venenatis id. Pellentesque habitant morbi tristique senectus ”</div>
			<div class="info-box">
			<h4 class="name">Robert Fox -</h4>
			<span class="designation">Co Founder</span>
			</div>
		</div>
		</div>

		<!-- Testimonial Block -->
		<div class="testimonial-block">
		<div class="inner-box text-center">
			<div class="rating">
			<i class="icon fa fa-star"></i>
			<i class="icon fa fa-star"></i>
			<i class="icon fa fa-star"></i>
			<i class="icon fa fa-star"></i>
			<i class="icon fa fa-star"></i>
			</div>
			<div class="text">“  Suspendisse sit amet neque euismod, convallis quam eget, dignissim massa. Aliquam blandit risus purus, in congue nunc venenatis id. Pellentesque habitant morbi tristique senectus ”</div>
			<div class="info-box">
			<h4 class="name">Robert Fox -</h4>
			<span class="designation">Co Founder</span>
			</div>
		</div>
		</div>

		<!-- Testimonial Block -->
		<div class="testimonial-block">
		<div class="inner-box text-center">
			<div class="rating">
			<i class="icon fa fa-star"></i>
			<i class="icon fa fa-star"></i>
			<i class="icon fa fa-star"></i>
			<i class="icon fa fa-star"></i>
			<i class="icon fa fa-star"></i>
			</div>
			<div class="text">“  Suspendisse sit amet neque euismod, convallis quam eget, dignissim massa. Aliquam blandit risus purus, in congue nunc venenatis id. Pellentesque habitant morbi tristique senectus ”</div>
			<div class="info-box">
			<h4 class="name">Robert Fox -</h4>
			<span class="designation">Co Founder</span>
			</div>
		</div>
		</div>
	</div>
	<div class="image-box">
		<figure class="image client1 bounce-x overlay-anim">
		<a href="#"><img src="images/resource/client1.png" alt="Image"></a>
		</figure>
		<figure class="image client2 bounce-y overlay-anim">
		<a href="#"><img src="images/resource/client2.png" alt="Image"></a>
		</figure>
		<figure class="image client3 bounce-x overlay-anim">
		<a href="#"><img src="images/resource/client3.png" alt="Image"></a>
		</figure>
		<figure class="image client4 bounce-x overlay-anim">
		<a href="#"><img src="images/resource/client4.png" alt="Image"></a>
		</figure>
		<figure class="image client5 bounce-y overlay-anim">
		<a href="#"><img src="images/resource/client5.png" alt="Image"></a>
		</figure>
	</div>
	</div>
</div>
</section>
<!-- End Testimonial Section -->

<?php require_once('parts/footer/footer.php'); ?>
