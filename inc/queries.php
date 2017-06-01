<?php
/**
 * Clayton Gerard Queries
 *
 * @package Clayton Gerard
 */

function cf_cg_fetch_posts( $args = array() ) {

	$defaults = array(
		'category_name'   => '',
		'post_type'       => 'post',
		'posts_per_page'  => 1,
		'template_part'   => 'template-parts/content',
		'post__not_in'    => get_option( 'sticky_posts' ),
	);
	$args = wp_parse_args( $args, $defaults );

	$post = array(
		'category_name'       => esc_attr( $args['category_name'] ),
		'ignore_sticky_posts' => 1,
		'post_type'           => esc_attr( $args['post_type'] ),
		'posts_per_page'      => absint( $args['posts_per_page'] ),
		'post__not_in'        => array_map( 'esc_attr', $args['post__not_in'] ),
	);

	$posts = new WP_Query( $post );

	if ( $posts->have_posts() ) {

		while ( $posts->have_posts() ) {

			$posts->the_post();

			get_template_part( $args['template_part'] );
		}
	}

	wp_reset_postdata();
}
