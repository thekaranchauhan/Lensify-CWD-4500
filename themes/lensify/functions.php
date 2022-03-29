<?php
/**
 * Lensify functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Lensify
 */

if ( ! defined( 'LENSIFY_VERSION' ) ) {
	// Updating and replacing the site version
	define( 'LENSIFY_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lensify_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Lensify, use a find and replace
		* to change 'lensify' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'lensify', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'menu-primary' => esc_html__( 'Primary', 'lensify' ),
			'menu-store' => esc_html__('Store', 'lensify')
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
add_action( 'after_setup_theme', 'lensify_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lensify_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lensify_content_width', 640 );
}
add_action( 'after_setup_theme', 'lensify_content_width', 0 );

/**
 * Function to determine if the page lists more than one post
 * 
 * @link https://wordpress.stackexchange.com/a/141668
 */
function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag() && 'post' == get_post_type());
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lensify_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'lensify' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'lensify' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'lensify_widgets_init' );

if ( ! function_exists( 'lensify_preload_webfonts' ) ) :

	/* Get font face styles. */
	function lensify_preload_webfonts() {
		?>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<?php
	}
endif;
add_action( 'wp_head', 'lensify_preload_webfonts' );

/**
 * Enqueue scripts and styles.
 */
function lensify_scripts() {

	// Foundations Version 6.7.4
	wp_enqueue_style(
		'foundation-style',
		get_template_directory_uri() . '/assets/css/vendor/foundation.min.css',
		array(),
		'6.7.4'
	);

	wp_enqueue_script(
		'foundation-script',
		get_template_directory_uri() . '/assets/js/vendor/foundation.min.js',
		array( 'jquery', 'what-input-script' ),
		'6.7.4',
		true
	);
	wp_enqueue_style(
		'page-style',
		get_template_directory_uri() . '/assets/css/page-styles.css',
	);
	
	wp_enqueue_style(
		'lensify-style',
		get_stylesheet_uri(),
		array(),
		LENSIFY_VERSION
	);

	wp_enqueue_style(
		'woocommerce-style',
		get_template_directory_uri() . '/assets/css/woocommerce.css',
	);

	wp_enqueue_style(
		'lensify-responsive-style',
		get_template_directory_uri() . '/assets/css/responsive.css',
		array(),
		LENSIFY_VERSION
	);

	wp_enqueue_script(
		'what-input-script',
		get_template_directory_uri() . '/assets/js/vendor/what-input.js',
		array( 'jquery' ),
		'5.2.10',
		true
	);

	if ( is_page( array( 'cart', 'checkout' ) ) ) {
		wp_enqueue_script(
			'lensify-cart-replace-txt-script',
			get_template_directory_uri() . '/assets/js/cart-replacer.js',
			array(),
			null,
			true
		);
	}
	wp_enqueue_script(
		'menu-script',
		get_template_directory_uri() . '/assets/js/menu.js',
		array(),
		null,
		true
	);

	if ( is_product() ) {
		wp_enqueue_script(
			'lensify-product-replace-txt-script',
			get_template_directory_uri() . '/assets/js/product-text-replacer.js',
			array(),
			null,
			true
		);
	}

	if ( is_page( 'checkout' ) ) {
		wp_enqueue_script(
			'lensify-checkout-script',
			get_template_directory_uri() . '/assets/js/checkout.js',
			array(),
			null,
			true
		);
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lensify_scripts' );

/* Custom template tags.*/
require get_template_directory() . '/inc/template-tags.php';

/* Functions which enhance the theme by hooking into WordPress */
require get_template_directory() . '/inc/template-functions.php';

/* Customizer additions*/
require get_template_directory() . '/inc/customizer.php';

/* Block editor. */
require get_template_directory() . '/inc/block-editor.php';

/* Woocommerce. */
require get_template_directory() . '/inc/woocommerce.php';

/* Custom post type. */
require get_template_directory() . '/inc/post-types.php';
