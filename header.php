<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> data-bs-theme="auto">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#primary"><?php esc_html_e( 'Skip to content', 'strt' ); ?></a>
<header id="masthead" class="site-header">
	<nav class="navbar navbar-expand-lg" data-bs-theme="dark">
		<div class="container">
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/dist/images/logo-pb_shop.svg" alt="<?php bloginfo( 'name' ); ?>" width="240" height="54">
				<div class="visually-hidden"><?php bloginfo( 'name' ); ?></div>
			</a>
			<?php if ( has_nav_menu( 'primary-navigation' ) ) : ?>
				<button id="hamburger-toggler" class="hamburger hamburger--collapse" type="button" data-bs-toggle="collapse" data-bs-target="#primary-navigation" aria-controls="primary-navigation" aria-expanded="false" aria-label="Toggle navigation">
					<span class="hamburger-box"><span class="hamburger-inner"></span></span>
				</button>
			<?php endif; ?>
			<div class="collapse navbar-collapse" id="primary-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary-navigation',
						'menu_class'     => 'navbar-nav',
						'container'      => false,
						'fallback_cb'    => false,
					)
				);
				?>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'secondary-navigation',
						'menu_class'     => 'secondary-navigation',
						'container'      => false,
						'fallback_cb'    => false,
					)
				);
				?>
			</div>
		</div>
	</nav>
</header><!-- #masthead -->
