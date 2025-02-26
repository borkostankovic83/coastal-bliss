<?php 
    $head_title="Purerelax | Spa & Beauty PHP Template | Product Details";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
	$page_title = "Product Details";
	require_once('parts/page-title.php');
?>

<!--Product Details Start-->
<section class="product-details pt-120">
	<div class="container pb-70">
		<div class="row">
			<div class="col-lg-6 col-xl-6">
				<div class="bxslider">
					<div class="slider-content">
						<figure class="image-box"><a href="images/resource/products/product-details.jpg" class="lightbox-image" data-fancybox="gallery"><img src="images/resource/products/product-details.jpg" alt=""></a></figure>
						<div class="slider-pager">
							<ul class="thumb-box">
								<li><a class="active" data-slide-index="0" href="#"><figure><img src="images/resource/products/product-details.jpg" alt=""></figure></a></li>
								<li><a data-slide-index="1" href="#"><figure><img src="images/resource/products/product-details2.jpg" alt=""></figure></a></li>
								<li><a data-slide-index="2" href="#"><figure><img src="images/resource/products/product-details3.jpg" alt=""></figure></a></li>
							</ul>
						</div>
					</div>
					<div class="slider-content">
						<figure class="image-box"><a href="images/resource/products/product-details2.jpg" class="lightbox-image" data-fancybox="gallery"><img src="images/resource/products/product-details2.jpg" alt=""></a></figure>
						<div class="slider-pager">
							<ul class="thumb-box">
								<li><a class="active" data-slide-index="0" href="#"><figure><img src="images/resource/products/product-details.jpg" alt=""></figure></a></li>
								<li><a data-slide-index="1" href="#"><figure><img src="images/resource/products/product-details2.jpg" alt=""></figure></a></li>
								<li><a data-slide-index="2" href="#"><figure><img src="images/resource/products/product-details3.jpg" alt=""></figure></a></li>
							</ul>
						</div>
					</div>
					<div class="slider-content">
						<figure class="image-box"><a href="images/resource/products/product-details3.jpg" class="lightbox-image" data-fancybox="gallery"><img src="images/resource/products/product-details3.jpg" alt=""></a></figure>
						<div class="slider-pager">
							<ul class="thumb-box">
								<li> <a class="active" data-slide-index="0" href="#"><figure><img src="images/resource/products/product-details.jpg" alt=""></figure></a></li>
								<li> <a data-slide-index="1" href="#"><figure><img src="images/resource/products/product-details2.jpg" alt=""></figure></a></li>
								<li> <a data-slide-index="2" href="#"><figure><img src="images/resource/products/product-details3.jpg" alt=""></figure></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-xl-6 product-info">
				<div class="product-details__top">
					<h3 class="product-details__title">Backpack <span>$76.00</span> </h3>
				</div>
				<div class="product-details__reveiw">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<span>2 Customer Reviews</span>
				</div>
				<div class="product-details__content">
					<p class="product-details__content-text1">Aliquam hendrerit a augue insuscipit. Etiam
						aliquam massa quis des mauris commodo venenatis ligula commodo leez sed blandit
						convallis dignissim onec vel pellentesque neque.</p>
					<p class="product-details__content-text2"><strong>REF.</strong> 4231/406 <br>
						Available in store</p>
				</div>

				<div class="product-details__quantity">
					<h3 class="product-details__quantity-title">Choose quantity</h3>
					<div class="quantity-box">
						<button type="button" class="sub text-white"><i class="fa fa-minus"></i></button>
						<input type="number" id="1" value="1" />
						<button type="button" class="add text-white"><i class="fa fa-plus"></i></button>
					</div>
				</div>


				<div class="product-details__buttons">
					<div class="product-details__buttons-1">
						<a href="shop-cart.php" class="theme-btn btn-style-one"><span class="btn-title">Add to Cart</span></a>
					</div>
					<div class="product-details__buttons-2">
						<a href="shop-product-details.php" class="theme-btn btn-style-one"><span class="btn-title">Add to Wishlist</span></a>
					</div>
				</div>
				<div class="product-details__social">
					<div class="title mt-10">
						<h3>Share with friends</h3>
					</div>
		<ul class="social-icon-one product-share">
			<li><a href="#"><i class="fab fa-twitter"></i></a></li>
			<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
			<li><a href="#"><i class="fab fa-pinterest"></i></a></li>
			<li><a href="#"><i class="fab fa-instagram"></i></a></li>
		</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<!--Product Details End-->

