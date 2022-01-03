<?php
/* Template Name: Servicespage */

get_header();
?>

<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-xl-7 col-md-7 col-12 content-intro">
				<div class="page-subtitle"><?php echo get_field('page_subtitle'); ?></div>
				<h1><?php echo get_field('page_title'); ?></h1>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<div class="drs-box services-div">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-12 drs-left">
				<div class="drs-inner gray-drs">
					<div class="media">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aanhuur.svg" alt="">
						<div class="media-body">
							<?php echo get_field('aanhuur_content'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-12 drs-right">
				<div class="drs-inner  gray-drs">
					<div class="media">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/network.svg" alt="">
						<div class="media-body">
							<?php echo get_field('verhuur_content'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-12 drs-right">
				<div class="drs-inner  gray-drs">
					<div class="media">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/home.svg" alt="">
						<div class="media-body">
							<?php echo get_field('aan_verkoop_content'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-12 drs-right">
				<div class="drs-inner  gray-drs">
					<div class="media">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/search.svg" alt="">
						<div class="media-body">
							<?php echo get_field('beleggingen_content'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-12 drs-right">
				<div class="drs-inner  gray-drs">
					<div class="media">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/taxaties.svg" alt="">
						<div class="media-body">
							<?php echo get_field('taxaties_content'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
?>