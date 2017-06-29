<?php
/**
 * Latest Projects block.
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
$heading         = get_post_meta( $post_id, $prefix . 'heading', true );
$number_of_posts = get_post_meta( $post_id, $prefix . 'number_of_posts', true );
$buttons         = get_post_meta( $post_id, $prefix . 'buttons', true ); ?>

<section class="latest-projects full-width block">
	<div class="row">
		<header class="block__header">
			<h2 class="heading"><?php echo esc_html( $heading ); ?></h2>
		</header>

		<div class="block__content">
			<?php cf_cg_fetch_posts( array(
				'post_type'      => 'cg-portfolio',
				'posts_per_page' => $number_of_posts,
				'template_part'  => 'template-parts/content-cg-portfolio',
			) ); ?>
		</div>

		<?php if ( ! empty( $buttons) ) : ?>
		<footer class="block__footer">

			<?php for ( $i = 0; $i < $buttons; $i++ ) :

				$button_link = get_post_meta( $post_id, $prefix . 'buttons_' . $i . '_button_link', true );
				$button_text = get_post_meta( $post_id, $prefix . 'buttons_' . $i . '_button_text', true ); ?>

				<a href="<?php echo esc_url( $button_link ); ?>" class="button"><?php echo esc_html( $button_text ); ?></a>
			<?php endfor; ?>
		</footer>
		<?php endif; ?>
	</div>
</section>
