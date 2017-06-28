<?php
/**
 * Content template for portfolio archive pages.
 *
 * @package alcatraz
 */
?>

<?php do_action( 'alcatraz_before_entry' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'portfolio-card' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink() ?>" class="post-thumbnail"><?php the_post_thumbnail( 'portfolio-featured' ); ?></a>
	<?php endif; ?>

	<?php alcatraz_the_entry_header(); ?>
</article>

<?php do_action( 'alcatraz_after_entry' ); ?>
