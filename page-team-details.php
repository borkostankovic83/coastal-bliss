<?php 
    $head_title="Purerelax | Spa & Beauty PHP Template | Team Details";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
	$page_title = "Team Details";
	require_once('parts/page-title.php');
?>

<!--Team Details Start-->
<section class="team-details">
	<div class="container pt-100 pb-100">
		<div class="team-details__top pb-70">
			<div class="row">
				<div class="col-xl-6 col-lg-6">
					<div class="team-details__top-left">
						<div class="team-details__top-img">
			<img src="images/resource/team-details.jpg" alt="">
							<div class="team-details__big-text"></div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6">
					<div class="team-details__top-right">
						<div class="team-details__top-content">
							<h3 class="team-details__top-name">Aleesha Brown</h3>
							<p class="team-details__top-title">Managing Director & CEO</p>
							<p class="team-details__top-text-1">I help my clients stand out and they help me grow.</p>
							<div class="team-details-contact mb-30">
								<h5 class="mb-0">Email Address</h5>
								<div class=""><span>needhelp@yourdomain.com</span></div>
							</div>
							<div class="team-details-contact mb-30">
								<h5 class="mb-0">Phone Number</h5>
								<div class=""><span>+012-3456-789</span></div>
							</div>
							<div class="team-details-contact">
								<h5 class="mb-0">Web Address</h5>
								<div class=""><span>www.yourdomain.com</span></div>
							</div>
							<div class="team-details__social"> <a href="#"><i class="fab fa-twitter"></i></a> <a href="#"><i class="fab fa-facebook"></i></a> <a href="#"><i class="fab fa-pinterest-p"></i></a> <a href="#"><i class="fab fa-instagram"></i></a> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="team-details__bottom pt-100">
			<div class="row">
				<div class="col-xl-6 col-lg-6">
					<div class="team-details__bottom-left">
						<h4 class="team-details__bottom-left-title">Personal Experience</h4>
						<p class="team-details__bottom-left-text">When an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries architecto dolorem ipsum quia</p>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6">
					<div class="team-details__bottom-right">
						<div class="team-details__progress">
							<div class="team-details__progress-single">
								<h4 class="team-details__progress-title">Tecnology</h4>
								<div class="bar">
									<div class="bar-inner count-bar" data-percent="90%">
										<div class="count-text">90%</div>
									</div>
								</div>
							</div>
							<div class="team-details__progress-single">
								<h4 class="team-details__progress-title">Marketing</h4>
								<div class="bar">
									<div class="bar-inner count-bar" data-percent="80%">
										<div class="count-text">80%</div>
									</div>
								</div>
							</div>
							<div class="team-details__progress-single">
								<h4 class="team-details__progress-title">Business</h4>
								<div class="bar marb-0">
									<div class="bar-inner count-bar" data-percent="75%">
										<div class="count-text">75%</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--Team Details End--> 

<!--Contact Details Start-->
<section class="team-contact-form">
	<div class="container pt-100 pb-100">
		<div class="sec-title text-center">
			<span class="sub-title">Contact With Us Now</span>
			<h2 class="section-title__title">Feel Free to Write Our <br> Tecnology Experts</h2>
		</div>
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<!-- Contact Form -->
				<form id="contact_form" name="contact_form" class="" action="includes/sendmail.php" method="post">
					<div class="row">
						<div class="col-sm-6">
							<div class="mb-3">
								<input name="form_name" class="form-control" type="text" placeholder="Enter Name">
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
						<textarea name="form_message" class="form-control required" rows="5" placeholder="Enter Message"></textarea>
					</div>
					<div class="mb-3 text-center">
						<input name="form_botcheck" class="form-control" type="hidden" value="" />
						<button type="submit" class="theme-btn btn-style-one" data-loading-text="Please wait..."><span class="btn-title">Send message</span></button>
						<button type="reset" class="theme-btn btn-style-one"><span class="btn-title">Reset</span></button>
					</div>
				</form>
				<!-- Contact Form Validation-->
			</div>
		</div>
	</div>
</section>
<!--Contact Details End-->

<?php require_once('parts/footer/footer.php'); ?>