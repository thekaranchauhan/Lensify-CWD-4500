<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lensify
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php color_post_thumbnail(); ?>

	<header class="entry-header">
		<?php
		if ( ! is_singular( 'product' ) ) {
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title color-excerpt-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		}

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				color_posted_by();
				color_posted_on();
				?>
			</div>
		<?php endif; ?>
        </header>

	

	<div class="color-excerpt-content">
		<?php
		the_excerpt();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'color' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<footer class="color-excerpt-footer">
		<?php color_entry_footer(); ?>
	</footer>
</article>