<?php
use App\Models\CourseCategory;
$categories = CourseCategory::all();

$links = [
    ['link' => '/about', 'name' => __('menu.about')],
    ['link' => '/contact', 'name' => __('menu.contact')],
    ['link' => '/privacy', 'name' => __('menu.privacy')],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>QAMQOR 2022</title>
<!-- Stylesheets -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito">
<link href="/css/bootstrap.min.css" rel="stylesheet">

<link href="/css/style.css" rel="stylesheet">
<link href="/css/responsive.css" rel="stylesheet">
<link href="/css/magnific-popup.css" rel="stylesheet">
<link href="/css/islamedu.css" rel="stylesheet">

<link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon">
<link rel="icon" href="/images/favicon.png" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="js/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
    <div class="page-wrapper">
        <!-- Preloader -->
	<div class="preloader"></div>

    <!-- Main Header-->
    <header class="main-header header-style-one">

        <!-- Main box -->
        <div class="main-box">
            <div class="logo-box">
                <div class="logo"><a href="/"><img style="max-height: 90px;" src="/images/logo.png" alt="" title="Tronis"></a></div>
            </div>

            <!--Nav Box-->
            <div class="nav-outer">
                <?php
                $menu_list = [
                    ['link' => '/', 'name' => __('menu.home')],
                    ['link' => '/about', 'name' => __('menu.about')],
                    ['link' => '/contact', 'name' => __('menu.contact')],
                ]
                ?>

                <nav class="nav main-menu">
                    <ul class="navigation">
                        @foreach($menu_list as $menu)
                        <li>
                            <a href="{{ $menu['link'] }}">{{ $menu['name'] }}</a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
                <!-- Main Menu End-->


                <div class="outer-box">
                    <a href="tel:+77053776288" class="info-btn">
                        <i class="icon fa fa-phone"></i>
                        <small>Звоните сейчас</small><br> +7(705)377 62 88
                    </a>

                    <div class="ui-btn-outer">
                        <button class="ui-btn ui-btn search-btn">
                            <span class="icon lnr lnr-icon-search"></span>
                        </button>
                        @guest
                        <a href="#" class="ui-btn" role="button" id="dropdownLoginLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="lnr-icon-user"></i></a>
                        <ul class="dropdown-menu"  aria-labelledby="dropdownLoginLink">
                            <li><a class="dropdown-item" href="/login">Войти</a></li>
                            <li><a class="dropdown-item" href="/register">Регистрация</a></li>
                        </ul>
                        @else
                        <div class="dropdown">
                            <a href="#" class="ui-btn" role="button" id="dropdownPtofileLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="lnr-icon-user"></i></a>
                            <ul class="dropdown-menu"  aria-labelledby="dropdownPtofileLink">
                                <li>
                                    <a class="dropdown-item" href="/profile">{{ __('menu.profile') }}</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выйти</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        @endguest
                    </div>

                    <a href="#" class="theme-btn btn-style-one"><span class="btn-title">Try For Free</span></a>

                    <!-- Mobile Nav toggler -->
                    <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                </div>
            </div>
        </div>
        <!-- End Main Box -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>

            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            <nav class="menu-box">
                <div class="upper-box">
                    <div class="nav-logo"><a href="/"><img style="max-height: 90px;" src="/images/logo.png" alt="" title=""></a></div>
                    <div class="close-btn"><i class="icon fa fa-times"></i></div>
                </div>

                <ul class="navigation clearfix">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </ul>
                <ul class="contact-list-one">
                    <li>
                        <!-- Contact Info Box -->
                        <div class="contact-info-box">
                            <i class="icon lnr-icon-phone-handset"></i>
                            <span class="title">Звоните сейчас</span>
                            <a href="tel:+77053776288">+7(705) 377 62 88</a>
                        </div>
                    </li>
                </ul>


                <ul class="social-links">
                    <li><a href="https://instagram.com/kamalbay_yusupbayuli"><i class="fab fa-instagram"></i></a></li>
					<li><a href="https://www.youtube.com/@kamalbay_yusupbayuli1052"><i class="fab fa-youtube"></i></a></li>
					<li><a href="https://t.me/kamalbayyusupbayuli"><i class="fab fa-telegram"></i></a></li>
					<li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                </ul>
            </nav>
        </div><!-- End Mobile Menu -->

        <!-- Header Search -->
        <div class="search-popup">
            <span class="search-back-drop"></span>
            <button class="close-search"><span class="fa fa-times"></span></button>

            <div class="search-inner">
                <form method="post" action="{{ route('search') }}">
                    @csrf
                    <div class="form-group">
                        <input type="search" name="q" value="" placeholder="Поиск..." required="">
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
                        <a href="/" title=""><img  style="max-height: 90px;" src="/images/logo.png" alt="" title=""></a>
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
                        </nav><!-- Main Menu End-->

                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><span class="icon lnr-icon-bars"></span></div>
                    </div>
                </div>
            </div>
        </div><!-- End Sticky Menu -->
    </header>
    <!--End Main Header -->
    @yield('content')
    </div><!-- End Page Wrapper -->
    <!-- Main Footer -->
	<footer class="main-footer">
		<div class="bg-image zoom-two"  style="background-image: url(/images/background/4.jpg)"></div>

		<!--Widgets Section-->
		<div class="widgets-section">
			<div class="auto-container">
				<div class="row">
					<!--Footer Column-->
					<div class="footer-column col-xl-3 col-lg-12 col-md-6 col-sm-12">
						<div class="footer-widget about-widget">
							<div class="logo"><a href="/"><img style="width: 150px;" src="/images/logo.png" alt="" ></a></div>
							<div class="text">{{ __('Best online courses') }}</div>
							<ul class="social-icon-two">
                                <li><a href="https://instagram.com/kamalbay_yusupbayuli"><i class="fab fa-instagram"></i></a></li>
								<li><a href="https://www.youtube.com/@kamalbay_yusupbayuli1052"><i class="fab fa-youtube"></i></a></li>
								<li><a href="https://t.me/kamalbayyusupbayuli"><i class="fab fa-telegram"></i></a></li>
								<li><a href="#"><i class="fab fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>

					<!--Footer Column-->
					<div class="footer-column col-xl-2 col-lg-4 col-md-6 col-sm-12">
						<div class="footer-widget">
							<h4 class="widget-title">{{ __('Courses') }}</h4>
							<ul class="user-links">
                                @foreach($categories as $category)
								<li><a href="{{ route('course-category.show', ['course_category' => $category]) }}">{{ $category->title }}</a></li>
                                @endforeach
							</ul>
						</div>
					</div>

					<!--Footer Column-->
					<div class="footer-column col-xl-2 col-lg-4 col-md-6 col-sm-12">
						<div class="footer-widget">
							<h4 class="widget-title">{{ __('Links') }}</h4>
							<ul class="user-links">
                                @foreach($links as $link)
								<li><a href="{{ $link['link'] }}">{{ $link['name'] }}</a></li>
                                @endforeach
							</ul>
						</div>
					</div>

					<!--Footer Column-->
					<div class="footer-column col-xl-5 col-lg-4 col-md-6 col-sm-12">
						<div class="footer-widget contact-widget">
							<h4 class="widget-title">{{ __('Contact') }}</h4>
							<div class="widget-content">
								<ul class="contact-info">
									<li><i class="fa fa-phone-square"></i> <a href="tel:+77053776288">+7(705)377 62 88</a></li>
									<li><i class="fa fa-envelope"></i> <a href="mailto:qamqor2022@gmail.com">ruhdamukz@gmail.com</a></li>
									<li><i class="fa fa-map-marker-alt"></i> Актау, Казахстан</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Footer Bottom-->
		<div class="footer-bottom">
			<div class="auto-container">
				<div class="inner-container">
					<div class="copyright-text">&copy; Copyright {{ date('Y') }} by  <a href="https://pixelpro.kz">PixelPro KZ</a></div>
				</div>
			</div>
		</div>
	</footer>
	<!--End Main Footer -->
    <!-- Scroll To Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>

    <script src="/js/jquery.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.fancybox.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/wow.js"></script>
    <script src="/js/appear.js"></script>
    <script src="/js/select2.min.js"></script>
    <script src="/js/swiper.min.js"></script>
    <script src="/js/owl.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/script.js"></script>
</body>
</html>