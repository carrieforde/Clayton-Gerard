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
$prefix = ( ! empty( $component ) ) ? 'blocks_' . $count . '_' : '';

// This block's fields.
$heading     = get_post_meta( $post_id, $prefix . 'heading', true );
$text        = get_post_meta( $post_id, $prefix . 'text', true );
$button_text = get_post_meta( $post_id, $prefix . 'button_text', true );
$button_link = get_post_meta( $post_id, $prefix . 'button_link', true );

?>

<section class="content-block-with-button">

	<div class="row">
		<h2 class="heading"><?php echo esc_html( $heading ); ?></h2>
		<div class="content">
			<?php echo wp_kses_post( wpautop( $text ) ); ?>
		</div>
		<a href="<?php echo esc_url( $button_link ); ?>" class="button"><?php echo esc_html( $button_text ); ?></a>
	</div><!-- .row -->
</section>
