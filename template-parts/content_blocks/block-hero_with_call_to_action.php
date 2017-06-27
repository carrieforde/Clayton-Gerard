<?php
/**
 * Hero with Call to Action
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
$image           = get_post_meta( $post_id, $prefix . 'image', true );
$heading         = get_post_meta( $post_id, $prefix . 'heading', true );
$description     = get_post_meta( $post_id, $prefix . 'description', true );
$button_text     = get_post_meta( $post_id, $prefix . 'button_text', true );
$button_link     = get_post_meta( $post_id, $prefix . 'button_link', true );
$hero_navigation = get_post_meta( $post_id, $prefix . 'hero_navigation', true );
?>

<section class="hero hero--call-to-action container container--no-padding">

	<div class="row">
	
		<div class="hero__image">
			<?php echo wp_kses_post( wp_get_attachment_image( $image, 'hero-half' ) ); ?>
		</div>

		<div class="hero__content">

			<div class="cta-area">
				<?php if ( ! empty( $heading ) ) : ?>
					<h2 class="heading"><?php echo esc_html( $heading ); ?></h2>
				<?php endif; ?>

				<?php if ( ! empty( $description ) ) : ?>
					<div class="description">
						<?php echo wp_kses_post( wpautop( $description ) ); ?>
					</div>
				<?php endif; ?>

				<?php if ( ! empty( $button_link && $button_text ) ) : ?>
					<a class="button" href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_text ); ?></a>
				<?php endif; ?>
			</div><!-- .cta-area -->

			<?php if ( ! empty( $hero_navigation ) ) : ?>
				<ul class="hero__navigation">

					<?php for ( $i = 0; $i < $hero_navigation; $i++ ) :

						$nav_link = get_post_meta( $post_id, $prefix . 'hero_navigation_' . $i . '_navigation_link', true );
						$nav_label = get_post_meta( $post_id, $prefix . 'hero_navigation_' . $i . '_navigation_label', true );
						$nav_icon = get_post_meta( $post_id, $prefix . 'hero_navigation_' . $i . '_navigation_icon', true ); ?>

						<li class="nav-item">
							<a href="<?php echo esc_url( $nav_link ); ?>"><?php echo esc_html( $nav_label ); ?></a>
							<span class="nav-icon"><?php echo wp_kses_post( wp_get_attachment_image( $nav_icon ) ); ?></span>
						</li>
					<?php endfor; ?>
				</ul><!-- .hero__navigation -->
			<?php endif; ?>
		</div><!-- .hero__content -->
	</div>
</section>
