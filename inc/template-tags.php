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

	<section class="clayton-gerard-latest-projects">

		<h2 class="clayton-gerard-project-loop-heading">The Latest from The Studio</h2>

		<div class="clayton-gerard-project-wrapper">

		<?php while ( $clayton_gerard_latest_projects->have_posts() ) : $clayton_gerard_latest_projects->the_post(); ?>

		<div class="clayton-gerard-project">

			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink() ?>" class="post-thumbnail"><?php the_post_thumbnail(); ?></a>
			<?php endif; ?>

			<h3 class="clayton-gerard-project-heading"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
		</div>

		<?php endwhile; ?>

		</div>

		<?php wp_reset_postdata(); ?>

	<div class="clayton-gerard-button-wrapper">
		<a href="/portfolio/" class="clayton-gerard-button">View More Projects</a>
	</div>
	</section>

	<?php endif;

	return ob_get_clean();
}
