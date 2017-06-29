
<?php
/**
 * Content template for single portfolio pages.
 *
 * @package alcatraz
 */

$post_id  = get_the_ID();
$images   = get_post_meta( $post_id, 'images', true );
$web_name = get_post_meta( $post_id, 'website_name', true );
$web_url  = get_post_meta( $post_id, 'website_url', true );
$credits  = get_post_meta( $post_id, 'credits', true );
?>

<?php do_action( 'alcatraz_before_entry' ); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'cg-project' ); ?>>

	<?php alcatraz_the_entry_header(); ?>

	<div class="entry-content">
		<?php if ( ! empty( $images ) ) : ?>
			<div class="cg-project__images">
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="project-image">
						<?php the_post_thumbnail( 'portfolio-featured' ); ?>
					</div>
				<?php endif;

				for ( $i = 0; $i < $images; $i++ ) :

					$image = get_post_meta( $post_id, 'images_' . $i . '_image', true ); ?>
					<div class="project-image"><?php echo wp_kses_post( wp_get_attachment_image( $image, 'portfolio-featured' ) ); ?></div>
				<?php endfor; ?>
			</div>
		<?php endif; ?>

		<div class="cg-project__details">
			<div class="project-overview">
				<h2><?php esc_html_e( 'Overview', 'claytongerard' ); ?></h2>
				<?php the_content(); ?>
			</div>

			<div class="project-meta">
				<h2><?php esc_html_e( 'Services', 'claytongerard' ); ?></h2>
				

				<?php if ( ! empty( $web_name && $web_url ) ) : ?>
					<h2><?php esc_html_e( 'Website', 'claytongerard' ); ?></h2>
					<a href="<?php echo esc_url( $web_url ); ?>"><?php echo esc_html( $web_name ); ?></a>
				<?php endif; ?>

				<?php if ( ! empty( $credits ) ) : ?>
					<h2><?php esc_html_e( 'Credits', 'claytongerard' ); ?></h2>
					<?php echo wp_kses_post( wpautop( $credits ) ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</article>

<?php do_action( 'alcatraz_after_entry' ); ?>
