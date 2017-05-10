<?php
/**
 * Clayton Gerard ACF
 *
 * @package Clayton Gerard
 */
/**
 * Display the Flexible Content Rows.
 *
 * @author Carrie Forde
 */
function ac_component_flexible_content_rows() {

	if ( ! function_exists( 'get_sub_field' ) ) {
		return;
	}

	if ( have_rows( 'blocks' ) ) {

		while ( have_rows( 'blocks' ) ) {

			the_row();
			get_template_part( 'template-parts/content_blocks/block', get_row_layout() );

			// var_dump( get_row_layout() );
		}
	}

	wp_reset_postdata();
}
