<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Starter
 */

?>

<footer id="colophon" class="site-footer">
	<div class="footer-widgets bg-dark py-4 py-lg-5">
		<div class="container">
			<div class="row justify-content-center">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
					<div class="col-lg-4">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
					<div class="col-lg-4">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
		<svg class="colorswatch" width="90px" height="154.565217px" viewBox="0 0 90 154.565217" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<g id="Design-" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				<g id="Home" transform="translate(-1590, -465)" fill-rule="nonzero">
					<g id="colorswatch" transform="translate(1590, 465)">
						<polygon id="Path" fill="#FFFFFF" points="52.826087 154.565217 89.0217391 154.565217 89.0217391 0.97826087"></polygon>
						<polygon id="Path" fill="#1E6C9A" points="0 83.8337715 22.4511931 105.652174 90 0"></polygon>
						<polygon id="Path" fill="#F08E00" points="1.95652174 93.3621457 27.0562095 114.456522 90 0"></polygon>
						<polygon id="Path" fill="#AF0917" points="2.93478261 104.869565 31.3662491 125.217391 90 0"></polygon>
						<polygon id="Path" fill="#E2017B" points="5.86956522 115.658466 37.4798336 135 90 0"></polygon>
						<polygon id="Path" fill="#D9ABAB" points="9.7826087 126.843215 44.6512183 144.782609 90 0"></polygon>
						<polygon id="Path" fill="#50813D" points="16.6304348 137.496894 53.7979119 153.586957 90 0"></polygon>
					</g>
				</g>
			</g>
		</svg>
	</div>
	<div class="socket container bg-light">
		<div class="socket-logos">
			<div class="socket-logo"><a target="_blank" href="https://passionatebulkboek.nl" class="logo-pb"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-pb', 130 ) ); ?></a></div>
			<div class="socket-logo"><a target="_blank" href="https://annablamanprijs.nl" class="logo-ab"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-ab', 55 ) ); ?></a></div>
			<div class="socket-logo"><a target="_blank" href="https://dagvanhetliteratuuronderwijs.nl" class="logo-dlo"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-dlo', 55 ) ); ?></a></div>
			<div class="socket-logo"><a target="_blank" href="https://writenow.nl" class="logo-wn"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-wn', 70 ) ); ?></a></div>
			<div class="socket-logo"><a target="_blank" href="https://dagvandeliteratuur.nl" class="logo-dvdl"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-dvdl', 55 ) ); ?></a></div>
			<div class="socket-logo"><a target="_blank" href="https://jongejury.nl" class="logo-jj"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-jj', 45 ) ); ?></a></div>
			<div class="socket-logo"><a target="_blank" href="https://inktaap.nl" class="logo-ia"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-ia', 60 ) ); ?></a></div>
			<div class="socket-logo"><a target="_blank" href="https://paboleest.nl" class="logo-pl"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-pl', 55 ) ); ?></a></div>
			<div class="socket-logo"><a target="_blank" href="https://nationalemediatheektrofee.nl" class="logo-nmt"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-nmt', 70 ) ); ?></a></div>
			<div class="socket-logo"><a target="_blank" href="https://erwaseens.nl" class="logo-ewe"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-ewe', 55 ) ); ?></a></div>
		</div>
		<div class="site-info text-muted text-center pb-2 small">
			<?php echo esc_html( gmdate( 'Y' ) ); ?> &copy; 
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
			<?php
			$strt_description = get_bloginfo( 'description' );
			if ( $strt_description ) :
				echo '<span class="sep"> - </span>';
				echo esc_html( $strt_description );
			endif;
			if ( ! empty( get_the_privacy_policy_link() ) ) :
				the_privacy_policy_link( '<span class="sep"> | </span>' );
			endif;
			?>
		</div><!-- .site-info -->
	</div><!-- .socket -->
</footer><!-- .site-footer -->
<?php wp_footer(); ?>

</body>
</html>
