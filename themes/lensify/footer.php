<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lensify
 */


$popular_args = array(
	'post_type' => array( 'lensify_lens' ),
	'post_status' => 'publish',
	'posts_per_page' => '4',
	'orderby' => 'comment-count'
);

?>

<footer id="colophon" class="site-footer">
	<?php if ( is_product() || is_page( array( 'cart', 'checkout' ) ) ) : ?>
		<section class="lensify-entry-footer-wide">
			<div class="lensifytrendinglens-header">
				<h2>Trending Lens</h2>
				<p>Latest Trends, Top Picks and Cool Offers only at Lensify</p>
			</div>
			<div class="grid-x grid-margin-y grid-margin-x lensifytrendinglens">
				<?php 
				$popular_query = new WP_Query( $popular_args );

				if ( $popular_query->have_posts() ) :
					while ( $popular_query->have_posts() ) :
						?> 
						<div class="cell small-12 medium-4 large-3 lensifytrendinglens"> 
							<?php
							$popular_query->the_post();
							the_post_thumbnail();
							the_title( '<h2><a href="' . esc_url( get_permalink() ) . '"rel="bookmark">', '</a></h2>' );
							lensify_by();
							?> 
						</div> 
						<?php
					endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</section>
		<?php endif; ?>
		<div class="lensify-footer-top">
			<p><?php bloginfo( 'name' ); ?> &copy; Copyright 2022.</p>
		<div class="lensify-footer-divider"></div>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'lensify' ) ); ?>">
				<?php
				printf( esc_html__( 'Proudly powered by %s', 'lensify' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* Theme name and author */
				printf( esc_html__( 'Theme: Lensify by %2$s.', 'lensify' ), 'lensify', '<a href="https://thekaranchauhan.com">Karan Chauhan</a>' );
				?>
		</div>
	</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
