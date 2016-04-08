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
		ALCATRAZ_CHILD_URL . 'style.css',
		array(),
		ALCATRAZ_CHILD_VERSION
	);

	// Include this theme's JS.
	wp_enqueue_script(
		'alcatraz-child-scripts',
		ALCATRAZ_CHILD_URL . 'js/clayton-gerard-theme.min.js',
		array( 'jquery' ),
		ALCATRAZ_CHILD_VERSION
	);
}

require_once ALCATRAZ_CHILD_PATH . '/inc/template-tags.php';

// Customize the entry footer.
add_action( 'alcatraz_before', function() {
	remove_action( 'alcatraz_entry_footer_inside', 'alcatraz_output_default_entry_footer' );
	add_action( 'alcatraz_entry_footer_inside', 'clayton_gerard_entry_footer' );
	/**
	 * Customize the entry footer.
	 */
	function clayton_gerard_entry_footer( $post_id = 0 ) {

		if ( ! $post_id ) {
			$post_id = get_the_ID();
		}

		$footer_taxonomies = array(
			'category' => __( 'Posted in: ', 'clayton-gerard' )
		);

		foreach ( $footer_taxonomies as $footer_taxonomy => $label ) {
			alcatraz_the_taxonomy_term_list( $post_id, $footer_taxonomy, $label, ', ' );
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a Comment', 'alcatraz' ), esc_html__( '1 Comment', 'alcatraz' ), esc_html__( '% Comments', 'alcatraz' ) );
			echo '</span>';
		}

		alcatraz_the_edit_post_link( $post_id );
	}
} );


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
