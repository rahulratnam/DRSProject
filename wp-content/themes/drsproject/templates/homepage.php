<?php
/* Template Name: Homepage */

get_header();
?>

<div class="banner-div">
	<div class=" container-fluid">
		<div class="row">
			<div class="col-xl-12 col-md-12 col-12 slider-div">
				<div class="owl-carousel owl-theme" id="slider">
					<div class="item">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/amsterdam-centrum-drs.webp" alt="" loading="lazy">
					</div>
					<div class="item">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/drs-kantoor-amstel.webp" alt="" loading="lazy">
					</div>
					<div class="item">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/amsterdam-museumplein-drs.webp" alt="" loading="lazy">
					</div>
				</div>
				<div class="banner">
					<video id="header-video" width="100%" autoplay loop muted playsinline poster="" preload="none">
						<source src="<?php echo get_stylesheet_directory_uri(); ?>/video/drs-video-wereldspeler.webm" type="video/webm">
						<source src="<?php echo get_stylesheet_directory_uri(); ?>/video/drs-video-wereldspeler.mp4" type="video/mp4">
					</video>
					<div class="container">
						<div class="banner-caption">
							<h3>Vandaag klaar voor uw <span>kantoor</span> van morgen.</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="icon-content">
	<div class="container">
		<div class="row">
			<div class="col-xl-4 col-md-4 col-12 icon-div">
				<div class="media">
					<img class="mr-3" src="<?php echo get_stylesheet_directory_uri(); ?>/images/home.svg" alt="">
					<div class="media-body">
						<h3>Wereldspeler in Amsterdam</h3>
						<p>DRS, in 30 jaar uitgegroeid van dé vastgoedmakelaar van Groot Amsterdam tot een wereldspeler in Nederland en ver daarbuiten.</p>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-4 col-12 icon-div">
				<div class="media">
					<img class="mr-3" src="<?php echo get_stylesheet_directory_uri(); ?>/images/network.svg" alt="">
					<div class="media-body">
						<h3>Een scherp oog voor uw kansen</h3>
						<p>DRS heeft een goede neus voor kansen en een scherp oog voor de beste deal. Wij maken ons sterk voor uw belangen. Creatief, alert en betrokken.</p>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-4 col-12 icon-div">
				<div class="media">
					<img class="mr-3" src="<?php echo get_stylesheet_directory_uri(); ?>/images/search.svg" alt="">
					<div class="media-body">
						<h3>Dé allround specialist in vastgoed</h3>
						<p>Voor álle zaken in en rond vastgoed, bent u van harte welkom bij DRS. Of u nou een wereldspeler bent of op zoek naar uw allereerste kantoor.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="content-main">
	<div class="container">
		<div class="row">
			<div class="col-xl-5 col-md-5 col-12 left-img">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mondriaan-toren-water-groen.webp" class="img-fluid" alt="Mondriaantoren water groen.webp">
			</div>
			<div class="col-xl-7 col-md-7 col-12 right-info">
				<div class="infor-right">
					<h3>In de 33 jaar dat DRS bestaat is ál het bedrijfs onroerend goed van Amsterdam al eens door onze handen gegaan. </h3>
					<p>Hierdoor kennen we niet alleen alle achtergronden en verhalen achter ieder pand, maar ook de mensen achter de schermen. De kopers en verkopers, de huurders en de beleggers. </p>
					<a href="/over-ons/" class="btn-clr">over ons <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/clr-arrow.svg" alt=""></a>
					<a href="/diensten/" class="btn-clr-br">onze diensten <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/clr-arrow.svg" alt=""></a>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="news-div">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-md-6 col-12 news-head">
				<p>Drs makelaars </p>
				<h3>Nieuwsberichten </h3>
			</div>
			<div class="col-xl-6 col-md-6 col-12 news-btn">
				<a href="/nieuws/" class="btn-clr">meer nieuws <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/clr-arrow.svg" alt=""></a>
			</div>
		</div>
		<div class="row">
			<?php
			global $post;

			$postData = get_posts(array(
				'post_type'      => 'post',
				'posts_per_page' => 2,
				'order'          => 'DESC',
				'orderby'    	=> 'publish',
				'post_status'    => 'publish'
			));

			if ($postData) {
				foreach ($postData as $post) :
					setup_postdata($post);
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
			?>
					<div class="col-xl-6 col-md-6 col-12 news-img">
						<?php if (has_post_thumbnail()) {
							the_post_thumbnail('full', array('class'  => 'main-img'));
						} else {
						?>
							<img class="main-img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/placeholder-drs.webp" alt="">
						<?php } ?>
						<div class="news-box">
							<h4><?php the_title(); ?></h4>
							<p><?php echo get_field('short-description'); ?></p>
							<a href="/nieuws/?post_id=<?php echo $post->ID; ?>" class="btn-clr">verder lezen <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/clr-arrow.svg" alt=""></a>
						</div>
					</div>
			<?php
				endforeach;
				wp_reset_postdata();
			}
			?>
		</div>
	</div>
</div>

<div class="bg-div" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/amsterdam-grachten-drs.webp)">

</div>

