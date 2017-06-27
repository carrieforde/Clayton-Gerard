<?php
/**
 * Latest Posts block.
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
$number_of_posts = get_post_meta( $post_id, $prefix . 'number_of_posts', true ); ?>

<section class="latest-posts full-width container">
	<div class="row row-600">
		<?php cf_cg_fetch_posts( array(
			'posts_per_page' => $number_of_posts,
			'template_part'  => 'template-parts/content-latest-post',
		) ); ?>
		<a href="<?php echo esc_url( cf_cg_get_blog_posts_page_url() ); ?>" class="button"><?php esc_html_e( 'More Posts', 'claytongerard' ); ?></a>
	</div>
</section>
