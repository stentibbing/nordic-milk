<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Nordic_Milk
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nordic_milk_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	// Add no-sidebar class.
	$classes[] = 'no-sidebar';

	return $classes;
}
add_filter( 'body_class', 'nordic_milk_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function nordic_milk_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'nordic_milk_pingback_header' );
