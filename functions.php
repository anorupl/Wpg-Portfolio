<?php
/**
 * WPG theme functions and definitions.
 *
 *
 * @package WPG
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

if ( ! function_exists( 'wpg_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since 1.0.0
 */
function wpg_setup() {

	if ( ! isset( $content_width ) ) {
		$content_width = 1300;
	}
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wpg, use a find and replace
	 * to change 'wpg' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wpg_theme', get_template_directory() . '/languages' );

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
	add_post_type_support( 'attachment:audio', 'thumbnail' );
	add_post_type_support( 'attachment:video', 'thumbnail' );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'header' 			=> esc_html__( 'Header Menu', 'wpg_theme' ),
	));


	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
		'link',
		'image',
		'quote',
		'status',
		'video',
		'audio',
		'chat ',
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

}
add_action( 'after_setup_theme', 'wpg_setup' );
endif; // wpg_setup

/**
 * Image size update for medium large
 *
 * @since 	1.0.0
 *
 */
function wpg_image_size_update() {
	update_option( 'medium_large_size_w', 768 );
	update_option( 'medium_large_size_h', 0 );
}
add_action( 'after_switch_theme', 'wpg_image_size_update' );


/**
 * Enqueue scripts and styles.
 *
 * @since 	1.0.0
 *
 */
function wpg_enqueue() {

	//css
	wp_enqueue_style( 'wpg-style', get_stylesheet_uri() );

	//deregister
	wp_deregister_script( 'jquery' );

	//register
	wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
	wp_register_script('mapa-api', 'https://maps.googleapis.com/maps/api/js?v=3.exp');
	wp_register_script('google-map', get_template_directory_uri() . '/js/plugins/mapa.js', array('jquery'), '20120206', true);

	//enqueue
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/plugins/modernizr.js', 						array('jquery'), '20120206', false );
		// lt IE 9
		wp_enqueue_script( 'html5', get_template_directory_uri() . '/js/plugins/html5.js', 							array('jquery'), '20120206', false );
		wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
	wp_enqueue_script( 'fancybox', 		get_template_directory_uri() . '/js/plugins/magnificPopup.min.js', 				array('jquery'), '20120206', true );
	//wp_enqueue_script( 'jfGallery', 	get_template_directory_uri() . '/js/plugins/jquery.justifiedGallery.min.js', 	array('jquery'), '20120206', true );
	wp_enqueue_script( 'flexslider', 	get_template_directory_uri() . '/js/plugins/flexslider.min.js', 				array('jquery'), '20120206', true );
	wp_enqueue_script( 'wpg-main-js',	get_template_directory_uri() . '/js/main.js', 									array('jquery'), '20120206', true );

	$datalang = array(
	  	'oncontrast' 		=> __('Enable contrast', 'wpg_theme'),
		'offcontrast' 		=> __('Disable Contrast', 'wpg_theme'),

	  	'enable_drag' 		=> __('Enable drag', 'wpg_theme'),
		'disable_drag' 		=> __('Disable drag', 'wpg_theme'),

		'blank' 			=> __('Link opens in a new window', 'wpg_theme'),

		'stop_slideshow' 	=> __('Stop slideshow', 'wpg_theme'),
		'start_slideshow' 	=> __('Start slideshow', 'wpg_theme'),

		'next' 			=> __('Previous Image (left arrow key)', 'wpg_theme'),
		'prev' 			=> __('Next Image (right arrow key)', 'wpg_theme'),
		'of'			=> __('of','wpg_theme'),
		'close' 		=> __('Close (Escape key)', 'wpg_theme'),
		'load' 			=> __('Loading ...', 'wpg_theme'),
		'image' 		=> __('Image', 'wpg_theme'),
		'error_image' 	=> __('it cannot be loaded.', 'wpg_theme'),
		);
  	wp_localize_script( 'wpg-main-js', 'datalanuge', $datalang );


	// Google map && Wpcf7
	if( is_page() && is_page_template() || !is_singular()) {
		if (get_theme_mod('wpg_contact_maps') == true){
			wp_enqueue_script('mapa-api');
			wp_enqueue_script('google-map');
		}

		if ( function_exists( 'wpcf7_enqueue_styles' )) {
	   		wpcf7_enqueue_scripts();
			wpcf7_enqueue_styles();
		}
	}

	// Comment
	if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wpg_enqueue' );


/**
 * Register widget area.
 *
 * @since 	1.0.0
 * @link 	https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 */
function wpg_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wpg_theme' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar 2', 'wpg_theme' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
//add_action( 'widgets_init', 'wpg_widgets_init' );

/*
 * Include file with customizer.
 */
require get_template_directory() . '/inc/customizer/wpg_customizer.php';

/*
 * Include file with custom functions that act independently of the theme.
 */
require get_template_directory() . '/inc/extras.php';

/*
 * Include file with the custom functions that can be used directly in theme file.
 */
require get_template_directory() . '/inc/template-tags.php';
/*
 * Include file with custom functions for post format.
 */
require get_template_directory() . '/inc/fn_post_format.php';
/*
 * Include file with custom shortcode functions.
 */
require get_template_directory() . '/inc/shortcode.php';
/*
 * Include file with filter rwmb_meta_boxes.
 */
require get_template_directory() . '/inc/meta_box.php';




function remove_mods() {
if ( isset($_GET['mods']) && $_GET['mods'] == 'false')
remove_theme_mods();  	
}
add_action('init', 'remove_mods');

?>