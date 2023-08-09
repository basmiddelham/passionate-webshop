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
	<div class="socket container pt-3 bg-light">
		<div class="socket-logos">
			<a target="_blank" href="https://passionatebulkboek.nl" class="logo-pb"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-pb', 100 ) ); ?></a>
			<a target="_blank" href="https://annablamanprijs.nl" class="logo-ab"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-ab', 40 ) ); ?></a>
			<a target="_blank" href="https://dagvanhetliteratuuronderwijs.nl" class="logo-dlo"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-dlo', 40 ) ); ?></a>
			<a target="_blank" href="https://writenow.nl" class="logo-wn"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-wn', 50 ) ); ?></a>
			<a target="_blank" href="https://dagvandeliteratuur.nl" class="logo-dvdl"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-dvdl', 45 ) ); ?></a>
			<a target="_blank" href="https://jongejury.nl" class="logo-jj"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-jj', 30 ) ); ?></a>
			<a target="_blank" href="https://inktaap.nl" class="logo-ia"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-ia', 50 ) ); ?></a>
			<a target="_blank" href="https://paboleest.nl" class="logo-pl"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-pl', 45 ) ); ?></a>
			<a target="_blank" href="https://nationalemediatheektrofee.nl" class="logo-nmt"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-nmt', 55 ) ); ?></a>
			<a target="_blank" href="https://erwaseens.nl" class="logo-ewe"><?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'logo-ewe', 40 ) ); ?></a>
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
