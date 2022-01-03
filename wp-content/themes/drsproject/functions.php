<?php
/**
 * drsproject functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package drsproject
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'drsproject_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function drsproject_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on drsproject, use a find and replace
		 * to change 'drsproject' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'drsproject', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'drsproject' ),
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
		add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'drsproject_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function drsproject_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'drsproject_content_width', 640 );
}
add_action( 'after_setup_theme', 'drsproject_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function drsproject_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'drsproject' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'drsproject' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'drsproject_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function drsproject_scripts() {
	wp_enqueue_style( 'drsproject-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'drsproject-style', 'rtl', 'replace' );

	wp_enqueue_script( 'drsproject-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'drsproject_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



// Create section in dashboard of adding custom post.
function drs_team_post() {
	$labels = array(
		'name'				=> _x( 'Team DRS', 'post type general name' ),
		'singular_name'		=> _x( 'Team DRS', 'post type singular name' ),
		'add_new'			=> _x( 'Add New', 'Team' ),
		'add_new_item'		=> __( 'Add New Team' ),
		'edit_item'			=> __( 'Edit Team' ),
		'new_item'			=> __( 'New Team' ),
		'all_items'			=> __( 'All Team' ),
		'view_item'			=> __( 'View Team' ),
		'search_items'		=> __( 'Search Team' ),
		'not_found'			=> __( 'No act team found' ),
		'not_found_in_trash'=> __( 'No act team found in the trash' ),
		'parent_item_colon'	=> '',
		'menu_name'			=> 'Team DRS'
	);
	$args = array(
		'labels'			=> $labels,
		'description'		=> 'Team Members',
		'public'			=> true,
		'menu_position'		=> 5,
		'supports'			=> array( 'title'),
		'has_archive'		=> true,
	);
	register_post_type( 'teamdrs', $args );
}
add_action( 'init', 'drs_team_post' );


// Create Properties post type
function drs_property_post() {
	$labels = array(
		'name'				=> _x( 'Property', 'post type general name' ),
		'singular_name'		=> _x( 'Property', 'post type singular name' ),
		'add_new'			=> _x( 'Add New Property', 'Property' ),
		'add_new_item'		=> __( 'Add New Property' ),
		'edit_item'			=> __( 'Edit Property' ),
		'new_item'			=> __( 'New Property' ),
		'all_items'			=> __( 'All Properties' ),
		'view_item'			=> __( 'View Property' ),
		'search_items'		=> __( 'Search Property' ),
		'not_found'			=> __( 'No property found' ),
		'not_found_in_trash'=> __( 'No property found in the trash' ),
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
	register_post_type( 'aanbod', $args );
}
add_action( 'init', 'drs_property_post' );


function more_post_ajax(){
    $offset = $_POST["offset"];
    $ppp = $_POST["ppp"];

    header("Content-Type: text/html");
    $args = [
        'suppress_filters' => true,
        'post_type' => 'post',
		'post_status'  => 'publish',
        'posts_per_page' => $ppp,
        'offset' => $offset,
    ];

    $loop = new WP_Query($args);

    while ($loop->have_posts()) { $loop->the_post(); 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
        echo '<div class="col-xl-6 col-md-6 col-12 news-img">
				<img src="'.$image[0].'" class="img-fluid lazy" alt="" style="height:300px;">
				<div class="news-box">
					<h4>'.get_the_title().'</h4>
					<p>'.get_the_content().'</p>
					<a href="void:javascript(0);" class="btn-clr readMoreData" data-title="'.get_the_title().'" data-content="'.get_the_content().'" data-image="'.$image[0].'">verder lezen <img src="'.get_stylesheet_directory_uri().'/images/white-arrow.svg" alt=""></a>
				</div>
			</div>';
    }
    exit; 
}


add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax'); 
add_action('wp_ajax_more_post_ajax', 'more_post_ajax');

function more_properties_ajax(){
    $offset = $_POST["offset"];
    $ppp = $_POST["ppp"];

    header("Content-Type: text/html");
    $args = [
        'suppress_filters' => true,
        'post_type' => 'aanbod',
		'post_status'  => 'publish',
        'posts_per_page' => $ppp,
        'offset' => $offset,
    ];

    $loop = new WP_Query($args);

    while ($loop->have_posts()) { $loop->the_post(); 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
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
    exit; 
}


add_action('wp_ajax_nopriv_more_properties_ajax', 'more_properties_ajax'); 
add_action('wp_ajax_more_properties_ajax', 'more_properties_ajax');

function remoteCURL ($url) {
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

function import_properties_data(){
	$url_bog = 'https://api.realworks.nl/bog/v1/objecten';
	//$url_makelaars = 'https://api.realworks.nl/makelaars/v1';

	$response_bog = remoteCURL($url_bog);

	$response_bog_arr = json_decode($response_bog);

	echo "<br>Bog API Response:";
	echo '<pre>';
	print_r($response_bog_arr);
	die;
	
	$propertiesData = $response_bog_arr->resultaten;
	
	foreach($propertiesData as $propertyData){
		$id = $propertyData->id;
		$straat = $propertyData->straat;
		$huisnummer = $propertyData->huisnummer;
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
		$servicekosten = $financieelData->servicekosten;
		$aanvaarding = ucfirst(strtolower(str_replace('_', ' ', $financieelData->aanvaarding)));
		$aanvaardingsdatum = $financieelData->aanvaardingsdatum;
		$servicekostenconditie = ucfirst(strtolower(str_replace('_', ' ', $financieelData->servicekostenconditie)));
		
		//For rent
		//if($aanmeldingsreden == 'IN_VERHUUR_GENOMEN'){
		$huurprijsvoorvoegsel = ucfirst(strtolower(str_replace('_', ' ', $financieelData->huurprijsvoorvoegsel)));
		$huurprijs = $financieelData->huurprijs;
		$verhuurprijsconditie = ucfirst(strtolower(str_replace('_', ' ', $propertyData->financieel->overdracht->transactie->verhuurprijsconditie)));
		//}
		
		$aanbiedingstekst = $propertyData->teksten->aanbiedingstekst;
		$accountmanager = $propertyData->relaties->accountmanager;
		
		
		
		$post_data = array(
			'post_title'    => $straat . ' ' . $huisnummer . ' ' . $plaats,
			'post_content'  => $aanbiedingstekst,
			'post_type'     => 'aanbod',
			'post_status'   => 'publish'
		);
		
		$post_id = wp_insert_post( $post_data );
		
		$mimetype = $propertyData->media[0]->mimetype;
		$file_temp = $propertyData->media[0]->link;
		$fileName  = explode('/media.objectmedia/', $file_temp);
		$fileName  = explode('.', $fileName[1]);
		$fileExt  = explode('?', $fileName[1]);
		
		$file_name = strtolower($straat).time().'.'.$fileExt[0];
		$fileTemp = $file_temp . '&resize=4';
		
		storeImages($fileTemp, $file_name, $mimetype, $post_id);

		update_field( 'rw_property_id', $id, $post_id );
		
		update_field( 'adres', $straat, $post_id );
		update_field( 'huisnummer', $huisnummer, $post_id );
		update_field( 'postcode', $postcode, $post_id );
		update_field( 'plaats', $plaats, $post_id );
		//update_field( 'wijk', '', $post_id );
		
		update_field( 'hoofdfunctie', $hoofdfunctie, $post_id );
		update_field( 'status', $status, $post_id );
		update_field( 'aanvaarding', $aanvaarding, $post_id );
		update_field( 'aanvaardingsdatum', $aanvaardingsdatum, $post_id );
		update_field( 'beschikbaar', '', $post_id );
		update_field( 'oppervlakte', $oppervlakte, $post_id );
		update_field( 'in_units_vanaf', $unitsVanaf, $post_id );
		update_field( 'aantal_verdiepingen', $aantalVerdiepingen, $post_id );
		update_field( 'naam_gebouw', $gebouwnaam, $post_id );
		update_field( 'bouwjaar', '', $post_id );
		
		update_field( 'accountmanager', $accountmanager, $post_id );
		update_field( 'achternaam', '', $post_id );
		update_field( 'roepnaam', '', $post_id );
		update_field( 'e-mail', '', $post_id );
		update_field( 'mobiel', '', $post_id );
		update_field( 'tel_werk', '', $post_id );
		
		//update_field( 'aanbiedingstekst', $aanbiedingstekst, $post_id );
		//update_field( 'andere_fotos', '', $post_id );
		
		update_field( 'aanmelding_verkoop_verhuur', $aanmeldingsreden, $post_id );
		update_field( 'transactie_status', '', $post_id );
		update_field( 'voor_koop', $koopprijsvoorvoegsel, $post_id );
		update_field( 'koopsom_excl_btw', $koopprijs, $post_id );
		update_field( 'conditie_koopsom', $koopconditie, $post_id );
		update_field( 'servicekosten', $servicekosten, $post_id );
		update_field( 'conditie_servicekosten_sold', $servicekostenconditie, $post_id );
		update_field( 'voor_huur', $huurprijsvoorvoegsel, $post_id );
		update_field( 'huurprijs_excl_btw', $huurprijs, $post_id );
		update_field( 'conditie_huurprijs', $verhuurprijsconditie, $post_id );
		update_field( 'conditie_servicekosten_rent', $servicekostenconditie, $post_id );
	}
	die;
}

add_action('wp_ajax_nopriv_import_properties_data', 'import_properties_data'); 
add_action('wp_ajax_import_properties_data', 'import_properties_data');


function storeImages($file_temp, $filename, $mimetype, $post_id){
	$upload_dir = wp_upload_dir();
	$image_data = file_get_contents( $file_temp );

	if ( wp_mkdir_p( $upload_dir['path'] ) ) {
	  $file = $upload_dir['path'] . '/' . $filename;
	}
	else {
	  $file = $upload_dir['basedir'] . '/' . $filename;
	}

	file_put_contents( $file, $image_data );
	
	$attachment = array(
	  'post_mime_type' => $mimetype,
	  'post_title' => sanitize_file_name( $filename ),
	  'post_content' => '',
	  'post_status' => 'inherit'
	);

	$attach_id = wp_insert_attachment( $attachment, $file, $post_id );
	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	$attach_data = wp_generate_attachment_metadata( $attach_id, $file );
	wp_update_attachment_metadata( $attach_id, $attach_data );
	set_post_thumbnail( $post_id, $attach_id );
}