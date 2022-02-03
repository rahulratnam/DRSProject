<?php

/**
 * drsproject functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package drsproject
 */

add_filter('use_block_editor_for_post', '__return_false');


if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

if (!function_exists('drsproject_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function drsproject_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on drsproject, use a find and replace
		 * to change 'drsproject' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('drsproject', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__('Primary', 'drsproject'),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'drsproject_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'drsproject_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function drsproject_content_width()
{
	$GLOBALS['content_width'] = apply_filters('drsproject_content_width', 640);
}
add_action('after_setup_theme', 'drsproject_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function drsproject_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'drsproject'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'drsproject'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'drsproject_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function drsproject_scripts()
{
	wp_enqueue_style('drsproject-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('drsproject-style', 'rtl', 'replace');

	wp_enqueue_script('drsproject-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'drsproject_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}



// Create section in dashboard of adding custom post.
function drs_team_post()
{
	$labels = array(
		'name'				=> _x('Team DRS', 'post type general name'),
		'singular_name'		=> _x('Team DRS', 'post type singular name'),
		'add_new'			=> _x('Add New', 'Team'),
		'add_new_item'		=> __('Add New Team'),
		'edit_item'			=> __('Edit Team'),
		'new_item'			=> __('New Team'),
		'all_items'			=> __('All Team'),
		'view_item'			=> __('View Team'),
		'search_items'		=> __('Search Team'),
		'not_found'			=> __('No act team found'),
		'not_found_in_trash' => __('No act team found in the trash'),
		'parent_item_colon'	=> '',
		'menu_name'			=> 'Team DRS'
	);
	$args = array(
		'labels'			=> $labels,
		'description'		=> 'Team Members',
		'public'			=> true,
		'menu_position'		=> 5,
		'supports'			=> array('title'),
		'has_archive'		=> true,
	);
	register_post_type('teamdrs', $args);
}
add_action('init', 'drs_team_post');


// Create Properties post type
function drs_property_post()
{
	$labels = array(
		'name'				=> _x('Property', 'post type general name'),
		'singular_name'		=> _x('Property', 'post type singular name'),
		'add_new'			=> _x('Add New Property', 'Property'),
		'add_new_item'		=> __('Add New Property'),
		'edit_item'			=> __('Edit Property'),
		'new_item'			=> __('New Property'),
		'all_items'			=> __('All Properties'),
		'view_item'			=> __('View Property'),
		'search_items'		=> __('Search Property'),
		'not_found'			=> __('No property found'),
		'not_found_in_trash' => __('No property found in the trash'),
		'parent_item_colon'	=> '',
		'menu_name'			=> 'Property'
	);
	$args = array(
		'labels'			=> $labels,
		'description'		=> 'RW Properties Data',
		'public'			=> true,
		'menu_position'		=> 5,
		'supports'			=> array('title', 'editor', 'thumbnail'),
		'has_archive'		=> true,
	);
	register_post_type('aanbod', $args);
}
add_action('init', 'drs_property_post');


function more_post_ajax()
{
	$offset = $_POST["offset"];
	$ppp = $_POST["ppp"];

	header("Content-Type: text/html");
	$args = [
		'suppress_filters' => true,
		'post_type' => 'post',
		'post_status'  => 'publish',
		'order'          => 'DESC',
		'orderby'    	=> 'publish',
		'posts_per_page' => $ppp,
		'offset' => $offset,
	];

	$loop = new WP_Query($args);

	while ($loop->have_posts()) {
		$loop->the_post();
		$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
		$postDate = get_the_date( 'd F Y' );
		if (has_post_thumbnail()) {
			$imageFile = $image[0];
		} else { 
			$imageFile = get_stylesheet_directory_uri().'/images/placeholder-drs.webp';
		}
		echo '<div class="col-xl-6 col-md-6 col-12 news-img">
				<img src="' . $imageFile . '" class="main-img lazy" alt="">
				<div class="news-box">
					<h4>' . get_the_title() . '</h4>
					<p>' . get_field('short-description') . '</p>
					<a href="void:javascript(0);" class="btn-clr readMoreData" data-title="' . get_the_title() . '" data-content="' . get_the_content() . '" data-image="' . $imageFile . '" data-date="'.$postDate.'">verder lezen <img src="' . get_stylesheet_directory_uri() . '/images/white-arrow.svg" alt=""></a>
				</div>
			</div>';
	}
	exit;
}


add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');


///// Load more properties data /////
function more_properties_ajax()
{
	$offset = $_POST["offset"];
	$ppp = $_POST["ppp"];

	$min_vloer = $_POST["min_vloer"];
	$max_vloer = $_POST["max_vloer"];

	$aanbod_type = $_POST["aanbod_type"];

	$aanbodType = explode(' ', $aanbod_type);

	foreach ($aanbodType as $aanbodTD) {
		if ($aanbodTD != '') {
			$aanbodData[] = array(
				'key'     => 'aanmelding_verkoop_verhuur',
				'value'   => $aanbodTD,
				'compare' => 'LIKE'
			);
		}
	}

	$sub = array('relation' => 'AND');

	$sub[] = array(
		'key'     => 'in_units_vanaf',
		'value'   => $min_vloer,
		'compare' => '>=',
		'type'    => 'NUMERIC'
	);

	$sub[] = array(
		'key'     => 'in_units_vanaf',
		'value'   => $max_vloer,
		'compare' => '<=',
		'type'    => 'NUMERIC'
	);

	header("Content-Type: text/html");
	$args = [
		'suppress_filters' => true,
		'post_type' => 'aanbod',
		'post_status'  => 'publish',
		'posts_per_page' => $ppp,
		'offset' => $offset,
	];

	if (count($aanbodType) > 0) {
		$args['meta_query'] = $aanbodData;
	}

	if ($min_vloer != '' && $max_vloer != '' && count($aanbodType) <= 0) {
		$args['meta_query'] = '';
		$args['meta_query'] = $sub;
	} else if ($min_vloer != '' && $max_vloer != '' && count($aanbodType) > 0) {
		$args['meta_query'] = '';
		$sub[] = $aanbodData;
		$args['meta_query'] = $sub;
	}
	
	if ($_POST['search_property'] != '') {
		$sub = '';
		$sub = array('relation' => 'OR');
	
		$sub[] = array(
			'key'     => 'adres',
			'value'   => $_POST['search_property'],
			'compare' => 'LIKE'
		);

		$sub[] = array(
			'key'     => 'huisnummer',
			'value'   => $_POST['search_property'],
			'compare' => 'LIKE'
		);
		
		$sub[] = array(
			'key'     => 'plaats',
			'value'   => $_POST['search_property'],
			'compare' => 'LIKE'
		);
		
		$args['meta_query'] = $sub;
	}

	$loop = new WP_Query($args);

	while ($loop->have_posts()) {
		$loop->the_post();
		$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
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
	exit;
}

add_action('wp_ajax_nopriv_more_properties_ajax', 'more_properties_ajax');
add_action('wp_ajax_more_properties_ajax', 'more_properties_ajax');


function filter_properties_ajax()
{
	$min_vloer = $_POST["min_vloer"];
	$max_vloer = $_POST["max_vloer"];
	$aanbod_type = $_POST["aanbod_type"];

	$aanbodType = explode(' ', $aanbod_type);

	foreach ($aanbodType as $aanbodTD) {
		if ($aanbodTD != '') {
			$aanbodData[] = array(
				'key'     => 'aanmelding_verkoop_verhuur',
				'value'   => $aanbodTD,
				'compare' => 'LIKE'
			);
		}
	}

	header("Content-Type: text/html");

	$sub = array('relation' => 'AND');

	$sub[] = array(
		'key'     => 'in_units_vanaf',
		'value'   => $min_vloer,
		'compare' => '>=',
		'type'    => 'NUMERIC'
	);

	$sub[] = array(
		'key'     => 'in_units_vanaf',
		'value'   => $max_vloer,
		'compare' => '<=',
		'type'    => 'NUMERIC'
	);

	$args = [
		'suppress_filters' => true,
		'post_type' => 'aanbod',
		'post_status'  => 'publish'
	];

	if (count($aanbodType) > 0) {
		$args['meta_query'] = $aanbodData;
	}

	if ($min_vloer != '' && $max_vloer != '' && count($aanbodType) <= 0) {
		$args['meta_query'] = '';
		$args['meta_query'] = $sub;
	} else if ($min_vloer != '' && $max_vloer != '' && count($aanbodType) > 0) {
		$args['meta_query'] = '';
		$sub[] = $aanbodData;
		$args['meta_query'] = $sub;
	}

	$loop = new WP_Query($args);
	$totalPro = $loop->found_posts;
	
	$k = 1;
	while ($loop->have_posts()) {
		$loop->the_post();
		$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
		if($k <= 6){
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
		<script>
		jQuery('.totalPropertiesNo').html('<?php echo $totalPro; ?>');
		</script>
	<?php
		$k++;
		}
	}
	exit;
}

add_action('wp_ajax_nopriv_filter_properties_ajax', 'filter_properties_ajax');
add_action('wp_ajax_filter_properties_ajax', 'filter_properties_ajax');



function search_properties_ajax()
{				
	$sub = array('relation' => 'OR');
	
	$sub[] = array(
		'key'     => 'adres',
		'value'   => $_POST['search_property'],
		'compare' => 'LIKE'
	);

	$sub[] = array(
		'key'     => 'huisnummer',
		'value'   => $_POST['search_property'],
		'compare' => 'LIKE'
	);
	
	$sub[] = array(
		'key'     => 'plaats',
		'value'   => $_POST['search_property'],
		'compare' => 'LIKE'
	);
	
	$args1 = [
		'suppress_filters' => true,
		'post_type' => 'aanbod',
		'post_status'  => 'publish',
		'posts_per_page' => -1
	];
	
	if($_POST['search_property'] != ''){
		$args1['meta_query'] = $sub;
	}
	$query = new WP_Query( $args1 );
	$totalPro = $query->found_posts;

	header("Content-Type: text/html");
	$args = [
		'suppress_filters' => true,
		'post_type' => 'aanbod',
		'post_status'  => 'publish',
		'posts_per_page' => 6
	];
	
	if($_POST['search_property'] != ''){
		$args['meta_query'] = $sub;
	}
	
	$loop = new WP_Query($args);

	while ($loop->have_posts()) {
		$loop->the_post();
		$image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
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
		<script>
		jQuery('.totalPropertiesNo').html('<?php echo $totalPro; ?>');
		</script>
<?php
	}
	exit;
}

add_action('wp_ajax_nopriv_search_properties_ajax', 'search_properties_ajax');
add_action('wp_ajax_search_properties_ajax', 'search_properties_ajax');




function remoteCURL($url)
{
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
		CURLOPT_HTTPHEADER => array(
			'Authorization: rwauth 8a11c153-6b09-4cd3-895d-f0da02cba8ad'
		)
	));

	$response = curl_exec($curl);

	curl_close($curl);
	return $response;
}

function import_properties_data()
{
	ini_set('output_buffering', 0);
	ini_set('implicit_flush', 1);
	ini_set('memory_limit', '128M');
	ini_set('max_execution_time', 3600);
	ini_set('max_input_time', 3600);


	$url_bog = 'https://api.realworks.nl/bog/v1/objecten';
	//$url_makelaars = 'https://api.realworks.nl/makelaars/v1';

	$response_bog = remoteCURL($url_bog);

	$response_bog_arr = json_decode($response_bog);

	echo "<br>Bog API Response:";
	echo '<pre>';
	print_r($response_bog_arr);
	die;

	$propertiesData = $response_bog_arr->resultaten;

	foreach ($propertiesData as $key=>$propertyData) {
		//if($key < 75){
			$id = $propertyData->id;
			$straat = $propertyData->straat;
			$huisnummer = $propertyData->huisnummer;
			$huisnummer = $huisnummer == 0 ? '' : $huisnummer;
			$postcode = $propertyData->postcode;
			$plaats = ucfirst(strtolower($propertyData->plaats));

			$status = ucfirst(strtolower($propertyData->status));

			$hoofdfunctie = ucfirst(strtolower($propertyData->kenmerken->hoofdfunctie));

			$financieelData = $propertyData->financieel->overdracht->koopEnOfHuur;

			$oppervlakte = $propertyData->object->functies[0]->kantoorruimte->oppervlakte;
			$unitsVanaf = $propertyData->object->functies[0]->kantoorruimte->unitsVanaf;
			$aantalVerdiepingen = $propertyData->object->functies[0]->kantoorruimte->aantalVerdiepingen;

			$gebouwnaam = $propertyData->gebouwdetails->gebouwnaam;
			$bouwjaar = $propertyData->gebouwdetails->bouwjaar->bouwjaar1;

			$aanmeldingsreden = ucfirst(strtolower(str_replace('_', ' ', $financieelData->aanmeldingsreden)));
			$koopprijsvoorvoegsel = $financieelData->koopprijsvoorvoegsel;
			$koopprijs = $financieelData->koopprijs;
			$koopconditie = $financieelData->koopconditie;
			$servicekostenconditie = $financieelData->servicekostenconditie;
			$huurconditie = $financieelData->huurconditie;
			$servicekosten = $financieelData->servicekosten;
			$aanvaarding = ucfirst(strtolower(str_replace('_', ' ', $financieelData->aanvaarding)));
			$aanvaardingsdatum = $financieelData->aanvaardingsdatum;

			if ($servicekostenconditie == 'PER_VIERKANTE_METERS_PER_JAAR') {
				$servicekostenconditie = 'Per m2 per jaar';
			} else if ($servicekostenconditie == 'PER_MAAND') {
				$servicekostenconditie = 'Per maand';
			} else if ($servicekostenconditie == 'PER_JAAR') {
				$servicekostenconditie = 'Per jaar';
			}
			
			if ($huurconditie == 'PER_VIERKANTE_METERS_PER_JAAR') {
				$huurconditie = 'Per m2 per jaar';
			} else if ($huurconditie == 'PER_MAAND') {
				$huurconditie = 'Per maand';
			} else if ($huurconditie == 'PER_JAAR') {
				$huurconditie = 'Per jaar';
			}

			//For rent
			//if($aanmeldingsreden == 'IN_VERHUUR_GENOMEN'){
			$huurprijsvoorvoegsel = ucfirst(strtolower(str_replace('_', ' ', $financieelData->huurprijsvoorvoegsel)));
			$huurprijs = $financieelData->huurprijs;
			$verhuurprijsconditie = $propertyData->financieel->overdracht->transactie->verhuurprijsconditie;

			if ($verhuurprijsconditie == 'PER_VIERKANTE_METERS_PER_JAAR') {
				$verhuurprijsconditie = 'Per m2 per jaar';
			} else if ($verhuurprijsconditie == 'PER_MAAND') {
				$verhuurprijsconditie = 'Per maand';
			} else if ($verhuurprijsconditie == 'PER_JAAR') {
				$verhuurprijsconditie = 'Per jaar';
			}
			//}

			$aanbiedingstekst = $propertyData->teksten->aanbiedingstekst;
			$accountmanager = $propertyData->relaties->accountmanager;


			if ($koopconditie == 'KOSTEN_KOPER') {
				$koopconditie = 'Kosten koper';
			} else if ($koopconditie == 'VRIJ_OP_NAAM') {
				$koopconditie = 'Vrij op naam';
			}

			$postID = get_post_id_by_meta_key_and_value('rw_property_id', $id);

			$imageG = array();

			//if($id == '345699'){
			if ($postID === false) {

				$post_data = array(
					'post_title'    => $straat . ' ' . $huisnummer . ' ' . $plaats,
					'post_content'  => $aanbiedingstekst,
					'post_type'     => 'aanbod',
					'post_status'   => 'publish'
				);

				$post_id = wp_insert_post($post_data);

				$imagesData = $propertyData->media;
				
				$sortImageIndex = sortImageIndex($imagesData, "volgnummer");
				
				/*echo '<pre>';
				print_r($imagesData);
				print_r($sortImageIndex);
				echo '</pre>'; die;*/

				foreach ($imagesData as $key => $imageData) {
					$file_temp = '';
					$fileName = '';
					$fileExt = '';
					if ($imageData->soort == 'HOOFDFOTO') {
						$mimetype = $imageData->mimetype;
						$file_temp = $imageData->link;
						$fileName  = explode('/media.objectmedia/', $file_temp);
						$fileName  = explode('.', $fileName[1]);
						$fileExt  = explode('?', $fileName[1]);
						
						$imageId = $fileName[0];
						if($fileName[1] == ''){
							$fileExt1  = explode('?', $fileName[0]);
							$imageId = $fileExt1[0];
						}

						$fileExt = $fileName[1] == '' ? 'jpg' : $fileExt[0];

						$file_name = $imageId . '_' . strtolower($straat) . '_'  . time() . '.' . $fileExt;
						
						$fileTemp = $file_temp . '&resize=4';

						storeImages($fileTemp, $file_name, $mimetype, $post_id);
					} else if ($imageData->soort == 'FOTO') {
						$mimetype = $imageData->mimetype;
						$file_temp = $imageData->link;
						$fileName  = explode('/media.objectmedia/', $file_temp);
						$fileName  = explode('.', $fileName[1]);
						$fileExt  = explode('?', $fileName[1]);
						
						$imageId = $fileName[0];
						if($fileName[1] == ''){
							$fileExt1  = explode('?', $fileName[0]);
							$imageId = $fileExt1[0];
						}

						$fileExt = $fileName[1] == '' ? 'jpg' : $fileExt[0];

						$file_name = $imageId . '_' . strtolower($straat) . '_'  . time() . '.' . $fileExt;
						
						$fileTemp = $file_temp . '&resize=4';

						$attachID = storeGImages($fileTemp, $file_name, $mimetype, $post_id);
						if($attachID > 0 ){
							$imageG[] = $attachID;
						}
					}
				}
			} else {

				$post_id = $postID;
			}

			if ($post_id > 0) {

				update_field('rw_property_id', $id, $post_id);

				update_field('adres', $straat, $post_id);
				update_field('huisnummer', $huisnummer, $post_id);
				update_field('postcode', $postcode, $post_id);
				update_field('plaats', $plaats, $post_id);
				//update_field( 'wijk', '', $post_id );

				update_field('hoofdfunctie', $hoofdfunctie, $post_id);
				update_field('status', $status, $post_id);
				update_field('aanvaarding', $aanvaarding, $post_id);
				update_field('aanvaardingsdatum', $aanvaardingsdatum, $post_id);
				update_field('beschikbaar', '', $post_id);
				update_field('oppervlakte', $oppervlakte, $post_id);
				update_field('in_units_vanaf', $unitsVanaf, $post_id);
				update_field('aantal_verdiepingen', $aantalVerdiepingen, $post_id);
				update_field('naam_gebouw', $gebouwnaam, $post_id);
				update_field('bouwjaar', '', $post_id);

				update_field('accountmanager', $accountmanager, $post_id);
				update_field('achternaam', '', $post_id);
				update_field('roepnaam', '', $post_id);
				update_field('e-mail', '', $post_id);
				update_field('mobiel', '', $post_id);
				update_field('tel_werk', '', $post_id);

				//update_field( 'aanbiedingstekst', $aanbiedingstekst, $post_id );
				//update_field( 'andere_fotos', '', $post_id );

				update_field('aanmelding_verkoop_verhuur', $aanmeldingsreden, $post_id);
				update_field('transactie_status', '', $post_id);
				update_field('voor_koop', $koopprijsvoorvoegsel, $post_id);
				update_field('koopsom_excl_btw', $koopprijs, $post_id);
				update_field('conditie_koopsom', $koopconditie, $post_id);
				update_field('servicekosten', $servicekosten, $post_id);
				//update_field( 'conditie_koopsom', $servicekostenconditie, $post_id );
				update_field('voor_huur', $huurprijsvoorvoegsel, $post_id);
				update_field('huurprijs_excl_btw', $huurprijs, $post_id);
				//update_field('conditie_huurprijs', $verhuurprijsconditie, $post_id);
				update_field('conditie_huurprijs', $huurconditie, $post_id);
				update_field('conditie_servicekosten_rent', $servicekostenconditie, $post_id);

				if (count($imageG) > 0) {
					update_field('andere_fotos', $imageG, $post_id);
				}
			//}
		}
	}
	die;
}

add_action('wp_ajax_nopriv_import_properties_data', 'import_properties_data');
add_action('wp_ajax_import_properties_data', 'import_properties_data');


function storeImages($file_temp, $filename, $mimetype, $post_id)
{
	$upload_dir = wp_upload_dir();
	$image_data = file_get_contents($file_temp);

	if (wp_mkdir_p($upload_dir['path'])) {
		$file = $upload_dir['path'] . '/' . $filename;
	} else {
		$file = $upload_dir['basedir'] . '/' . $filename;
	}

	file_put_contents($file, $image_data);

	$attachment = array(
		'post_mime_type' => $mimetype,
		'post_title' => sanitize_file_name($filename),
		'post_content' => '',
		'post_status' => 'inherit'
	);

	$attach_id = wp_insert_attachment($attachment, $file, $post_id);
	require_once(ABSPATH . 'wp-admin/includes/image.php');
	$attach_data = wp_generate_attachment_metadata($attach_id, $file);
	wp_update_attachment_metadata($attach_id, $attach_data);
	set_post_thumbnail($post_id, $attach_id);
}

function storeGImages($file_temp, $filename, $mimetype, $post_id)
{
	$upload_dir = wp_upload_dir();
	$image_data = file_get_contents($file_temp);

	if (wp_mkdir_p($upload_dir['path'])) {
		$file = $upload_dir['path'] . '/' . $filename;
	} else {
		$file = $upload_dir['basedir'] . '/' . $filename;
	}

	file_put_contents($file, $image_data);

	$attachment = array(
		'post_mime_type' => $mimetype,
		'post_title' => sanitize_file_name($filename),
		'post_content' => '',
		'post_status' => 'inherit'
	);

	$attach_id = wp_insert_attachment($attachment, $file, $post_id);
	require_once(ABSPATH . 'wp-admin/includes/image.php');
	if($attach_id > 0){
		$attach_data = wp_generate_attachment_metadata($attach_id, $file);
		wp_update_attachment_metadata($attach_id, $attach_data);
		//set_post_thumbnail( $post_id, $attach_id );
		return $attach_id;
	}else{
		return 0;
	}
}

function get_post_id_by_meta_key_and_value($key, $value)
{
	global $wpdb;
	$meta = $wpdb->get_results("SELECT * FROM `" . $wpdb->postmeta . "` WHERE meta_key='" . $wpdb->escape($key) . "' AND meta_value='" . $wpdb->escape($value) . "'");
	if (is_array($meta) && !empty($meta) && isset($meta[0])) {
		$meta = $meta[0];
	}
	if (is_object($meta)) {
		return $meta->post_id;
	} else {
		return false;
	}
}

function callSubText($subWord){
	return str_replace('m2', 'm<sup>2</sup>', $subWord);
}

function euroNumberFormat($value){
	return number_format($value, 0, ',', '.');
}


function sortImageIndex(&$array, $key) {
	echo 'dd'; die;
    /*$sorter = array();
    $ret = array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii] = $va[$key];
    }
    asort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii] = $array[$ii];
    }
   return $ret;*/
}
