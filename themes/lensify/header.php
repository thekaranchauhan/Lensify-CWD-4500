<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lensify
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'lensify' ); ?></a>

	<?php if ( is_front_page() ) :?>
		<!--  Site Identity -->
	<div id="lensify-front-page-wrapper">
		<header id="masthead" class="site-header white-header grid-x align-middle">
	<?php else : ?>
	<header id="masthead" class="site-header grid-x  align-middle">
	<?php endif; ?>
		<div class="site-branding cell small-6 medium-3">
			<?php
			// Displaying the custom logo uploaded to the site
			the_custom_logo();
			?>
		</div>
		<!-- Navigation Bar -->
		<nav id="site-navigation" class="main-navigation cell small-6 medium-9">
			<div id="icon-menu-container">
				<img id="icon-menu" src="../wp-content/themes/lensify/assets/img/icons/menu-icon.png" alt="menu">
			</div>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-primary',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav>
	</header><!-- #masthead -->