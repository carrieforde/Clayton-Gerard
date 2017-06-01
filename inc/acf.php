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
function cf_cg_display_component( $post_id = 0 ) {

	// Get the post id.
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	// Get our data.
	$component = get_post_meta( $post_id, 'blocks', true );

	// Determine which layout to grab.
	foreach ( (array) $component as $count => $component ) {

		switch ( $component ) {

			// Image Hero.
			case 'hero_with_call_to_action' :

				include( locate_template( 'template-parts/content_blocks/block-hero_with_call_to_action.php' ) );
				break;

			case 'content_block_with_button' :

				include( locate_template( 'template-parts/content_blocks/block-content_block_with_button.php' ) );
				break;

			case 'category_block' :

				include( locate_template( 'template-parts/content_blocks/block-category_block.php' ) );
				break;

			case 'latest_posts' :

				include( locate_template( 'template-parts/content_blocks/block-latest_posts.php' ) );
				break;
		}
	}
}
