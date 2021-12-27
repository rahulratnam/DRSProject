<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package drsproject
 */

get_header();
?>
<div class="property-detail">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-12">
				<div class="back-div">
					<a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/white-arrow-right.svg" class="img-fluid" alt="">Terug naar overzicht </a>
				</div>
			</div>
			<div class="col-xl-8 col-lg-8 col-md-7 col-12 prop-left">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/property.jpg" class="img-fluid" alt="">
			</div>
			<div class="col-xl-4 col-lg-4 col-md-5 col-12">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-12 prop-img">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/property2.jpg" class="img-fluid" alt="">
					</div>
					<div class="col-xl-12 col-lg-12 col-md-12 col-12 prop-img">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/property3.jpg" class="img-fluid" alt="">
						<div class="prop-btn">
							<a href="#" class="prop-btn">Bekijk foto’s</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		<div class="row">
			<div class="col-xl-8 col-lg-8 col-md-7 col-12 prop-detail">
				<div class="prop-info">
					<h2><?php the_title(); ?> | <?php echo ucfirst(strtolower(get_field('plaats'))); ?></h2>
					<ul class="list-inline prod-list">
							<li class="list-inline-item">
								<div class="media">
								 <img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-new.svg" alt="">
								  <div class="media-body">
									<h3>Oppervlakte</h3>
									<p>4.056 m<sup>2</sup></p>
								  </div>
								</div>
							</li>
							<li class="list-inline-item">
								<div class="media">
								 <img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-new2.svg" alt="">
								  <div class="media-body">
									<h3>Te huur vanaf</h3>
									<p>450 m<sup>2</sup></p>
								  </div>
								</div>
							</li>
							<li class="list-inline-item">
								<div class="media">
								 <img  src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-new3.svg" alt="">
								  <div class="media-body">
									<h3>Huurprijs</h3>
									<p>€ 7.800,- per jaar</p>
								  </div>
								</div>
							</li>
						</ul>
						
					<?php the_content(); ?>
					<!-- <a href="#" class="load-more">Lees meer <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/green-arrow.svg" class="img-fluid" alt=""></a> -->
				</div>
				
				<div class="ken-div">
					<h3>Kenmerken</h3>
					
					<div class="info-box">
						<h4>Algemeen</h4>
						<p>Huurprijs <span>€ 275 per vierkante meter per jaar</span></p>
						<p>Servicekosten <span>€ 55 per vierkante meter per jaar (21% BTW van toepassing)</span></p>
						<p>Aangeboden sinds <span>6+ maanden</span></p>
						<p>Status <span>Gereed</span></p>
						<p>Aanvaarding <span>Per direct  beschikbaar</span></p>
					</div>
					
					<div class="info-box">
						<h4>Bouw</h4>
						<p>Hoofdfunctie <span>Kantoor</span></p>
						<p>Soort bouw <span>Bestaande bouw</span></p>
						<p>Bouwjaar <span>1971</span></p>
					</div>
					
					<div class="info-box last-info-box">
						<h4>Oppervlakten</h4>
						<p>Oppervlakte <span>1.547 m<sup>2</sup>(in units vanaf 132 m<sup>2</sup>)</span></p>
						
					</div>
					
					<div class="info-box last-info-box">
						<h4>Indeling</h4>
						<p>Aantal bouwlagen <span>8 bouwlagen</span></p>
						
					</div>
				</div>
				
				<iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d111972.65059697359!2d77.10035523683939!3d28.715202461277283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d28.7080448!2d77.22434559999999!4m5!1s0x390d03e4a46e95b1%3A0x6fde9f4de8dfc36e!2snethues%20technologies%20pvt%20ltd!3m2!1d28.7004815!2d77.11665909999999!5e0!3m2!1sen!2sin!4v1637737949260!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>	
			<div class="col-xl-4 col-lg-4 col-md-5 col-12 prop-right">
				<div class="property-sidebar">
					<h3>Contactpersoon</h3>
					<div class="media">				
						  <div class="media-body">
							<h4>Maarten van Gurp</h4>
							<p><a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mail.svg" alt=""> info@drs.eu</a></p>
							<p><a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/phone-icon.svg" alt=""> 020 640 52 52</a></p>
						  </div>
						   <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/property-person.png" class="img-fluid" alt="">
					</div>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget </p>
				</div>
				<div class="side-btn">
					<ul class="list-inline">
						<li class="list-inline-item li-first">
							<a href="#">Bellen</a>
						</li>
						<li class="list-inline-item">
							<a href="#">Mailen </a>
						</li>
					</ul>
				</div>
			</div>	
		</div>
		
	</div>
</div>

<div class="count-div count-detail">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-md-12 col-12 ams-div">
				<p>Drs makelaars  </p>
				<h3>De wereldspeler in Amsterdam</h3>
			</div>
			<div class="col-xl-3 col-md-3 col-12 ams-div">
				<div class="count-box">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/search.svg" class="img-fluid" alt="">
					<h3>85 panden</h3>
					<p>Actueel aanbod </p>
				</div>
			</div>	
			<div class="col-xl-3 col-md-3 col-12 ams-div">
				<div class="count-box">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aan-img.svg" class="img-fluid" alt="">
					<h3>75.412 m²</h3>
					<p>Aan -en verhuur</p>
				</div>
			</div>
				<div class="col-xl-3 col-md-3 col-12 ams-div">
				<div class="count-box">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/network.svg" class="img-fluid" alt="">
					<h3>692 miljoen</h3>
					<p>Beleggingen en aankopen 	</p>
				</div>
			</div>
				<div class="col-xl-3 col-md-3 col-12 ams-div">
				<div class="count-box">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/klanten.svg" class="img-fluid" alt="">
					<h3>1.123</h3>
					<p>Tevreden klanten</p>
				</div>
			</div>
					
		</div>
	</div>
</div>
<?php
get_footer();
