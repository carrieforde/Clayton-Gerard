
<?php
/**
 * Content template for single portfolio pages.
 *
 * @package alcatraz
 */
?>

<?php do_action( 'alcatraz_before_entry' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php alcatraz_entry_header(); ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			if ( is_archive() ) {
				return;
			} else {
				do_shortcode( '[claytongerard_project]' );
			}
		?>
	</div>

	<footer class="entry-footer">
		<?php alcatraz_entry_footer(); ?>
	</footer>
</article>

<?php do_action( 'alcatraz_after_entry' ); ?>
