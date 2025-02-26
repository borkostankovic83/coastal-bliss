<?php 
    $head_title="Purerelax | Spa & Beauty PHP Template | Shop Page";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
	$page_title = "Shop Page";
	require_once('parts/page-title.php');
?>

<!-- Featured Products -->
<section class="featured-products">
	<div class="auto-container">

		<!--MixitUp Galery-->
		<div class="mixitup-gallery">
			<!--Filter-->
			<div class="filters clearfix">
				<ul class="filter-tabs filter-btns clearfix">
					<li class="active filter" data-role="button" data-filter="all">All</li>
					<li class="filter" data-role="button" data-filter=".dairy">Lotion</li>
					<li class="filter" data-role="button" data-filter=".pantry">Oil</li>
					<li class="filter" data-role="button" data-filter=".meat">Message</li>
					<li class="filter" data-role="button" data-filter=".fruit">Facial</li>
					<li class="filter" data-role="button" data-filter=".vagetables">Cream</li>
				</ul>
			</div>

			<div class="filter-list row">
				<!--Product Block-->
				<div class="product-block home-style all mix pantry fruit col-lg-3 col-md-6 col-sm-12">
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

				<!--Product Block-->
				<div class="product-block home-style all mix dairy meat fruit col-lg-3 col-md-6 col-sm-12">
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

				<!--Product Block-->
				<div class="product-block home-style all mix pantry fruit vagetables col-lg-3 col-md-6 col-sm-12">
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

				<!--Product Block-->
				<div class="product-block home-style all mix dairy meat vagetables col-lg-3 col-md-6 col-sm-12">
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

				<!--Product Block-->
				<div class="product-block home-style all mix pantry meat fruit col-lg-3 col-md-6 col-sm-12">
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

				<!--Product Block-->
				<div class="product-block home-style all mix dairy pantry col-lg-3 col-md-6 col-sm-12">
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

				<!--Product Block-->
				<div class="product-block home-style all mix fruit vagetables col-lg-3 col-md-6 col-sm-12">
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

				<!--Product Block-->
				<div class="product-block home-style all mix dairy pantry meat vagetables col-lg-3 col-md-6 col-sm-12">
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
			</div>
		</div>
	</div>
</section>
<!-- End Featured Products -->

<?php require_once('parts/footer/footer3.php'); ?>