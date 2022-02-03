<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package drsproject
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/bootstrap.min.css">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/owl.carousel.min.css" rel="stylesheet">
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/css/owl.theme.default.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=Signika:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=Signika:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'drsproject'); ?></a>

		<div class="header">
			<div class="container">
				<div class="row">
					<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4 logo">
						<a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg" class="img-fluid" alt=""></a>
					</div>

					<div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8 menu">
						<div class="phone-div">
							<a href="tel:020 640 52 52"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/phone.svg" class="img-fluid">020 640 52 52</a>
						</div>
						<nav class="navbar navbar-expand-md">
							<button class="navbar-toggler" type="button" data-toggle="collapse" aria-label="Toggle navigation" id="mobilenav-btn">
								<span class="navbar-toggler-icon"></span>
							</button>
							<div class="collapse navbar-collapse nav-mob" >
								<div class="cross-btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close-icon.png" class="img-fluid" alt=""></div>
								<ul class="navbar-nav">
									<li class="nav-item active">
										<a class="nav-link" href="/diensten/">
											<div class="menu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-keypad.svg" alt=""></div>Diensten
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="/nieuws/">
											<div class="menu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-newspaper.svg" alt=""></div>Nieuws
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="/over-ons/">
											<div class="menu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-clipboard.svg" alt=""></div>Over ons
										</a>
									</li>
									<li class="nav-item">
										<a class="nav-link contactPage" href="javascript:void(0);">
											<div class="menu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-person.svg" alt=""></div>Contact
										</a>
									</li>
									<li class="nav-item about-menu">
										<a class="nav-link" href="/aanbod/">
											<div class="menu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-home.svg" alt=""></div> Aanbod
										</a>
									</li>
									<!--      <li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
							<div class="dropdown-menu" aria-labelledby="dropdown01">
							  <a class="dropdown-item" href="#">Action</a>
							  <a class="dropdown-item" href="#">Another action</a>
							  <a class="dropdown-item" href="#">Something else here</a>
							</div>
						  </li>-->
								</ul>

							</div>
						</nav>
					</div>
					<div class="col-xl-12 col-lg-12 col-12 mobile-links">
						<ul class="list-inline">
							<li class="list-inline-item"><a href="/diensten/">Diensten</a></li>
							<li class="list-inline-item"><a href="/over-ons/">Over ons</a></li>
							<li class="list-inline-item"><a href="/aanbod/">Aanbod</a></li>
						</ul>
					</div>
				</div>
				
				
				<div class="collapse navbar-collapse" id="mobile-nav">
		 		<div class="row">
			 		<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4 logo">
						<a href="/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg" class="img-fluid" alt=""></a>
					</div>
					<div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8 menu">
					<div class="phone-div">
						<a href="tel:020 640 52 52"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/phone-mob.svg" class="img-fluid">020 640 52 52</a>
					</div>s
					<div class="cross-btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close-icon2.png" class="img-fluid" alt=""></div>
					</div>
				</div>
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="/diensten/">
								<div class="menu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mob-icon.svg" alt=""></div>Diensten
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/nieuws/">
								<div class="menu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mob-icon2.svg" alt=""></div>Nieuws
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/over-ons/">
								<div class="menu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mob-icon3.svg" alt=""></div>Over ons
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link contactPage" href="javascript:void(0);">
								<div class="menu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mob-icon4.svg" alt=""></div>Contact
							</a>
						</li>
						
						<!--      <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
				<div class="dropdown-menu" aria-labelledby="dropdown01">
				  <a class="dropdown-item" href="#">Action</a>
				  <a class="dropdown-item" href="#">Another action</a>
				  <a class="dropdown-item" href="#">Something else here</a>
				</div>
			  </li>-->
					</ul>
					
					<div class="mob-menu-link">
						<a  href="#" class="home-link-mb">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-home.svg" alt="">Aanbod
						</a>
						<ul class="list-inline">
							<li class="list-inline-item active"><a href="" class="nl-lang">NL</a></li>
							<li class="list-inline-item"><a href="" class="en-lang">EN</a></li>
						</ul>
					</div>		
					<div class="head-btm">
						<ul class="list-inline">
							<li class="list-inline-item active">
								<a href="">
								<span>Bellen</span>
								</a>
							</li>
							<li class="list-inline-item">
								<a href="">
								<span>Mailen</span>
								</a>
							</li>
						</ul>
					</div>
				
				</div>
				
			</div>
		</div>