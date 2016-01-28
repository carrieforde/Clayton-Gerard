<?php
/**
 * Alcatraz Child functions and definitions.
 */

define( 'ALCATRAZ_CHILD_VERSION', '1.0.0' );
define( 'ALCATRAZ_CHILD_PATH', trailingslashit( get_stylesheet_directory() ) );
define( 'ALCATRAZ_CHILD_URL', trailingslashit( get_stylesheet_directory_uri() ) );

add_action( 'wp_enqueue_scripts', 'alcatraz_child_enqueue_scripts' );
/**
 * Enqueue scripts and stylesheets.
 */
function alcatraz_child_enqueue_scripts() {

	// Include this theme's stylesheet.
	wp_enqueue_style(
		'alcatraz-child-style',
		ALCATRAZ_CHILD_URL . '/style.css',
		array(),
		ALCATRAZ_CHILD_VERSION
	);

	// Include this theme's JS.
	wp_enqueue_script(
		'alcatraz-child-scripts',
		ALCATRAZ_CHILD_URL . '/js/alcatraz-clayton-theme.min.js',
		array( 'jquery' ),
		ALCATRAZ_CHILD_VERSION
	);
}

require_once ALCATRAZ_CHILD_PATH . '/inc/template-tags.php';

add_filter( 'mm_social_networks', 'clayton_social_networks' );
/**
 * Filter the list of social networks for Alcatraz Clayton.
 *
 * @param   string  $context  The context to pass to our filter.
 *
 * @return  array             The array of social networks.
 */
function clayton_social_networks() {

	$social_networks = array(
		'facebook'  => __( 'Facebook', 'alcatraz-clayton' ),
		'twitter'   => __( 'Twitter', 'alcatraz-clayton' ),
		'instagram' => __( 'Instagram', 'alcatraz-clayton' ),
		'pinterest' => __( 'Pinterest', 'alcatraz-clayton' ),
		'bloglovin' => __( 'Bloglovin', 'alcatraz-clayton' ),
	);

	return $social_networks;
}