<!--Product Description Start-->
<section class="product-description">
	<div class="container pt-0 pb-90">
		<div class="product-discription">
			<div class="tabs-box">
				<div class="tab-btn-box text-center">
					<ul class="tab-btns tab-buttons clearfix">
						<li class="tab-btn active-btn" data-tab="#tab-1">Description</li>
						<li class="tab-btn" data-tab="#tab-2">Reviews</li>
					</ul>
				</div>
				<div class="tabs-content">
					<div class="tab active-tab" id="tab-1">
						<div class="text">
							<h3 class="product-description__title">Description</h3>
							<p class="product-description__text1">Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci
								phaedrum. There are many variations of passages of Lorem Ipsum available, but the majority have
								alteration in some injected or words which don't look even slightly believable. If you are going to
								use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrang hidden in the
								middle of text.
							</p>
							<div class="product-description__list">
								<ul class="list-unstyled">
									<li>
										<p><span class="fa fa-arrow-right"></span> Nam at elit nec neque suscipit gravida.</p>
									</li>
									<li>
										<p><span class="fa fa-arrow-right"></span> Aenean egestas orci eu maximus tincidunt.</p>
									</li>
									<li>
										<p><span class="fa fa-arrow-right"></span> Curabitur vel turpis id tellus cursus laoreet.
										</p>
									</li>
								</ul>
							</div>
							<p class="product-description__tex2">All the Lorem Ipsum generators on the Internet tend to repeat
								predefined chunks as necessary, making this the first true generator on the Internet. It uses a
								dictionary of over 200 Latin words, combined with a handful of model sentence structures, to
								generate Lorem Ipsum which looks reasonable.
							</p>
						</div>
					</div>
					<div class="tab" id="tab-2">
						<div class="customer-comment">
							<div class="row clearfix">
								<div class="col-lg-6 col-md-6 col-sm-12 comment-column">
									<div class="single-comment-box">
										<div class="inner-box">
											<figure class="comment-thumb"><img src="images/resource/testi-2.jpg" alt=""></figure>
											<div class="inner">
												<ul class="rating clearfix">
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
												</ul>
												<h5>Jon D. William, <span>10 Jan, 2023 . 4:00 pm</span></h5>
												<p>Aliquam hendrerit a augue insuscipit. Etiam aliquam massa quis des mauris commodo.</p>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-12 comment-column">
									<div class="single-comment-box">
										<div class="inner-box">
											<figure class="comment-thumb"><img src="images/resource/testi-1.jpg" alt=""></figure>
											<div class="inner">
												<ul class="rating clearfix">
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
													<li><i class="fas fa-star"></i></li>
												</ul>
												<h5>Aleesha Brown, <span>12 Feb, 2023 . 8:00 pm</span></h5>
												<p>Aliquam hendrerit a augue insuscipit. Etiam aliquam massa quis des mauris commodo.</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="comment-box">
							<h3>Add Your Comments</h3>
							<form id="contact_form" name="contact_form" class="" action="includes/sendmail.php" method="post">
								<div class="mb-3">
									<textarea name="form_message" class="form-control required" rows="7" placeholder="Enter Message"></textarea>
								</div>
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
								<div class="col-lg-12 col-md-12 col-sm-12 column">
									<div class="review-box clearfix">
										<p>Your Review</p>
										<ul class="rating clearfix">
											<li><i class="far fa-star"></i></li>
											<li><i class="far fa-star"></i></li>
											<li><i class="far fa-star"></i></li>
											<li><i class="far fa-star"></i></li>
											<li><i class="far fa-star"></i></li>
										</ul>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 column">
									<div class="form-group clearfix">
										<div class="custom-controls-stacked">
											<label class="custom-control material-checkbox">
												<input type="checkbox" class="material-control-input">
												<span class="material-control-indicator"></span>
												<span class="description">Save my name, email, and website in this browser for the next time I comment.</span>
											</label>
										</div>
									</div>
								</div>
								<div class="mb-3">
									<input name="form_botcheck" class="form-control" type="hidden" value="" />
									<button type="submit" class="theme-btn btn-style-one" data-loading-text="Please wait..."><span class="btn-title">Submit Comment</span></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--Product Description End-->

