<?php
/**
 * Content Block with Button
 *
 * @package Clayton Gerard
 */

// Set the post ID if one wasn't passed.
if ( ! $post_id ) {
	$post_id = get_the_ID();
}

// If this is used within flexible contnet, we need to component prefix.
$prefix    = ( ! empty( $component ) ) ? 'blocks_' . $count . '_' : '';

?>

<section class="content-block-with-button"></section>
