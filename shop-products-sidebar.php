<?php 
    $head_title="Purerelax | Spa & Beauty PHP Template | Product Sidebar";
?>

<?php require_once('parts/header/header.php'); ?>

<?php
	$page_title = "Product Sidebar";
	require_once('parts/page-title.php');
?>

<!-- Featured Products -->
<section class="featured-products">
	<div class="auto-container">
		<div class="row clearfix">
			<div class="col-lg-3 col-md-12 col-sm-12">
				<div class="shop-sidebar">
					<div class="sidebar-search">
						<form action="shop-products.php" method="post" class="search-form">
							<div class="form-group">
								<input type="search" name="search-field" placeholder="Search..." required="">
								<button><i class="lnr lnr-icon-search"></i></button>
							</div>
						</form>
					</div>
					<div class="sidebar-widget category-widget">
						<div class="widget-title">
							<h5 class="widget-title">Categories</h5>
						</div>
						<div class="widget-content">
							<ul class="category-list clearfix">
								<li><a href="shop-product-details.php">Cloud Solution</a></li>
								<li><a href="shop-product-details.php">Cyber Data</a></li>
								<li><a href="shop-product-details.php">SEO Marketing</a></li>
								<li><a href="shop-product-details.php">UI/UX Design</a></li>
								<li><a href="shop-product-details.php">Web Development</a></li>
								<li><a href="shop-product-details.php">Artifical Intelligence</a></li>
							</ul>
						</div>
					</div>
					<div class="sidebar-widget price-filters">
						<div class="widget-title">
							<h5 class="widget-title">Filter by Price</h5>
						</div>
						<div class="range-slider clearfix">
							<div class="price-range-slider"></div>
							<div class="clearfix">
								<p>Price:</p>
								<div class="title"></div>
								<div class="input"><input type="text" class="property-amount" name="field-name" readonly></div>
								<input type="submit" value="Filter">
							</div>
						</div>
					</div>
					<div class="sidebar-widget post-widget">
						<div class="widget-title">
							<h5 class="widget-title">Popular Products</h5>
						</div>
						<div class="post-inner">
							<div class="post">
								<figure class="post-thumb"><a href="shop-details.php"><img src="images/resource/products/thumb-1.jpg" alt=""></a></figure>
								<a href="shop-product-details.php">Best Headset</a>
								<span class="price">$45.00</span>
							</div>
							<div class="post">
								<figure class="post-thumb"><a href="shop-details.php"><img src="images/resource/products/thumb-2.jpg" alt=""></a></figure>
								<a href="shop-product-details.php">Quality Battery</a>
								<span class="price">$34.00</span>
							</div>
							<div class="post">
								<figure class="post-thumb"><a href="shop-details.php"><img src="images/resource/products/thumb-3.jpg" alt=""></a></figure>
								<a href="shop-product-details.php">Smart Watch</a>
								<span class="price">$29.00</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-12 col-sm-12 content-side">
				<!--MixitUp Galery-->
				<div class="mixitup-gallery mt-5 mt-lg-0">
					<!--Filter-->
					<div class="filters clearfix">
						<ul class="filter-tabs filter-btns clearfix">
							<li class="active filter" data-role="button" data-filter="all">All</li>
							<li class="filter" data-role="button" data-filter=".dairy">Cyber</li>
							<li class="filter" data-role="button" data-filter=".pantry">Digital</li>
							<li class="filter" data-role="button" data-filter=".meat">Software</li>
							<li class="filter" data-role="button" data-filter=".fruit">Technology</li>
							<li class="filter" data-role="button" data-filter=".vagetables">Development</li>
						</ul>
					</div>

					<div class="filter-list row">
						<!--Product Block-->
						<div class="product-block home-style all mix pantry fruit col-lg-4 col-md-6 col-sm-12">
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
						<div class="product-block home-style all mix dairy meat fruit col-lg-4 col-md-6 col-sm-12">
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
						<div class="product-block home-style all mix pantry fruit vagetables col-lg-4 col-md-6 col-sm-12">
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
						<div class="product-block home-style all mix dairy meat vagetables col-lg-4 col-md-6 col-sm-12">
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
						<div class="product-block home-style all mix pantry meat fruit col-lg-4 col-md-6 col-sm-12">
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
						<div class="product-block home-style all mix dairy pantry col-lg-4 col-md-6 col-sm-12">
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
						<div class="product-block home-style all mix fruit vagetables col-lg-4 col-md-6 col-sm-12">
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
						<div class="product-block home-style all mix dairy pantry meat vagetables col-lg-4 col-md-6 col-sm-12">
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
		</div>
	</div>
</section>
<!-- End Featured Products -->


<?php require_once('parts/footer/footer3.php'); ?>