<section class="related-product">
	<div class="container pt-0 pb-90">
		<h3>Related Products</h3>
		<div class="row">
			<div class="product-block home-style col-lg-3 col-md-6 col-sm-6">
				<div class="inner-box">
					<div class="image-box">
						<div class="inner">
							<figure class="image mb-0"><a href="shop-product-details.php"><img src="images/resource/product1-1.jpg" alt="Image"></a></figure>
							<div class="icon-box">
								<a class="icon" href="shop-cart.php" class="ui-btn add-to-cart">
									<i class="fa-sharp fa-light fa-cart-shopping"></i>
								</a>
								<a class="icon" href="shop-product-details.php" class="ui-btn like-btn">
									<i class="fa-light fa-heart"></i>
								</a>
								<a class="icon" href="shop-cart.php" class="ui-btn add-to-cart">
									<i class="fa-light fa-arrows-rotate"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="content-box">
						<div class="inner">
							<span class="price">70$.00 - 90$.00</span>
							<h4 class="title"><a href="shop-product-details.php">Glow Facial Cream</a></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="product-block home-style col-lg-3 col-md-6 col-sm-6">
				<div class="inner-box">
					<div class="image-box">
						<div class="inner">
							<figure class="image mb-0"><a href="shop-product-details.php"><img src="images/resource/product1-2.jpg" alt="Image"></a></figure>
							<div class="icon-box">
								<a class="icon" href="shop-cart.php" class="ui-btn add-to-cart">
									<i class="fa-sharp fa-light fa-cart-shopping"></i>
								</a>
								<a class="icon" href="shop-product-details.php" class="ui-btn like-btn">
									<i class="fa-light fa-heart"></i>
								</a>
								<a class="icon" href="shop-cart.php" class="ui-btn add-to-cart">
									<i class="fa-light fa-arrows-rotate"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="content-box">
						<div class="inner">
							<span class="price"> <span class="price-style"> 90$.00</span> - 70$.00</span>
							<h4 class="title"><a href="shop-product-details.php">Hair Treatment</a></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="product-block home-style col-lg-3 col-md-6 col-sm-6">
				<div class="inner-box">
					<div class="image-box">
						<div class="inner">
							<figure class="image mb-0"><a href="shop-product-details.php"><img src="images/resource/product1-3.jpg" alt="Image"></a></figure>
							<div class="icon-box">
								<a class="icon" href="shop-cart.php" class="ui-btn add-to-cart">
									<i class="fa-sharp fa-regular fa-cart-shopping"></i>
								</a>
								<a class="icon" href="shop-product-details.php" class="ui-btn like-btn">
									<i class="fa-light fa-heart"></i>
								</a>
								<a class="icon" href="shop-cart.php" class="ui-btn add-to-cart">
									<i class="fa-light fa-arrows-rotate"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="content-box">
						<div class="inner">
							<span class="price">70$.00</span>
							<h4 class="title"><a href="shop-product-details.php">Massage Cream</a></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="product-block home-style col-lg-3 col-md-6 col-sm-6">
				<div class="inner-box">
					<div class="image-box">
						<div class="inner">
							<figure class="image mb-0"><a href="shop-product-details.php"><img src="images/resource/product1-4.jpg" alt="Image"></a></figure>
							<div class="icon-box">
								<a class="icon" href="shop-cart.php" class="ui-btn add-to-cart">
									<i class="fa-sharp fa-regular fa-cart-shopping"></i>
								</a>
								<a class="icon" href="shop-product-details.php" class="ui-btn like-btn">
									<i class="fa-light fa-heart"></i>
								</a>
								<a class="icon" href="shop-cart.php" class="ui-btn add-to-cart">
									<i class="fa-light fa-arrows-rotate"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="content-box">
						<div class="inner">
							<span class="price">50$.00</span>
							<h4 class="title"><a href="shop-product-details.php">Body Message Oil</a></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php require_once('parts/footer/footer3.php'); ?>