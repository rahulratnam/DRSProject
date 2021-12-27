<?php
/* Template Name: Properties List */

get_header();
?>
<div class="property-head">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-md-12 col-12 news-head">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>          

<div class="property-list">
	<div class="container">
		<div class="row">
			<div class="col-xl-4 col-md-4 col-12 filter-div">
				<a href="" class="filter-btn"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/filter.svg" class="img-fluid" alt=""> Filters</a>
			</div>
			<div class="col-xl-4 col-md-4 col-12 filter-search">
			  <div class="custom-search-input">
					<div class="input-group">
						<input type="text" class="  search-query form-control" placeholder="Zoek op straatnaam" />
						<span class="input-group-btn">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/filter-search.svg" class="img-fluid" alt="">
						</span>
					</div>
			   </div>
			</div>
			<!-- <div class="col-xl-4 col-md-4 col-12 filter-right">
				<ul class="list-inline">
					<li class="list-inline-item">
						<a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/list.svg" class="img-fluid" alt=""> Lijstweergave</a>
					</li>
					<li class="list-inline-item">
						<a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/kaat.svg" class="img-fluid" alt=""> Toon op kaart</a>
					</li>
				</ul>
			</div> -->
		</div>
		<div class="row">
			<?php
			$args = [
				'post_type' 		=> 'rwproperties',
				'posts_per_page' 	=> -1,
				'post_status'   	=> 'publish'
			];

			$loop = new WP_Query($args);

			while ($loop->have_posts()) { 
				$loop->the_post(); 
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
			
			?>
			<div class="col-xl-4 col-lg-4 col-md-6 col-12 product-div">
				<a href="<?php echo get_the_permalink(); ?>">
					<div class="product-box">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/product.jpg" class="img-fluid" alt="">
						<div class="product-inner">
							<ul class="list-inline list-div">
								<li class="list-inline-item">
									<?php the_title(); ?>
								</li>
								<li class="list-inline-item">
									<?php echo ucfirst(strtolower(get_field('plaats'))); ?>
								</li>
							</ul>
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
