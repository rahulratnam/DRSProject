<?php
/* Template Name: Newspage */

get_header();

$args = [
		'post_type' => 'post',
		'post_status'  => 'publish',
		'order'          => 'DESC',
		'orderby'    	=> 'publish',
		'posts_per_page' => 1
	];

	$loop = new WP_Query($args);

	while ($loop->have_posts()) {
		$loop->the_post();
		
		$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
		if (has_post_thumbnail()) {
			$imageFile = $image[0];
		} else { 
			$imageFile = get_stylesheet_directory_uri().'/images/placeholder-drs.webp';
		}
						
?>

<div class="property-head news-title">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-md-12 col-12 news-head">
				<h4 class="postDate"><?php echo get_the_date( 'd F Y' ); ?></h4>
				<h3 class="featureTitle"><?php the_title(); ?></h3>
			</div>
		</div>
	</div>
</div>

<div class="news-bg">
	<div class="container-fluid">
		<div class="row">
			<img src="<?php echo $imageFile; ?>" alt="" class="img-fluid featureImage">
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-md-12 col-12 news-para featureContent">
				<p><?php the_content(); ?></p>
			</div>
		</div>
	</div>
</div>
<?php
	wp_reset_postdata();
}
?>

<div class="news-div news-main">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-md-12 col-12 news-head">
				<p>Highlights van DRS</p>
				<h3>Andere nieuwsberichten </h3>
			</div>
		</div>
		<div class="row" id="ajax-posts">
			<?php
			global $post;

			$postData = get_posts(array(
				'post_type'      => 'post',
				'posts_per_page' => 4,
				'order'          => 'DESC',
				'orderby'    	=> 'publish',
				'post_status'    => 'publish',
				'offset' => 1,
			));

			if ($postData) {
				foreach ($postData as $post) :
					setup_postdata($post);
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
			?>
					<div class="col-xl-6 col-md-6 col-12 news-img">

						<?php if (has_post_thumbnail()) {
							the_post_thumbnail('full', array('class'  => 'main-img'));
							$imageFile = $image[0];
						} else { 
							$imageFile = get_stylesheet_directory_uri().'/images/placeholder-drs.webp';
						?>
							<img class="main-img" src="<?php echo get_stylesheet_directory_uri(); ?>/images/placeholder-drs.webp" alt="">
						<?php } ?>

						<!-- <img class="main-img" src="<?php echo $image[0]; ?>" class="img-fluid" alt=""> -->
						<div class="news-box">
							<h4><?php the_title(); ?></h4>
							<p><?php echo get_field('short-description'); ?></p>
							<a href="javascript:void(0);" class="btn-clr readMoreData" id="post_id_<?php echo $post->ID; ?>" data-title="<?php the_title(); ?>" data-content="<?php the_content(); ?>" data-date="<?php echo get_the_date( 'd F Y' ); ?>" data-image="<?php echo $imageFile; ?>">verder lezen <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/clr-arrow.svg" alt=""></a>
						</div>
					</div>
			<?php
				endforeach;
				wp_reset_postdata();
			}
			?>
		</div>
		<div id="loader_image" style="text-align:center; display:none;"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/drs-loading.svg" alt="" width="24" height="24"></div>
		<div class="" style="text-align:center; display:none;"><a id="more_posts" class="load-more-btn" style="background: #95BE48; font-family: 'Mulish', sans-serif; color: #fff; text-align: center; line-height: 18px; font-size: 14px; padding: 10px 15px; cursor: pointer;">Load More</a></div>
	</div>
</div>

<?php
get_footer();
?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	function lazyload() {
		var lazyloadImages = document.querySelectorAll("img.lazy");
		var lazyloadThrottleTimeout;
		if (lazyloadThrottleTimeout) {
			clearTimeout(lazyloadThrottleTimeout);
		}

		lazyloadThrottleTimeout = setTimeout(function() {
			var scrollTop = window.pageYOffset;
			lazyloadImages.forEach(function(img) {
				if (img.offsetTop < (window.innerHeight + scrollTop)) {
					if (img.dataset.src != 'undefined') {
						console.log('testbb ' + img.dataset.src);
						img.src = img.dataset.src;
						img.classList.remove('lazy');
					}
				}
			});
		}, 20);
	}

	/*document.addEventListener("scroll", lazyload);
	window.addEventListener("resize", lazyload);
	window.addEventListener("orientationChange", lazyload);*/

	<?php if ($_GET['post_id'] != '') { ?>
		setTimeout(function() {
			jQuery("#post_id_<?php echo $_GET['post_id']; ?>").click();
		}, 1000);
	<?php } ?>


	jQuery(document).ready(function($) {
		jQuery('body').on('click', '.readMoreData', function() {
			var title = jQuery(this).attr('data-title');
			var content = jQuery(this).attr('data-content');
			var image = jQuery(this).attr('data-image');
			var postDate = jQuery(this).attr('data-date');

			jQuery('.featureTitle').html(title);
			jQuery('.featureContent').html(content);
			jQuery('.postDate').html(postDate);
			jQuery('.featureImage').attr('src', image);

			jQuery('html,body').animate({
				scrollTop: jQuery(".featureTitle").offset().top - 200
			}, 'slow');
		});

		var ajaxUrl = "<?php echo admin_url('admin-ajax.php') ?>";

		// What page we are on.
		var page = 1;
		// Post per page
		var ppp = 4;

		var busy = false;

		jQuery("#more_posts").on("click", function() {
			// When btn is pressed.
			jQuery("#more_posts").attr("disabled", true);
			var offset = (page * ppp) + 1;

			var str = '&offset=' + offset + '&ppp=' + ppp + '&action=more_post_ajax';
			jQuery.ajax({
				type: "POST",
				dataType: "html",
				url: ajaxUrl,
				data: str,
				success: function(data) {
					var $data = $(data);
					jQuery('#loader_image').hide();
					if ($data.length) {
						jQuery("#ajax-posts").append($data);
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
			if ((jQuery(window).scrollTop() + jQuery(window).height() > (jQuery("#ajax-posts").height() + 1300)) && !busy) {
				busy = true;
				setTimeout(function() {
					jQuery('#loader_image').show();
					jQuery("#more_posts").click();
				}, 500);
			}
		});

	});
</script>