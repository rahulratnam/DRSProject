<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package drsproject
 */

get_header();
?>

<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-md-8 col-12 content-intro">
				<div class="page-subtitle"><?php echo get_field('page_subtitle'); ?></div>
				<h1><?php echo get_field('page_title'); ?></h1>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
