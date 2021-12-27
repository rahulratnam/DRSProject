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
<div class="brand-div">
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
</div>

<div class="footer" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/footer-bg.jpg)">
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
								<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/linkedin.svg" class="img-fluid"></a>
							</li>
							<li class="list-inline-item">
								<a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/instagram.svg" class="img-fluid"></a>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="form-ftr">
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-4 col-12 form-icon">
							<ul class="list-unstyled">
								<li><a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-home.svg" alt="">Aanbod</a></li>
								<li><a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-keypad.svg" alt="">Diensten</a></li>
								<li><a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-newspaper.svg" alt="">Nieuws</a></li>
								<li><a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-clipboard.svg" alt="">Over Ons</a></li>
								<li><a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-handshake.svg" alt="">Partners</a></li>
								<li><a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/ftr-person.svg" alt="">Contact</a></li>
							</ul>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-12 form-div">
							<form>
								<h3>Contact mij</h3>
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Voor -en achternaam">
								</div>
								<div class="input-group">
									<input type="email" class="form-control" placeholder="E-mail adres en/of telefoonnummer">
								</div>
								<div class="input-group">
									<button type="submit" class="btn btn-form">verstuur</button>
								</div>
							</form>
						</div>
					</div>
				</div>	
				
				<div class="copyright-div">
					<ul class="list-inline">
						<li class="list-inline-item">
							2021 © DRS  
						</li>
						<li class="list-inline-item">
							<a href="">Privacy policy</a>
						</li>
						<li class="list-inline-item">
							<a href="">Cookie verklaring </a>
						</li>
						<li class="list-inline-item">
							Webdesign by WP Masters
						</li>
					</ul>
				</div>		
			</div>
		</div>
	</div>
</div>
</div>

<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-3.2.1.slim.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
		jQuery("#mobilenav-btn").click(function(){

		jQuery("#mobile-nav").addClass("open");

		jQuery("body").addClass("fixed"); 

	});

	 jQuery("#mobile-nav .cross-btn").click(function(){

     jQuery("#mobile-nav").removeClass("open");

	});	
});
	
</script>

<?php wp_footer(); ?>

</body>
</html>
