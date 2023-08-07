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
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#primary"><?php esc_html_e( 'Skip to content', 'strt' ); ?></a>
<header id="masthead" class="site-header">
	<nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
		<div class="container">
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<?php bloginfo( 'name' ); ?>
			</a>
			<?php
			if ( function_exists( 'strt_woocommerce_header_cart' ) ) {
				echo '<div class="ms-auto me-2 order-lg-1">';
				strt_woocommerce_header_cart();
				echo '</div>';
			}
			?>
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
						'menu_class'     => 'navbar-nav ms-lg-auto',
						'container'      => false,
						'fallback_cb'    => false,
					)
				);
				?>
			</div>
		</div>
	</nav>
</header><!-- #masthead -->
