<?php
/**
 * Hero with Call to Action
 *
 * @package Clayton Gerard
 */

$image           = get_sub_field( 'image' );
$heading         = get_sub_field( 'heading' );
$description     = get_sub_field( 'description' );
$button_text     = get_sub_field( 'button_text' );
$button_link     = get_sub_field( 'button_link' );
$hero_navigation = get_sub_field( 'hero_navigation' );
?>

<section class="hero hero--call-to-action">
	
	<div class="hero__image">
		<?php echo wp_kses_post( wp_get_attachment_image( $image ) ); ?>
	</div>

	<div class="hero__content">
		<h2 class="heading"><?php echo esc_html( $heading ); ?></h2>
		<div class="description">
			<?php echo wp_kses_post( $description ); ?>
		</div>
		<a class="button" href="<?php echo esc_url( $button_link ); ?>"><?php echo esc_html( $button_text ); ?></a>
	</div>

	<div class="hero__navigation">

		<?php foreach ( $hero_navigation as $nav ) : ?>

			<li class="nav-item">
				<a href="<?php echo esc_url( $nav['navigation_link'] ); ?>"><?php echo esc_html( $nav['navigation_label'] ); ?></a>
				<span class="nav-icon"><?php echo wp_kses_post( wp_get_attachment_image( $nav['navigation_icon'] ) ); ?></span>
			</li>
		<?php endforeach; ?>
	</div>
</section>
