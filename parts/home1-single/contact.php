<section class="contact-section" id="contact">
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