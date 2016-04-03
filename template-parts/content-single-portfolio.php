
<?php
/**
 * Content template for single portfolio pages.
 *
 * @package alcatraz
 */
?>

<?php do_action( 'alcatraz_before_entry' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php alcatraz_the_entry_header(); ?>

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
</article>

<?php do_action( 'alcatraz_after_entry' ); ?>
