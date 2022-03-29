<?php
/**
 * The template for displaying the front page
 *
 * This is the template that displays the front-page by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lensify
 */

get_header();
?>

	<main id="primary" class="site-main lensify-front-page">
		<?php if( has_post_thumbnail() ) : ?>
			<section class="lensify-front-page-banner">
				<div class="lensify-banner-img">
				<?php 
				the_post_thumbnail();
				?>
				</div>
				<div class="lensify-banner-tagline">
				<?php
				$lensify_description = get_bloginfo( 'description', 'display' );
				if ( $lensify_description || is_customize_preview() ) :
					?>
					<p class="site-description"><?php echo $lensify_description; ?></p>
				<?php endif; ?>
				</div>
			</section>
		<?php
		endif;

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'front' );

		endwhile; // End of the loop.
		?>

	</main>
</div>
<?php
get_footer();