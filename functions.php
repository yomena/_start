<?php
/**
 * _start functions and definitions
 *
 * @package _start
 */

if ( ! function_exists( '_start_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function _start_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _start, use a find and replace
	 * to change '_start' to the name of your theme in all the template files
	 */
	load_theme_textdomain( '_start', get_template_directory() . '/languages' );

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
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', '_start' ),
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

	/*
	* Enable support for Post Thumbnails.
	* See http://codex.wordpress.org/Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( '_start_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // _start_setup
add_action( 'after_setup_theme', '_start_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */


/**
 * Enqueue scripts and styles.
 */
function _start_scripts() {

	wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.min.css', false, ‘all’ );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.min.js', array(), true );

	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), true );

	wp_enqueue_style( '_start-style', get_stylesheet_uri() );

	wp_enqueue_script( '_start-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_start_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
* Register Sidebars
*/
require get_template_directory() . '/inc/widget-areas.php';

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

/**
* Navwalker for Bootstrap Navigation
*/
require_once get_template_directory() . '/inc/wp_bootstrap_navwalker.php';


/**
* Bootstrap Forms
*/
require get_template_directory() . '/inc/bootstrap-forms.php';


/**
* Pagination
*/
require get_template_directory() . '/inc/pagination.php';

/**
* Bootstrap Commentlist
*/
require get_template_directory() . '/inc/commentlist.php';
