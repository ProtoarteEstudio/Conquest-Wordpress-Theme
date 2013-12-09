<?php
/**
 * conquest functions and definitions
 *
 * @package conquest
 */

/**
 * Includes
 */
require_once ('admin/index.php');
require get_template_directory() . '/inc/conquest-menus.php';


/**
 * Enqueue scripts and styles.
 */
function conquest_scripts() {
	wp_enqueue_style( 'conquest-style', get_template_directory_uri() . '/css/conquest.css' );
	wp_enqueue_script( 'menu-accordian', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '1.10.2', true );
	wp_enqueue_script( 'conquest-skip-link-focus-fix', get_template_directory_uri() . '/js/dcjqaccordion.2.6.min.js', array('jquery'), '2.6', true );
	wp_enqueue_script( 'conquest-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'conquest_scripts' );


if ( ! function_exists( 'conquest_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function conquest_setup() {
	load_theme_textdomain( 'conquest', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'conquest_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // conquest_setup
add_action( 'after_setup_theme', 'conquest_setup' );

/**
 * Register widgetized area and update sidebar with default widgets.
 */
function conquest_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'conquest' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'conquest_widgets_init' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/*
 * Add featured image support
 */
add_theme_support( 'post-thumbnails' ); 

/*
 * Define custom image sizes
 */
if ( function_exists( 'add_image_size' ) ) { 
  add_image_size( 'featured-image', 850, 9999 ); //300 pixels wide (and unlimited height)
}

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function conquest_wp_title( $title, $sep ) {
  global $page, $paged;

  if ( is_feed() ) {
    return $title;
  }

  // Add the blog name
  $title .= get_bloginfo( 'name' );

  // Add the blog description for the home/front page.
  $site_description = get_bloginfo( 'description', 'display' );
  if ( $site_description && ( is_home() || is_front_page() ) ) {
    $title .= " $sep $site_description";
  }

  // Add a page number if necessary:
  if ( $paged >= 2 || $page >= 2 ) {
    $title .= " $sep " . sprintf( __( 'Page %s', 'conquest' ), max( $paged, $page ) );
  }

  return $title;
}
add_filter( 'wp_title', 'conquest_wp_title', 10, 2 );


