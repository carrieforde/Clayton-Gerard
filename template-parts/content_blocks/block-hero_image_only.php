<?php
/**
 * Hero with Image Only.
 *
 * @package Clayton Gerard
 */

// Set the post ID if one wasn't passed.
if ( ! $post_id ) {
	$post_id = get_the_ID();
}

// If this is used within flexible contnet, we need to component prefix.
$prefix = ( ! empty( $component ) ) ? 'blocks_' . $count . '_' : '';

// This block's fields.
$image = get_post_meta( $post_id, $prefix . 'image', true );
$image = wp_get_attachment_url( $image, 'full' ); ?>

<section class="hero image-as-background" style="background-image: url( '<?php echo esc_url( $image ); ?>' );"></section>
