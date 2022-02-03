<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package drsproject
 */

?>
<!-- <div class="brand-div">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-12 brand-img">
				<ul class="list-inline">
					<li class="list-inline-item">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/brand.png" class="img-fluid" alt="">
					</li>
					<li class="list-inline-item">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/brand.png" class="img-fluid" alt="">
					</li>
					<li class="list-inline-item">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/brand.png" class="img-fluid" alt="">
					</li>
					<li class="list-inline-item">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/brand.png" class="img-fluid" alt="">
					</li>
					<li class="list-inline-item">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/brand.png" class="img-fluid" alt="">
					</li>
				</ul>
			</div>
		</div>
	</div>
</div> -->

<div class="footer" id="contact" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/pand-drs-amsterdam.webp)">
	<div class="container">
		<div class="row">
			<div class="col-xl-7 col-lg-7 col-md-7 col-12 ftr-info">
				<div class="ftr-logo">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.svg" class="img-fluid" alt="">
				</div>
				<div class="row">
					<div class="col-xl-7 col-lg-7 col-md-7 col-12 ftr-left">
						<div class="ftr-ads">
							<h3>Bezoekadres</h3>
							<p>Amsteldijk 194<br>
								1079 LK Amsterdam</p>
							<p>T: <a href="tel:020 640 52 52">020 640 52 52</a><br>
								E: <a href="mailto:info@drs.eu">info@drs.eu</a></p>
						</div>
					</div>
					<div class="col-xl-5 col-lg-5 col-md-5 col-12 ftr-social">
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href="https://www.linkedin.com/company/drs-makelaars/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkedin.svg" class="img-fluid"></a>
							</li>
							<li class="list-inline-item">
								<a href="https://www.instagram.com/drsmakelaars/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/instagram.svg" class="img-fluid"></a>
							</li>
						</ul>
					</div>
				</div>

				<div class="form-ftr">
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-4 col-12 form-icon">
							<ul class="list-unstyled">
								<li>
									<a href="/aanbod/">
										<div class="menu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-home.svg" alt=""></div>Aanbod
									</a>
								</li>
								<li>
									<a href="/diensten/">
										<div class="menu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-keypad.svg" alt=""></div>Diensten
									</a>
								</li>
								<li>
									<a href="/nieuws/">
										<div class="menu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-newspaper.svg" alt=""></div>Nieuws
									</a>
								</li>
								<li>
									<a href="/over-ons/">
										<div class="menu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-clipboard.svg" alt=""></div>Over Ons
									</a>
								</li>
								<li>
									<a href="/over-ons/team/">
										<div class="menu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-person.svg" alt=""></div>Team
									</a>
								</li>
								<li>
									<a href="/contact/">
										<div class="menu-icon"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gebouwnaam-icon-drs-wit.svg" alt=""></div>Contact
									</a>
								</li>
							</ul>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-12 form-div">
							<h3>Contact mij</h3>
							<?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
						</div>
					</div>
				</div>

				<div class="copyright-div">
					<ul class="list-inline">
						<li class="list-inline-item">
							2022 © DRS
						</li>
						<li class="list-inline-item">
							<a href="/algemene-voorwaarden/">Algemene voorwaarden</a>
						</li>
						<li class="list-inline-item">
							<a href="/privacyverklaring/">Privacyverklaring</a>
						</li>
						<li class="list-inline-item">
							<a href="/cookie-verklaring/">Cookie verklaring </a>
						</li>
						<li class="list-inline-item">
							Webdesign by <a href="https://wpmasters.nl/" target="_blank">WP Masters</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<script data-cookieconsent="ignore" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script data-cookieconsent="ignore" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-3.2.1.slim.min.js"></script>
<script data-cookieconsent="ignore" src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script data-cookieconsent="ignore" src="<?php echo get_stylesheet_directory_uri(); ?>/js/owl.carousel.min.js"></script>

<script>
	$(document).ready(function() {
		jQuery("#mobilenav-btn").click(function() {

			jQuery("#mobile-nav").addClass("open");

			jQuery("body").addClass("fixed");

		});

		jQuery("#mobile-nav .cross-btn").click(function() {

			jQuery("#mobile-nav").removeClass("open");

		});

		jQuery("a.contactPage").on('click', function(event) {
			jQuery("html, body").animate({
				scrollTop: jQuery(
					'html, body').get(0).scrollHeight
			}, 2000);
		});

		/*jQuery(window).scroll(function(){
			var sticky = jQuery('.header'),
			scroll = jQuery(window).scrollTop();

			if (scroll >= 100) sticky.addClass('sticky');
			else sticky.removeClass('sticky');
		});*/
	});
</script>

<script data-cookieconsent="ignore">
	jQuery('#slider').owlCarousel({
		loop: true,
		margin: 10,
		dots: false,
		responsiveClass: true,
		autoplay: true,
		autoplayTimeout: 5000,
		responsive: {
			0: {
				items: 1,
				nav: true
			},
			600: {
				items: 1,
				nav: false
			},
			1000: {
				items: 1,
				nav: true,
				loop: false
			}
		}
	})
</script>

<?php wp_footer(); ?>

</body>

</html>