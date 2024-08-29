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
				<div class="col-lg-4">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>
				<div class="col-lg-4">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
			</div>
		</div>
		<svg xmlns="http://www.w3.org/2000/svg" class="colorswatch" width="90px" height="154px" viewBox="0 0 90 154"><g fill="none" fill-rule="nonzero"><path fill="#FFF" d="M54 154h36V0L54 154Z"/><path fill="#1E6C9A" d="m0 84 22 22L90 0z"/><path fill="#F08E00" d="m2 93 25 21L90 0z"/><path fill="#AF0917" d="m3 105 28 20L90 0z"/><path fill="#E2017B" d="m6 116 31 19L90 0z"/><path fill="#D9ABAB" d="m10 127 35 18L90 0z"/><path fill="#50813D" d="m17 137 37 17L90 0z"/></g></svg>
	</div>
	<div class="socket">
		<div class="container bg-light">
			<div class="socket-logos">
				<div class="socket-logo"><a target="_blank" href="https://passionatebulkboek.nl" class="logo-pb"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-pb', 130 ) ); ?></a></div>
				<div class="socket-logo"><a target="_blank" href="https://annablamanprijs.nl" class="logo-ab"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-ab', 55 ) ); ?></a></div>
				<div class="socket-logo"><a target="_blank" href="https://dagvandeliteratuur.nl" class="logo-dvdl"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-dvdl', 55 ) ); ?></a></div>
				<div class="socket-logo"><a target="_blank" href="https://dagvanhetliteratuuronderwijs.nl" class="logo-dlo"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-dlo', 55 ) ); ?></a></div>
				<div class="socket-logo"><a target="_blank" href="https://inktaap.nl" class="logo-ia"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-ia', 60 ) ); ?></a></div>
				<div class="socket-logo"><a target="_blank" href="https://erwaseens.nu" class="logo-ewe"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-ewe', 55 ) ); ?></a></div>
				<div class="socket-logo"><a target="_blank" href="https://jongejury.nl" class="logo-jj"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-jj', 45 ) ); ?></a></div>
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
				echo '<span class="sep"> | </span><a href="' . get_permalink( wc_terms_and_conditions_page_id() ) . '">' . esc_html__( 'Annuleringsbeleid', 'strt' ) . '</a>';
				?>
			</div><!-- .site-info -->
		</div>
	</div><!-- .socket -->
</footer><!-- .site-footer -->
<?php wp_footer(); ?>

</body>
</html>
