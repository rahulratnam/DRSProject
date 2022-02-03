<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package drsproject
 */

get_header();
$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
$galleryImages = get_field('andere_fotos');

?>
<div class="property-detail">
	<div class="container">
		<div class="row ">
			<div class="col-xl-12 col-lg-12 col-md-12 col-12">
				<div class="back-div">
					<a href="/aanbod/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/white-arrow-right.svg" class="img-fluid" alt="">Terug naar aanbod </a>
				</div>
			</div>
			<div class="desktopView row">
				<div class="col-xl-8 col-lg-8 col-md-7 col-12 prop-left">
					<img src="<?php echo $image[0]; ?>" onclick="openModal();currentSlide(1);" class="img-fluid" alt="<?php the_title(); ?>">
				</div>
				<div class="col-xl-4 col-lg-4 col-md-5 col-12">
					<div class="row">
						<?php
						foreach ($galleryImages as $key => $galleryImage) {
							if ($key <= 1) {
								$j = $key + 2;
						?>
								<div class="col-xl-12 col-lg-12 col-md-12 col-12 prop-img">
									<img src="<?php echo $galleryImage; ?>" onclick="openModal();currentSlide(<?php echo $j; ?>);" class="img-fluid" alt="">
									<?php if ($key == 1) { ?>
										<div class="prop-btn">
											<a href="javascript:void(0);" onclick="openModal();currentSlide(1);" class="prop-btn">Bekijk foto’s</a>
										</div>
									<?php } ?>
								</div>
						<?php
							}
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-xl-12 col-md-12 col-12 slider-div mobileView">
				<div class="owl-carousel owl-theme" id="slider">
					<div class="item">
						<img src="<?php echo $image[0]; ?>" onclick="openModal();currentSlide(1);" alt="" loading="lazy">
					</div>
					<?php
					foreach ($galleryImages as $key => $galleryImage) {
						$k = $key + 2;
					?>
						<div class="item">
							<img src="<?php echo $galleryImage; ?>" onclick="openModal();currentSlide(<?php echo $k; ?>);" alt="" loading="lazy">
						</div>
					<?php } ?>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-xl-8 col-lg-8 col-md-7 col-12 prop-detail">
				<div class="prop-info">
					<h2><?php echo get_field('adres'); ?> <?php echo get_field('huisnummer'); ?> | <?php echo get_field('plaats'); ?>
					</h2>
					<ul class="list-inline prod-list">
						<li class="list-inline-item">
							<div class="media">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-new.svg" alt="">
								<div class="media-body">
									<h3>Oppervlakte</h3>
									<p><?php echo euroNumberFormat(get_field('oppervlakte')); ?> m<sup>2</sup></p>
								</div>
							</div>
						</li>

						<?php if (get_field('aanmelding_verkoop_verhuur') == 'In verhuur genomen') { ?>
							<li class="list-inline-item">
								<div class="media">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-new2.svg" alt="">
									<div class="media-body">
										<h3>Te huur vanaf</h3>
										<p><?php echo euroNumberFormat(get_field('in_units_vanaf')); ?> m<sup>2</sup></p>
									</div>
								</div>
							</li>
						<?php } else { ?>
							<li class="list-inline-item">
								<div class="media">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-new2.svg" alt="">
									<div class="media-body">
										<h3>Te koop vanaf</h3>
										<p><?php echo euroNumberFormat(get_field('in_units_vanaf')); ?> m<sup>2</sup></p>
									</div>
								</div>
							</li>
						<?php } ?>
						<?php if (get_field('aanmelding_verkoop_verhuur') == 'In verhuur genomen') { ?>
							<li class="list-inline-item">
								<div class="media">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/huurprijs-label.svg" alt="">
									<div class="media-body">
										<h3>Huurprijs</h3>
										<p>€ <?php echo number_format(get_field('huurprijs_excl_btw'), 0, ',', '.'); ?> - <?php echo callSubText(get_field('conditie_huurprijs')); ?></p>
									</div>
								</div>
							</li>
						<?php } else { ?>
							<li class="list-inline-item">
								<div class="media">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/huurprijs-label.svg" alt="">
									<div class="media-body">
										<h3>Koopsom</h3>
										<p>€ <?php echo number_format(get_field('koopsom_excl_btw'), 0, ',', '.'); ?> - <?php echo callSubText(get_field('conditie_koopsom')); ?></p>
									</div>
								</div>
							</li>
						<?php } ?>

						<?php if (get_field('naam_gebouw') != '') { ?>
							<li class="list-inline-item">
								<div class="media">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/gebouwnaam-icon-drs.svg" alt="">
									<div class="media-body">
										<h3>Gebouwnaam</h3>
										<p><?php echo get_field('naam_gebouw'); ?></p>
									</div>
								</div>
							</li>
						<?php } ?>
					</ul>

					<div class="js-read-more" style="height:300px; overflow: hidden;"><?php the_content(); ?></div>
					<a href="javascript:void(0);" class="load-more loadMoreContent">Lees meer <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/green-arrow.svg" class="img-fluid" alt=""></a>

				</div>

				<div class="ken-div">
					<h3>Kenmerken</h3>

					<div class="info-box">
						<h4>Algemeen</h4>
						<?php if (get_field('aanmelding_verkoop_verhuur') == 'In verhuur genomen') { ?>
							<p>Huurprijs <span>€ <?php echo number_format(get_field('huurprijs_excl_btw'), 0, ',', '.'); ?> - <?php echo callSubText(get_field('conditie_huurprijs')); ?></span></p>
							<?php if (get_field('servicekosten') > 0) { ?>
								<p>Servicekosten <span>€ <?php echo number_format(get_field('servicekosten')); ?> <?php echo callSubText(get_field('conditie_servicekosten_rent')); ?></span></p>
							<?php } ?>
						<?php } else { ?>
							<p>Koopsom <span>€ <?php echo number_format(get_field('koopsom_excl_btw'), 0, ',', '.'); ?> - <?php echo callSubText(get_field('conditie_koopsom')); ?></span></p>
						<?php } ?>

						<!-- <p>Aangeboden sinds <span>6+ maanden</span></p>
						<p>Status <span><?php echo get_field('status'); ?></span></p> -->
						<p>Aanvaarding <span><?php echo get_field('aanvaarding'); ?></span></p>
						<?php if (get_field('aanvaarding') == 'Per datum') { ?>
							<p>Aanvaardingsdatum <span><?php echo get_field('aanvaardingsdatum'); ?></span></p>
						<?php } ?>
					</div>

					<div class="info-box">
						<h4>Bouw</h4>
						<p>Hoofdfunctie <span><?php echo get_field('hoofdfunctie'); ?></span></p>
						<!-- <p>Soort bouw <span>Bestaande bouw</span></p> -->
						<?php if (get_field('bouwjaar') != '') { ?>
							<p>Bouwjaar <span><?php echo get_field('bouwjaar'); ?></span></p>
						<?php } ?>
					</div>

					<div class="info-box last-info-box">
						<h4>Oppervlakten</h4>
						<p>Oppervlakte <span><?php echo euroNumberFormat(get_field('oppervlakte')); ?> m<sup>2</sup> (in units vanaf <?php echo get_field('in_units_vanaf'); ?> m<sup>2</sup>)</span></p>

					</div>

					<?php if (get_field('aantal_verdiepingen') != '') { ?>
						<div class="info-box last-info-box">
							<h4>Indeling</h4>
							<p>Aantal bouwlagen <span><?php echo get_field('aantal_verdiepingen'); ?> bouwlagen</span></p>
						</div>
					<?php } ?>
				</div>

				<iframe scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=450&amp;hl=en&amp;q=<?php the_title(); ?>+(DRS%20Property)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-5 col-12 prop-right">
				<div class="sidebar-sticky">
					<?php
					$team_members = get_field('team_members');
					if (get_field('employee_name', $team_members[0]) != '') {
						foreach ($team_members as $mId) {
							$linkedinUrl = get_field('linkedin_url', $mId);
							$emailAddress = get_field('email_address', $mId);
							$telephoneNumber = get_field('telephone_number', $mId);
							$employeeName = get_field('employee_name', $mId);
							$employeeImage = get_field('employee_image', $mId);
							$employeePosition = get_field('employee_position', $mId);
							$employeeTitle = get_field('employee_title', $mId);
							$employeeInfo = get_field('employee_info', $mId);
					?>
							<div class="property-sidebar">
								<div class="contact-info">
									<h3>Contactgegevens</h3>
									<div class="media">
										<div class="media-body">
											<h4><?php echo $employeeName; ?></h4>
											<p><a href="mailto:<?php echo $emailAddress; ?>?subject=DRS | <?php the_title(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mail.svg" alt=""> <?php echo $emailAddress; ?></a></p>
											<p><a href="tel:<?php echo str_replace(' ', '', $telephoneNumber); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/phone-icon.svg" alt=""> <?php echo $telephoneNumber; ?></a></p>
										</div>
										<img class="image-profile" src="<?php echo $employeeImage; ?>" class="img-fluid" alt="">
									</div>
								</div>
								<div class="side-btn">
									<ul class="list-inline">
										<a href="tel:<?php echo str_replace(' ', '', $telephoneNumber); ?>">
											<li class="list-inline-item li-first">
												Bellen
											</li>
										</a>
										<a href="mailto:<?php echo $emailAddress; ?>?subject=DRS | <?php the_title(); ?>">
											<li class="list-inline-item">
												Mailen
											</li>
										</a>
									</ul>
								</div>
							</div>
						<?php
						}
					} else {
						?>
						<div class="property-sidebar">
							<div class="contact-info">
								<h3>Contactgegevens</h3>
								<div class="media">
									<div class="media-body">
										<h4>DRS Makelaars</h4>
										<p><a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mail.svg" alt=""> info@drs.eu</a></p>
										<p><a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/phone-icon.svg" alt=""> 020 640 52 52</a></p>
									</div>
									<img class="image-profile" src="<?php echo get_stylesheet_directory_uri(); ?>/images/drs-realworks-foto.jpg" class="img-fluid" alt="">
								</div>
							</div>
							<div class="side-btn">
								<ul class="list-inline">
									<a href="tel:020 640 52 52">
										<li class="list-inline-item li-first">
											Bellen
										</li>
									</a>
									<a href="mailto:info@drs.eu?subject=DRS | <?php the_title(); ?>">
										<li class="list-inline-item">
											Mailen
										</li>
									</a>
								</ul>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- The Modal/Lightbox -->
<div id="myModal" class="modal">
	<span class="close cursor" onclick="closeModal()"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cross-close.svg"></span>
	<div class="modal-content">
		<div class="mySlides">
			<div class="numbertext">1 / <?php echo count($galleryImages) + 1; ?></div>
			<img src="<?php echo $image[0]; ?>" style="width:100%">
		</div>
		<?php
		foreach ($galleryImages as $key => $galleryImage) {
			$i = $key + 2;
		?>
			<div class="mySlides">
				<div class="numbertext"><?php echo $i; ?> / <?php echo count($galleryImages) + 1; ?></div>
				<img src="<?php echo $galleryImage; ?>" style="width:100%">
			</div>
		<?php } ?>
		<!-- Next/previous controls -->
		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>

	</div>
</div>

<!--<div class="count-div count-detail">
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
</div> -->
<!--<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyCkUOdZ5y7hMm0yrcCQoCvLwzdM6M8s5qk"></script>
<script>
var geocoder;
var map;
var address = "<?php the_title(); ?>";

function initialize() {
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(-34.397, 150.644);
  var myOptions = {
    zoom: 8,
    center: latlng,
    mapTypeControl: true,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
    },
    navigationControl: true,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
  if (geocoder) {
    geocoder.geocode({
      'address': address
    }, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
          map.setCenter(results[0].geometry.location);

          var infowindow = new google.maps.InfoWindow({
            content: '<b>' + address + '</b>',
            size: new google.maps.Size(150, 50)
          });

          var marker = new google.maps.Marker({
            position: results[0].geometry.location,
            map: map,
            title: address
          });
          google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
          });

        } else {
          alert("No results found");
        }
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
  }
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>-->
<?php
get_footer();
?>
<style>
	.close:hover,
	.close:focus {
		color: #999;
		text-decoration: none;
		cursor: pointer;
	}

	/* Hide the slides by default */
	.mySlides {
		display: none;
	}

	img.hover-shadow {
		transition: 0.3s;
	}

	.hover-shadow:hover {
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	}
</style>
<script>
	document.onkeydown = checkKey;

	function checkKey(e) {
		e = e || window.event;

		if (e.keyCode == '37') {
			// left arrow
			plusSlides(-1);
		} else if (e.keyCode == '39') {
			// right arrow
			plusSlides(1);
		}
	}


	jQuery('document').ready(function() {
		jQuery('.loadMoreContent').click(function() {
			jQuery('.js-read-more').attr('style', '');
			jQuery(this).hide();
		});

		jQuery('.mySlides').click(function() {
			closeModal();
		});
	});

	// Open the Modal
	function openModal() {
		document.getElementById("myModal").style.display = "block";
	}

	// Close the Modal
	function closeModal() {
		document.getElementById("myModal").style.display = "none";
	}

	var slideIndex = 1;
	showSlides(slideIndex);

	// Next/previous controls
	function plusSlides(n) {
		showSlides(slideIndex += n);
	}

	// Thumbnail image controls
	function currentSlide(n) {
		showSlides(slideIndex = n);
	}

	function showSlides(n) {
		var i;
		var slides = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("demo");
		var captionText = document.getElementById("caption");
		if (n > slides.length) {
			slideIndex = 1
		}
		if (n < 1) {
			slideIndex = slides.length
		}
		for (i = 0; i < slides.length; i++) {
			slides[i].style.display = "none";
		}
		for (i = 0; i < dots.length; i++) {
			dots[i].className = dots[i].className.replace(" active", "");
		}
		slides[slideIndex - 1].style.display = "block";
		dots[slideIndex - 1].className += " active";
		captionText.innerHTML = dots[slideIndex - 1].alt;
	}
</script>