<!-- <div class="count-div">
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

<div class="drs-div bg-grey">
	<div class="container container-small">
		<div class="row">
			<div class="col-xl-6 col-md-6 col-12 drs-left">
				<div class="heading-div">
					<p>DRS makelaars </p>
					<h3>Services en diensten van DRS</h3>
				</div>

				<div class="media">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aanhuur.svg" alt="">
					<div class="media-body">
						<h3>Aanhuur</h3>
						<p>Het team van DRS Aanhuur kent de vastgoedmarkt als geen ander. Wij zien unieke kansen die voor anderen onzichtbaar zijn. En omdat wij uw eisen en wensen kennen, kunnen we razendsnel de deal sluiten.</p>
					</div>
				</div>

				<div class="media">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/network.svg" alt="">
					<div class="media-body">
						<h3>Verhuur</h3>
						<p>Voor het team van DRS Verhuur is uw vastgoed meer dan een stapel stenen en een reeks meters. Wij verdiepen ons in de perfecte match tussen u en uw huurders. En garanderen een maximale opbrengst én een optimale relatie.</p>
					</div>
				</div>

			</div>
			<div class="col-xl-6 col-md-6 col-12 drs-right">
				<div class="media">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home.svg" alt="">
					<div class="media-body">
						<h3>Aan -en verkoop</h3>
						<p>Onze absolute specialisatie is en blijft de aankoop en verkoop van vastgoed. We staan u graag terzijde tijdens deze vaak complexe trajecten. Solide én creatief. Op basis van ongeëvenaarde ervaring. </p>
					</div>
				</div>
				<div class="media">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/search.svg" alt="">
					<div class="media-body">
						<h3>Beleggingen</h3>
						<p>DRS verlegt steeds zijn grenzen. Ook als het gaat om vastgoedbeleggingen. Als onderdeel van een internationaal netwerk van specialisten, zien wij steeds vaker mooie kansen voor onze relaties in binnen- en buitenland. </p>
					</div>
				</div>
				<div class="media">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/taxaties.svg" alt="">
					<div class="media-body">
						<h3>Taxaties</h3>
						<p>DRS heeft niet alleen gevoel voor vastgoed, maar ook voor de waarde ervan. Een combinatie van ultieme kennis van de markt en een perfect ontwikkeld instinct voor de richting waarin deze zich zal ontwikkelen. </p>
					</div>
				</div>
			</div>
			<a href="/diensten/" class="btn-clr btn-services btn-mobile">bekijk alle diensten <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/clr-arrow.svg" alt=""></a>
		</div>
	</div>
</div>

<div class="inner-img">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-md-12 col-12 single-img">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/binnenkant-pand-drs.webp" class="img-fluid" alt="">
			</div>
		</div>
	</div>
</div>

<div class="recent-prod">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-md-6 col-12 news-head">
				<p>Drs makelaars </p>
				<h3>Meest recente aanbod</h3>
			</div>
			<div class="col-xl-6 col-md-6 col-12 news-btn">
				<a href="/aanbod/" class="btn-clr">ons aanbod <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/clr-arrow.svg" alt=""></a>
			</div>
		</div>
		<div class="row">
			<?php
			$args = [
				'post_type' 		=> 'aanbod',
				'posts_per_page' 	=> 3,
				'order'          => 'DESC',
				'orderby'    	=> 'ID',
				'post_status'   	=> 'publish'
			];

			$loop = new WP_Query($args);

			while ($loop->have_posts()) {
				$loop->the_post();
				$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');

			?>
				<div class="col-xl-4 col-lg-4 col-md-6 col-12 product-div">
					<a href="<?php echo get_the_permalink(); ?>">
						<div class="product-box">
							<div class="aanbod-box">
							<div class="aanbod-img" style="background-image: url('<?php echo $image[0]; ?>')" class="img-fluid"; alt="<?php the_title(); ?>"></div>
							</div>
							<div class="product-inner">
								<ul class="list-inline list-div">
									<li class="list-inline-item">
										<?php echo get_field('adres'); ?> <?php echo get_field('huisnummer'); ?>
									</li>
									<li class="list-inline-item">
										<?php echo get_field('plaats'); ?>
									</li>
								</ul>
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
										<li class="list-inline-item item-last">
											<div class="media">
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/huurprijs-label.svg" alt="">
												<div class="media-body">
													<h3>Huurprijs</h3>
													<p>€ <?php echo number_format(get_field('huurprijs_excl_btw'), 0, ',', '.'); ?> - <?php echo callSubText(get_field('conditie_huurprijs')); ?></p>
												</div>
											</div>
										</li>
									<?php } else { ?>
										<li class="list-inline-item item-last">
											<div class="media">
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/huurprijs-label.svg" alt="">
												<div class="media-body">
													<h3>Koopsom</h3>
													<p>€ <?php echo number_format(get_field('koopsom_excl_btw'), 0, ',', '.'); ?> - <?php echo callSubText(get_field('conditie_koopsom')); ?></p>
												</div>
											</div>
										</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</a>
				</div>
			<?php
			}

			?>

		</div>

	</div>
</div>

<?php
get_footer();
?>