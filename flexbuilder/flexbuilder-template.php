<?php
/**
 * Template Name: Flexbuilder
 *
 * @package strt
 */

get_header();
?>
	<main class="flexbuilder" id="primary">
		<?php
		if ( have_rows( 'section' ) ) :
			while ( have_rows( 'section' ) ) :
				the_row();
				get_template_part( 'flexbuilder/templates/layout', get_row_layout() );
			endwhile;
		endif;
		?>
	</main><!-- #content -->

<?php
get_footer();
