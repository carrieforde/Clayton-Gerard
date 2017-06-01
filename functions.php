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

	// Google fonts.
	wp_register_style(
		'claytongerard-fonts',
		str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Montserrat:600,700|Open+Sans:400,400i,600,600i' ),
		ALCATRAZ_CHILD_VERSION
	);

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

require_once ALCATRAZ_CHILD_PATH . '/inc/acf.php';
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
			'category' => __( 'Posted in: ', 'clayton-gerard' ),
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

add_action( 'gform_pre_render', 'cf_cg_set_gravity_forms_chosen_options' );
/**
 * Pass Chosen options to the form.
 *
 * @since 1.2.0
 *
 * @param  $form  The form.
 * @return        The Chosen JS options.
 */
function cf_cg_set_gravity_forms_chosen_options( $form ) {

	?>

	<script type="text/javascript">

		gform.addFilter('gform_chosen_options', 'set_chosen_options_js' );

		// Disable the search
		function set_chosen_options_js( options, element ) {
			options.disable_search = 'true';

			return options;
		}

	</script>

	<?php return $form;
}

// Add new image sizes.
add_image_size( 'full-screen-image', 2560, 986, true );
