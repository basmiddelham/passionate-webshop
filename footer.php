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

<footer id="colophon" class="site-footer container">
	<div class="d-flex flex-wrap justify-content-center justify-content-lg-between align-items-center py-3 py-lg-4 border-top">
		<div class="site-info text-muted text-center">
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
		</div>
		<?php
		if ( has_nav_menu( 'social' ) ) :
			wp_nav_menu(
				array(
					'theme_location'       => 'social',
					'container'            => 'nav',
					'container_aria_label' => esc_attr__( 'Social links', 'strt' ),
					'container_class'      => 'ms-auto',
					'menu_class'           => 'menu social',
					'depth'                => 1,
					'link_before'          => '<span class="screen-reader-text">',
					'link_after'           => '</span>',
					'fallback_cb'          => false,
				)
			);
		endif;
		?>
		<div class="form-check form-switch ms-1">
			<input class="form-check-input" type="checkbox" role="switch" id="darkSwitch">
			<label class="form-check-label visually-hidden" for="darkSwitch">Dark Mode</label>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
