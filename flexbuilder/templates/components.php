<?php
/**
 * Template for loading components
 *
 * @package Starter
 */

if ( have_rows( 'content' ) ) :
	while ( have_rows( 'content' ) ) :
		the_row();
		include get_template_directory() . '/flexbuilder/templates/components/' . get_row_layout() . '.php';
	endwhile;
endif;
