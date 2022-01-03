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
?>
<div class="property-detail">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-12">
				<div class="back-div">
					<a href="/aanbod/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/white-arrow-right.svg" class="img-fluid" alt="">Terug naar overzicht </a>
				</div>
			</div>
			<div class="col-xl-8 col-lg-8 col-md-7 col-12 prop-left">
				<img src="<?php echo $image[0]; ?>" class="img-fluid" alt="<?php the_title(); ?>">
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
					<h2><?php echo get_field('adres'); ?> <?php echo get_field('huisnummer'); ?> | <?php echo get_field('plaats'); ?>
					</h2>
					<ul class="list-inline prod-list">
						<li class="list-inline-item">
							<div class="media">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-new.svg" alt="">
								<div class="media-body">
									<h3>Oppervlakte</h3>
									<p><?php echo number_format(get_field('oppervlakte')); ?> m<sup>2</sup></p>
								</div>
							</div>
						</li>
						<li class="list-inline-item">
							<div class="media">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon-new2.svg" alt="">
								<div class="media-body">
									<h3>Te huur vanaf</h3>
									<p><?php echo get_field('in_units_vanaf'); ?> m<sup>2</sup></p>
								</div>
							</div>
						</li>
						<li class="list-inline-item">
							<div class="media">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/huurprijs-label.svg" alt="">
								<div class="media-body">
									<h3>Huurprijs</h3>
									<p>€ <?php echo number_format(get_field('huurprijs_excl_btw')); ?>,- per jaar</p>
								</div>
							</div>
						</li>
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

					<?php the_content(); ?>
					<!-- <a href="#" class="load-more">Lees meer <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/green-arrow.svg" class="img-fluid" alt=""></a> -->
				</div>

				<div class="ken-div">
					<h3>Kenmerken</h3>

					<div class="info-box">
						<h4>Algemeen</h4>
						<p>Huurprijs <span>€ <?php echo number_format(get_field('huurprijs_excl_btw')); ?> per vierkante meter per jaar</span></p>
						<p>Servicekosten <span>€ 55 per vierkante meter per jaar (21% BTW van toepassing)</span></p>
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
						<p>Soort bouw <span>Bestaande bouw</span></p>
						<?php if (get_field('bouwjaar') != '') { ?>
							<p>Bouwjaar <span><?php echo get_field('bouwjaar'); ?></span></p>
						<?php } ?>
					</div>

					<div class="info-box last-info-box">
						<h4>Oppervlakten</h4>
						<p>Oppervlakte <span><?php echo number_format(get_field('oppervlakte')); ?> m<sup>2</sup>(in units vanaf <?php echo get_field('in_units_vanaf'); ?> m<sup>2</sup>)</span></p>

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
				<div class="property-sidebar">
					<h3>Contactpersoon</h3>
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
