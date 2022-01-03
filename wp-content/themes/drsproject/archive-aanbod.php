<?php
get_header();
?>
<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-md-8 col-12 content-intro">
				<div class="page-subtitle">Drs makelaars </div>
				<h1>Meest recente aanbod</h1>
				<p>Bent u op zoek naar kantoorruimte? Bekijk hier ons aanbod. Met behulp van de filters kunt u makkelijk uw eigen criteria toevoegen waardoor het relevante aanbod zichtbaar wordt. Heeft u niet gevonden wat u zocht? Wenst u hulp bij uw zoektocht? Of wilt u een bezichtiging inplannen? Bel ons geheel vrijblijvend op 020 640 5252.</p>
			</div>
		</div>
	</div>
</div>

<div class="property-list">
	<div class="container">
		<div class="row">
			<div class="col-xl-4 col-md-4 col-12 filter-div">
				<a href="javascript:void(0);" class="filter-btn" data-toggle="modal" data-target="#filtermodel"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/filter.svg" class="img-fluid" alt=""> Filters</a>
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
			<div class="col-xl-4 col-md-4 col-12 filter-right">
				<ul class="list-inline">
					<!--<li class="list-inline-item">
						<a href=""><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/list.svg" class="img-fluid" alt=""> Lijstweergave</a>
					</li>-->
					<li class="list-inline-item">
						<?php
						$count_pages = wp_count_posts($post_type = 'aanbod');
						$published_posts = $count_pages->publish;
						?>
						Totaal: <?php echo $published_posts; ?> panden
					</li>
				</ul>
			</div>
		</div>
		<div class="row" id="propertiesDataList">
			<?php
			$args = [
				'post_type' 		=> 'aanbod',
				'posts_per_page' 	=> 6,
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
								<div class="aanbod-img" style="background-image: url('<?php echo $image[0]; ?>" class="img-fluid" alt="<?php the_title(); ?>)"></div>
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
								</ul>
							</div>
						</div>
					</a>
				</div>
			<?php
			}
			?>
		</div>
		<div id="loader_image" style="text-align:center; display:none;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/drs-loading.svg" alt="" width="24" height="24"></div>
		<div class="" style="text-align:center; display:none;"><a id="more_posts" class="load-more-btn" style="background: #95BE48; font-family: 'Mulish', sans-serif; color: #fff; text-align: center; line-height: 18px; font-size: 14px; padding: 10px 15px; cursor: pointer;">Load More</a></div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="filtermodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close-btn" data-dismiss="modal"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/close.png" alt=""> Close</button>
				<div class="filter-main">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/filter.svg" class="img-fluid" alt="">
					<p>AANDBOD</p>
					<h4>Filters</h4>

					<div class="filter-num">
						<h3>Vloeroppervlakte (m<sup>2</sup>)</h3>
						<form class="form-inline">
							<div class="form-group">
								<input type="text" class="min-input" placeholder="min">
							</div>
							<div class="form-group">
								<input type="text" class="max-input" placeholder="max">
							</div>
						</form>
					</div>

					<div class="filter-num">
						<h3>Aanbod type</h3>
						<form class="form-inline">
							<div class="input-checkbox">
								<label class="checkbox-cont">
									<input type="checkbox">
									<span class="checkmark"></span>
									<span>Huur</span>
								</label>
							</div>
							<div class="input-checkbox">
								<label class="checkbox-cont">
									<input type="checkbox">
									<span class="checkmark"></span>
									<span>Koap</span>
								</label>
							</div>
							<div class="input-checkbox">
								<label class="checkbox-cont">
									<input type="checkbox">
									<span class="checkmark"></span>
									<span>Belogging</span>
								</label>
							</div>
						</form>
					</div>

					<!-- <div class="filter-num filter-dropdown">
						<h3>Wijk</h3>
						<div class="form-group">
							<select class="dropdown-btn">
								<option>Selecteer de gewenste wjik</option>
								<option>Selecteer de gewenste wjik</option>
							</select>
						</div>
					</div> -->

					<div class="filter-btm">
						<a href="" class="filter-white">Leeg filters</a>
						<a href="" class="filter-clr">Toon resultaten</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";

		// What page we are on.
		var page = 1;
		// Post per page
		var ppp = 6;
		
		var busy = false;

		jQuery("#more_posts").on("click", function() {
			// When btn is pressed.
			jQuery("#more_posts").attr("disabled", true);
			var offset = (page * ppp);

			var str = '&offset=' + offset + '&ppp=' + ppp + '&action=more_properties_ajax';
			jQuery.ajax({
				type: "POST",
				dataType: "html",
				url: ajaxUrl,
				data: str,
				success: function(data) {
					var $data = $(data);
					jQuery('#loader_image').hide();
					if ($data.length) {
						jQuery("#propertiesDataList").append($data);
						page++;
						busy = false;
						//lazyload();
					} else {
						jQuery("#more_posts").attr("disabled", true);
						//jQuery('#loader_image').html('No more nieuws.');
						busy = true;
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
				}

			});
			return false;
		});
		
		jQuery(window).scroll(function() {
			if ((jQuery(window).scrollTop() + jQuery(window).height() > (jQuery("#propertiesDataList").height() + 600)) && !busy) {
				busy = true;
				setTimeout(function() { 
					jQuery('#loader_image').show();
					jQuery("#more_posts").click(); 
				}, 500);
			}
		});

	});
</script>

<?php
get_footer();
