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
		ALCATRAZ_CHILD_URL . '/js/clayton-gerard-theme.min.js',
		array( 'jquery' ),
		ALCATRAZ_CHILD_VERSION
	);
}

require_once ALCATRAZ_CHILD_PATH . '/inc/template-tags.php';

add_filter( 'mm_social_networks', 'clayton_gerard_social_networks' );
/**
 * Filter the list of social networks for Clayton Gerard.
 *
 * @param   string  $context  The context to pass to our filter.
 *
 * @return  array             The array of social networks.
 */
function clayton_gerard_social_networks() {

	$social_networks = array(
		'facebook'  => __( 'Facebook', 'clayton-gerard' ),
		'twitter'   => __( 'Twitter', 'clayton-gerard' ),
		'instagram' => __( 'Instagram', 'clayton-gerard' ),
		'pinterest' => __( 'Pinterest', 'clayton-gerard' ),
		'bloglovin' => __( 'Bloglovin', 'clayton-gerard' ),
	);

	return $social_networks;
}

add_filter( 'post_class', 'clayton_gerard_project_post_class' );
/**
 * Add a custom post class to the projects.
 */
function clayton_gerard_project_post_class( $classes ) {

	$post_type = get_post_type();

	if ( 'portfolio' === $post_type && is_archive() ) {

		$classes[] = 'alcatraz-col-4';
		return $classes;
	}
}

add_filter( 'body_class', 'clayton_gerard_portfolio_body_classes' );
/**
 * Add a custom post class to the portfolio archive.
 */
function clayton_gerard_portfolio_body_classes( $classes ) {

	$post_type = get_post_type();

	if ( 'portfolio' === $post_type && is_archive() ) {

		$classes[] = 'portfolio-archive';
		return $classes;
	}

	if ( 'portfolio' === $post_type && is_singular() ) {

		$classes[] = 'single-portfolio';
		return $classes;
	}
}

// Add new image sizes.
add_image_size( 'full-screen-image', 2560, 986, true );
