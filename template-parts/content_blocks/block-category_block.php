<?php
/**
 * Category Block
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
$heading    = get_post_meta( $post_id, $prefix . 'heading', true );
$categories = get_post_meta( $post_id, $prefix . 'categories', true );
$i          = 0; // iterator for our loop.

?>

<section class="category-block full-width block">

	<div class="row row-600">

		<header class="block__header">
			<h2><?php echo esc_html( $heading ); ?></h2>
		</header>

		<div class="block__content">
			<ul class="categories">
				<?php foreach ( $categories as $category ) :

					$link = get_category_link( $category );
					$name = get_the_category_by_ID( $category ); ?>

					<li class="category">
						<a href="<?php echo esc_url( $link ); ?>" class="button"><?php echo esc_html( $name ); ?></a>
					</li>

					
					<?php $i++;

					if ( 6 === $i ) {
						break;
					} ?>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>
