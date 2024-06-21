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
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( esc_url( get_stylesheet_directory_uri() ) ); ?>/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/favicon/site.webmanifest">
	<link rel="mask-icon" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/favicon/safari-pinned-tab.svg" color="#32621f">
	<link rel="shortcut icon" href="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/favicon/favicon.ico">
	<meta name="msapplication-TileColor" content="#dce9d7">
	<meta name="msapplication-config" content="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/favicon/browserconfig.xml">
	<meta name="theme-color" content="#dce9d7">
	<meta name="facebook-domain-verification" content="q7ol1996tcziwtq6t2o5xc7g8bare1" />
	<!-- Meta Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '2587413514771259');
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=2587413514771259&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Meta Pixel Code -->
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
