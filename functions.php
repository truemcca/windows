<?php
/**
 * windows functions and definitions
 *
 * @package windows
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
//if ( ! isset( $content_width ) ) {
	//$content_width = 600px; 
//}

if ( ! function_exists( 'windows_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function windows_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on windows, use a find and replace
	 * to change 'windows' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'windows', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'windows' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	//add_theme_support( 'custom-background', apply_filters( 'windows_custom_background_args', array(
	//	'default-color' => 'ffffff',
	//	'default-image' => '',
	//) ) );
}
endif; // windows_setup
add_action( 'after_setup_theme', 'windows_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function windows_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'windows' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'windows_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function windows_scripts() {
	wp_enqueue_style( 'windows-style', get_stylesheet_uri() );

	wp_enqueue_style ('windows-google-fonts', 'http://fonts.googleapis.com/css?family=PT+Sans+Narrow|PT+Sans+Caption');

	wp_enqueue_script( 'windows-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'windows-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'windows_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

add_action( 'init', 'create_my_post_types' );

function create_my_post_types() {
 register_post_type( 'windows', 
 array(
      'labels' => array(
      	'name' => __( 'windows' ),
      	'singular_name' => __( 'windows' ),
      	'add_new' => __( 'Add New' ),
      	'add_new_item' => __( 'Add new Window' ),
      	'edit' => __( 'Edit' ),
      	'edit_item' => __( 'Edit Descriptions' ),
      	'new_item' => __( 'New Team Member' ),
      	'view' => __( 'View Team Member' ),
      	'view_item' => __( 'View Team Member' ),
      	'search_items' => __( 'Search Team Members' ),
      	'not_found' => __( 'No Team Members found' ),
      	'not_found_in_trash' => __( 'No Team Members found in Trash' ),
      	'parent' => __( 'Parent Team Member' ),
      ),
 'public' => true,
      'menu_position' => 4,
      'rewrite' => array('slug' => 'windows'),
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
      'taxonomies' => array('category', 'post_tag'),
      'publicly_queryable' => true,
      'show_ui' => true,
      'query_var' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
     )
  );
}

