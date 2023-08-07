<?php
/**
 * Heading Component
 *
 * @package Starter
 */

$strt_heading_text  = get_sub_field( 'heading_text' );
$strt_heading_size  = get_sub_field( 'heading_size' );
$strt_display_size  = get_sub_field( 'display_size' );
$strt_display_class = ( $strt_display_size ) ? 'display-' . $strt_display_size : '';
if ( $strt_heading_text ) :
	printf(
		'<h%d class="%s">%s</h%d>',
		esc_attr( $strt_heading_size ),
		esc_attr( $strt_display_class ),
		wp_kses_post( $strt_heading_text ),
		esc_attr( $strt_heading_size )
	);
endif;
