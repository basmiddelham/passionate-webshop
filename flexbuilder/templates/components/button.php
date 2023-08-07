<?php
/**
 * Button Component
 *
 * @package Starter
 */

$strt_btn_link = get_sub_field( 'button_link' );

if ( $strt_btn_link ) :
	printf(
		'<a href="%s" class="btn %s %s" role="button">%s</a>',
		esc_url( $strt_btn_link['url'] ),
		esc_attr( $strt_btn_color ),
		esc_attr( $strt_btn_size ),
		esc_html( $strt_btn_link['title'] )
	);
endif;
