<?php
/**
 * shopquanao functions and definitions
 *
 * @package Niteco
 * @subpackage shopquanao
 * @since shopquanao 1.0
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * shopquanao setup.
 */
function shopquanao_setup() {
	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();
	
	// Add Bootstrap support
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap.min.css' );
	
	// Disable Admin bar on frontend
	show_admin_bar( false );

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu' ) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
}
add_action( 'after_setup_theme', 'shopquanao_setup' );


/**
 * Filter the page title.
 *
 */
function shopquanao_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'shopquanao_wp_title', 10, 2 );

/**
 * Register sidebars.
 */
function shopquanao_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Home Header 1' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on Homepage below Logo & Navigation Menu' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Home Header 2' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears on Homepage below Home Header 1' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Home Before Footer' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears on Homepage Before Black Footer' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'shopquanao_widgets_init' );