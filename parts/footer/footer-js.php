<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

<script src="js/jquery.js"></script> 
<script src="js/popper.min.js"></script>

<?php if(isset($include_revslider_css_js)&&!empty($include_revslider_css_js)) {?>
<!--Revolution Slider-->
<script src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="js/main-slider-script.js"></script>
<!--Revolution Slider-->
<?php }?>

<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.fancybox.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/mixitup.js"></script>
<script src="js/bxslider.js"></script>
<script src="js/gsap.min.js"></script>
<script src="js/ScrollTrigger.min.js"></script>
<script src="js/splitType.js"></script>
<script src="js/wow.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/appear.js"></script>
<script src="js/knob.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/owl.js"></script>
<script src="js/script.js"></script>
<!-- form submit -->
<script src="js/jquery.validate.min.js"></script>
<script src="js/jquery.form.min.js"></script>
<script>
(function($) {
$("#contact_form").validate({
  submitHandler: function(form) {
	var form_btn = $(form).find('button[type="submit"]');
	var form_result_div = '#form-result';
	$(form_result_div).remove();
	form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
	var form_btn_old_msg = form_btn.php();
	form_btn.php(form_btn.prop('disabled', true).data("loading-text"));
	$(form).ajaxSubmit({
	  dataType:  'json',
	  success: function(data) {
		if( data.status == 'true' ) {
		  $(form).find('.form-control').val('');
		}
		form_btn.prop('disabled', false).php(form_btn_old_msg);
		$(form_result_div).php(data.message).fadeIn('slow');
		setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
	  }
	});
  }
});
})(jQuery);
</script>

<script>
	// Testinomials Carousel
	var swiper2 = new Swiper(".testimonial-thumbs", {
	slidesPerView: 3,
	spaceBetween: 0,
	loop: true,
	watchSlidesProgress: true,
	autoplay: {
	delay: 2000,
	disableOnInteraction: false,
	},
	slideToClickedSlide: true,
	thumbs: {
	swiper: swiper,
	},
	});
	var swiper = new Swiper(".testimonial-slider-home4", {
	slidesPerView: 1,
	spaceBetween: 0,
	freeMode: true,
	watchSlidesProgress: true,
	slideToClickedSlide: true,
	loop: true,
	autoplay: {
	delay: 2000,
	disableOnInteraction: false,
	},
	navigation: true,
	});
</script>