<?php
/**
 * Tusky functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Tusky
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'tusky_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tusky_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Tusky, use a find and replace
		 * to change 'tusky' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tusky', get_template_directory() . '/languages' );

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
		
		/***** ADD IMAGES SIZES ******/
		add_image_size( 'gallery-thumb',800,440, true ); 

		// This theme uses wp_nav_menu() in one location.
		
			register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'tusky' ),
				'social' => esc_html__('Social Links','tusky')
				
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
				'tusky_custom_background_args',
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
add_action( 'after_setup_theme', 'tusky_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tusky_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'tusky_content_width', 640 );
}
add_action( 'after_setup_theme', 'tusky_content_width', 0 );






register_taxonomy( 'discipline', 'Gallery', $args );

function add_custom_taxonomies() {
  // Add new "Locations" taxonomy to Posts
  register_taxonomy('discipline', 'gallery', array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Discipline', 'taxonomy general name' ),
      'singular_name' => _x( 'Discipline', 'taxonomy singular name' ),
      'search_items' =>  __( 'Search Discipline' ),
      'all_items' => __( 'All Discipline' ),
      'parent_item' => __( 'Parent Discipline' ),
      'parent_item_colon' => __( 'Parent Discipline:' ),
      'edit_item' => __( 'Edit Discipline' ),
      'update_item' => __( 'Update Discipline' ),
      'add_new_item' => __( 'Add New Discipline' ),
      'new_item_name' => __( 'New Discipline Name' ),
      'menu_name' => __( 'Disciplines' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'work', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));
}
add_action( 'init', 'add_custom_taxonomies', 0 );

 add_action('init', 'gallery_register');
 
	   function gallery_register() {
 
	$labels = array(
		'name' => __('Gallery', 'post type general name'),
		'singular_name' => __('Gallery Item', 'post type singular name'),
		'add_new' => __('Add New', 'gallery item'),
		'add_new_item' => __('Add New Gallery Item'),
		'edit_item' => __('Edit Gallery Item'),
		'new_item' => __('New Gallery Item'),
		'view_item' => __('View Gallery Item'),
		'search_items' => __('Search Gallery'),
		'not_found' => __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' =>  ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'taxonomies' => array( 'discipline' ),
		'hierarchical' => true,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'gallery' , $args );
}


/**
 * Enqueue scripts and styles.
 */
function tusky_scripts() {
	wp_enqueue_style( 'tusky-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'tusky-style', 'rtl', 'replace' );

	wp_enqueue_script( 'tusky-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tusky_scripts' );

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

