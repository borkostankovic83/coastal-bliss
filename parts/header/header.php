<?php require_once('parts/header/head.php'); ?>
<div class="page-wrapper">

    <?php require_once('parts/preloader.php'); ?>

    <!-- Main Header-->
    <header class="main-header header-style-one" id="home">
        <div class="outer-box">
            <!-- Header Top -->
            <div class="header-top">
                <div class="inner-container">
                    <div class="top-left">
                        <!-- Info List -->
                        <ul class="list-style-one">
                            <li><a href="mailto:info@coastalblissrehoboth.com">info@coastalblissrehoboth.com</a></li>
                        </ul>
                    </div>

                    <div class="top-right">
                        <ul class="list-style-two">
                            <li>Mon to Sat: 9:00am – 8:00pm Sun: <a class="active" href="#">Closed</a></li>
                        </ul>
                        <ul class="social-icon-one">
                            <li>
                                <a href="#"><span class="icon fab fa-twitter"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="icon fab fa-facebook-f"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="icon fab fa-pinterest-p"></span></a>
                            </li>
                            <li>
                                <a href="#"><span class="icon fab fa-vimeo-v"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Header Top -->

            <div class="header-lower">
                <!-- Main box -->
                <div class="main-box">
                    <div class="logo-box">
                        <div class="logo">
							<?php
								$default_logo_url = "images/COASTAL BLISS WELLNESS.png";
								if(isset($dark_logo_url)&&!empty($dark_logo_url)) {
									$default_logo_url = $dark_logo_url;
								}
							?>
                            <a href="index.php" title="">
                            <img src="<?php echo $default_logo_url;?>" alt="Logo" title="" style="transform: scale(1.4);">
                            </a>
                        </div>
                    </div>

                    <!--Nav Box-->
                    <div class="nav-outer">
                        <nav class="nav main-menu">
							<?php
								$default_menu_file = "parts/header/menu.php";
								if(isset($single_menu_file)&&!empty($single_menu_file)) {
									$default_menu_file = $single_menu_file;
								}
							?>
							<?php require_once($default_menu_file); ?>
                        </nav>
                    </div>

                    <!-- Outer Box -->
                    <div class="outer-box">
                        <!-- Mobile Nav toggler -->
                        <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            <nav class="menu-box">
                <div class="upper-box">
                    <div class="nav-logo">
                        <a href="index.php"><img src="images/COASTAL BLISS WELLNESS DARK.png" alt="" style="transform: scale(1.6);"/></a>
                    </div>
                    <div class="close-btn"><i class="icon fa fa-times"></i></div>
                </div>
                <ul class="navigation clearfix">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </ul>
                <ul class="contact-list-one">
                    <li>
                        <i class="icon lnr-icon-envelope1"></i>
                        <span class="title">Send Email</span>
                        <div class="text"><a href="mailto:info@coastalblissrehoboth.com">info@coastalblissrehoboth.com</a></div>
                    </li>
                </ul>
                <ul class="social-links">
                    <li>
                        <a href="#"><i class="icon fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon fab fa-pinterest-p"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="icon fab fa-vimeo-v"></i></a>
                    </li>
                </ul>
            </nav>
        </div>
        <!-- End Mobile Menu -->

        <!-- Header Search -->
        <div class="search-popup">
            <span class="search-back-drop"></span>
            <button class="close-search"><span class="fa fa-times"></span></button>

            <div class="search-inner">
                <form method="post" action="index.php">
                    <div class="form-group">
                        <input type="search" name="search-field" value="" placeholder="Search..." required="" />
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Header Search -->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container">
                <div class="inner-container">
                    <!--Logo-->
                    <div class="logo">
						<?php
							$default_sticky_logo_url = "images/COASTAL BLISS WELLNESS.png";
							if(isset($sticky_logo_url)&&!empty($sticky_logo_url)) {
								$default_sticky_logo_url = $sticky_logo_url;
							}
						?>
						<a href="index.php" title=""><img src="<?php echo $default_sticky_logo_url;?>" alt="" title="" style="transform: scale(1.6);"></a>
                    </div>

                    <!--Right Col-->
                    <div class="nav-outer">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-collapse show collapse clearfix">
                                <ul class="navigation clearfix">
                                    <!--Keep This Empty / Menu will come through Javascript-->
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->

                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Sticky Menu -->
    </header>
    <!--End Main Header -->