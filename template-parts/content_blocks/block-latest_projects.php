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
$number_of_posts = get_post_meta( $post_id, $prefix . 'number_of_posts', true ); ?>

<section class="latest-projects full-width container">
	<div class="row">
		<h2 class="heading"><?php echo esc_html( $heading ); ?></h2>
		<?php cf_cg_fetch_posts( array(
			'post_type'      => 'cg-portfolio',
			'posts_per_page' => $number_of_posts,
			'template_part'  => 'template-parts/content-latest-project',
		) ); ?>
		<footer class="footer"><a href="<?php echo esc_url( cf_cg_get_blog_posts_page_url() ); ?>" class="button"><?php esc_html_e( 'More Posts', 'claytongerard' ); ?></a></footer>
	</div>
</section>
