<?php
/**
 * Content template for flexible content pages.
 *
 * @package alcatraz
 */
?>

<?php do_action( 'alcatraz_before_entry' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php alcatraz_the_entry_header(); ?>

	<div class="entry-content">
		<?php cf_cg_display_component(); ?>
	</div>
</article>

<?php do_action( 'alcatraz_after_entry' ); ?>
