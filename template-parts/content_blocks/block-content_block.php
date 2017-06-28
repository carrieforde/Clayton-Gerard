<?php
/**
 * Content Block.
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
$bg_color = get_post_meta( $post_id, $prefix . 'background_color', true );
$triangle = get_post_meta( $post_id, $prefix . 'triangle_accent', true );
$content  = get_post_meta( $post_id, $prefix . 'content', true );

?>

<section class="content-block full-width block background-<?php echo esc_attr( $bg_color ); ?><?php echo esc_attr( ( ! empty( $triangle ) ? ' has-triangle' : '' ) ); ?>">
	<div class="row">
		<div class="block__content">
			<?php echo wp_kses_post( wpautop( $content ) ); ?>
		</div>
	</div>
	
	<?php if ( ! empty( $triangle ) ) : ?>
		<div class="accent"></div>
	<?php endif; ?>
</section>
