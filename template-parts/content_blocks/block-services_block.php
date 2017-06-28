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
$heading = get_post_meta( $post_id, $prefix . 'heading', true );
$services = get_post_meta( $post_id, $prefix . 'services', true ); ?>

<section class="services-block full-width block background-mine-shaft color-white">
	<div class="row">
		<h2 class="heading"><?php echo esc_html( $heading ); ?></h2>

		<div class="services">

			<?php for ( $i = 0; $i < $services; $i++ ) :
				$service = get_post_meta( $post_id, $prefix . 'services_' . $i . '_service', true );
				$offerings = get_post_meta( $post_id, $prefix . 'services_' . $i . '_offerings', true ); ?>

				<div class="service">
					<h3><?php echo esc_html( $service ); ?></h3>

					<ul class="offerings">
						
					<?php for ( $j = 0; $j < $offerings; $j++ ) :
						$offering = get_post_meta( $post_id, $prefix . 'services_' . $i . '_offerings_' . $j . '_offering', true );?>

						<li class="offering"><?php echo esc_html( $offering ); ?></li>
					<?php endfor; ?>
					</ul>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
