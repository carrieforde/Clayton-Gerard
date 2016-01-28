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

	foreach ( (array) $rows as $count => $row ) {

		switch( $row ) {

			// Full width white row.
			case 'fullwidth_row_white':

			$content = get_post_meta( get_the_id(), 'flexible_content_' . $count . '_row_white_content', true );

			echo '<div class="clay_fullwidth_white">';
			echo $content;
			echo '</div>';

			break;

			// Full width black row.
			case 'fullwidth_row_black':

			$content = get_post_meta( get_the_id(), 'flexible_content_' . $count . '_row_black_content', true );

			echo '<div class="clay_fullwidth_black">';
			echo $content;
			echo '<div class="block"></div>';
			echo '</div>';

			break;
		}
	}
}
