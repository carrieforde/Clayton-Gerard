<?php
/**
 * Build and echo the entry footer HTML.
 *
 * @since  1.0.0
 */
function clayton_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {

		$categories_list = get_the_category_list( esc_html__( ', ', 'alcatraz' ) );

		if ( $categories_list && alcatraz_categorized_blog() ) {

			printf( '<span class="cat-links">' . esc_html__( 'Posted in: %1$s', 'alcatraz' ) . ' | </span>', $categories_list ); // WPCS: XSS OK.
		}
	}
	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a Comment', 'alcatraz' ), esc_html__( '1 Comment', 'alcatraz' ), esc_html__( '% Comments', 'alcatraz' ) );
		echo '</span>';
	}
}

/**
 * Flexible Content
 */
function clayton_flexible_content() {

	$rows = get_post_meta( get_the_id(), 'flexible_content', true );

	foreach ( ( array ) $rows as $count => $row ) {

		switch( $row ) {

			// Full width image row.
			case 'full_width_image':

			$image = get_post_meta( get_the_id(), 'flexible_content_' . $count . '_image', true );
			$image_size = 'full-screen-image';
			$image_display = get_post_meta( get_the_id(), 'flexible_content_' . $count . '_display', true );

			if ( 'background' === $image_display ) {

				$background_image_url = wp_get_attachment_image_src( $image, $image_size, false );

				?>
					<div class="full-width-image-wrapper" style="background-image: url('<?php echo $background_image_url[0] ?> ');"></div>
				<?php

			} else {
				echo '<div class="full-width-image-wrapper">' . wp_get_attachment_image( $image, $image_size ) . '</div>';

			}

			break;

			// Full width content row.
			case 'full_width_row':

			$background_color = get_post_meta( get_the_id(), 'flexible_content_' . $count . '_background_color', true );
			$row_accent       = get_post_meta( get_the_id(), 'flexible_content_' . $count . '_triangle_accent', true );
			$font             = get_post_meta( get_the_id(), 'flexible_content_' . $count . '_content_font', true );
			$content          = get_post_meta( get_the_id(), 'flexible_content_' . $count . '_row_content', true );

			?>
			<div class="full-width-row <?php echo esc_attr( $background_color ); ?>">
				<section class="full-width-row-content <?php echo esc_attr( $font ); ?>">
					<?php echo wp_kses_post( $content ); ?>
				</section>
				<?php
				if ( 'yes' === $row_accent ) {
					echo '<div class="full-width-row-accent"></div>';
				}
				?>
			</div>
			<?php

			break;

			// Services content row.
			case 'services_row':

			$background_color = get_post_meta( get_the_id(), 'flexible_content_' . $count . '_service_background_color', true );
			$row_accent       = get_post_meta( get_the_id(), 'flexible_content_' . $count . '_service_row_accent', true );
			$studio_services  = get_post_meta( get_the_id(), 'flexible_content_' . $count . '_studio_services', true );

			echo '<div class="full-width-row ' . esc_attr( $background_color ) . '">';
			echo '<div class="studio-services">';

			for ( $i = 0; $i < 3; $i++ ) {

				$heading = get_post_meta( get_the_id(), 'flexible_content_' . $count . '_studio_services_' . $i . '_service_heading', true);
				$offerings = get_post_meta( get_the_id(), 'flexible_content_' . $count . '_studio_services_' . $i . '_service_offerings', true);

				echo '<div class="services">';
				echo '<h3 class="services-heading">' . esc_attr( $heading ) . '</h3>';
				echo '<section class="services-offerings">' . wp_kses_post( $offerings ) . '</section>';
				echo '</div>';
			}

			if ( 'yes' === $row_accent ) {
				echo '<div class="full-width-row-accent"></div>';
			}

			echo '</div></div>';

			break;
		}
	}
}

/**
 * The Studio portfolio loop.
 */
function clayton_gerard_studio_portfolio_loop() {

	// Query the last six projects.
	$clayton_gerard_projects = array(
		'post_type' => 'portfolio',
		'posts_per_page' => 6,
		//'nopaging' => true,
	);

	$clayton_gerard_latest_projects = new WP_Query( $clayton_gerard_projects );

	if( $clayton_gerard_latest_projects->have_posts() ) : ?>

	<?php ob_start(); ?>

	<div class="clayton-gerard-latest-projects">

		<h2 class="clayton-gerard-project-loop-heading">The Latest from The Studio</h2>

		<?php while ( $clayton_gerard_latest_projects->have_posts() ) : $clayton_gerard_latest_projects->the_post(); ?>

		<div class="clayton-gerard-project">

			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink() ?>" class="post-thumbnail"><?php the_post_thumbnail(); ?></a>
			<?php endif; ?>

			<h3 class="clayton-gerard-project-heading"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
		</div>

		<?php endwhile; ?>

		<?php wp_reset_postdata(); ?>

	<div class="clayton-gerard-button-wrapper">
		<a href="/portfolio/" class="clayton-gerard-button">View More Projects</a>
	</div>
	</div>

	<?php endif;

	return ob_get_clean();
}
