<?php
/* Template Name: Newspage */

get_header();
?>

<div class="property-head news-title">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-md-12 col-12 news-head">
				<h4>22 september 2021</h4>
				<h3>Gorillas huurt 200 m² aan de Jacob Bontiusplaats 9, Amsterdam</h3>
			</div>
		</div>
	</div>
</div> 
 
<div class="news-bg">
	<div class="container-fluid">
		<div class="row">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/new-bg.jpg" alt="" class="img-fluid">
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-md-12 col-12 news-para">
				<p>DRS Makelaars heeft ca. 200 m² aan de Jacob Bontiusplaats 9 te Amsterdam verhuurd.<br> 
Hiermee hebben we onze tweede transactie met Gorillas voltooid. Gefeliciteerd en succes met jullie nieuwe locatie in het INIT gebouw!</p>
				<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. </p>
			</div>
		</div>
	</div>
</div>
 
<div class="news-div news-main">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-md-12 col-12 news-head">
				<p>Highlights van Drs</p>
				<h3>Andere nieuwsberichten </h3>
			</div>
		</div>
		<div class="row">
			<?php
			global $post;
 
			$postData = get_posts( array(
				'post_type'      => 'post',
				'posts_per_page' => 6,
				'order'          => 'DESC',
				'orderby'    	=> 'ID',
				'post_status'    => 'publish'
			) );
			
			if ( $postData ) {
				foreach ( $postData as $post ) : 
					setup_postdata( $post );
					$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			?>
			<div class="col-xl-6 col-md-6 col-12 news-img">
				<img src="<?php echo $image[0]; ?>" class="img-fluid" alt="" style="height:300px;">
				<div class="news-box">
					<h4><?php the_title(); ?></h4>
					<p><?php the_content(); ?></p>
					<a href="" class="btn-clr">verder lezen <img src="images/white-arrow.svg" alt=""></a>
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
<?php
get_footer();
?>
