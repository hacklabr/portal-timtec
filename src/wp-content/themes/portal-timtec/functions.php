<?php
/**
 * portal-timtec functions and definitions
 *
 * @package portal-timtec
 */

define('SLUG', 'portal-timtec');

session_start();

require __DIR__ . '/inc/classes/PrivateFile.php';
require __DIR__ . '/inc/classes/OneToOneMetabox.php';
require __DIR__ . '/inc/classes/OneToManyMetabox.php';
require __DIR__ . '/inc/classes/ManyToManyRelation.php';

require __DIR__ . '/inc/ajax.php';

require __DIR__ . '/inc/post-types/teacher.php';
require __DIR__ . '/inc/post-types/course.php';
//require __DIR__ . '/inc/post-types/installation.php';

require __DIR__ . '/inc/metaboxes/teacher-course-relation.php';
require __DIR__ . '/inc/metaboxes/course-download.php';



if ( ! function_exists( 'portal_timtec_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function portal_timtec_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on portal-timtec, use a find and replace
	 * to change 'portal-timtec' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'portal-timtec', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary Menu', 'portal-timtec' ),
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

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'portal_timtec_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // portal_timtec_setup
add_action( 'after_setup_theme', 'portal_timtec_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function portal_timtec_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'portal_timtec_content_width', 640 );
}
add_action( 'after_setup_theme', 'portal_timtec_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function portal_timtec_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'portal-timtec' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'portal_timtec_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function portal_timtec_scripts() {
	wp_enqueue_style( 'portal-timtec-style', get_stylesheet_uri() );

	wp_enqueue_script( 'portal-timtec-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'portal-timtec-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'portal_timtec_scripts' );

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
