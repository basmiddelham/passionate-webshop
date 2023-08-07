<?php
/**
 * Buttons Component
 *
 * @package Starter
 */

$strt_btn_size  = get_sub_field( 'button_size' );
$strt_btn_align = get_sub_field( 'button_align' );
$strt_btn_block = ( 'w-100' === $strt_btn_align ) ? $strt_btn_align : '';

echo '<div class="d-grid gap-2 d-sm-flex ' . esc_attr( $strt_btn_align ) . '">';
if ( have_rows( 'buttons' ) ) :
	while ( have_rows( 'buttons' ) ) :
		the_row();
		$strt_btn_link  = get_sub_field( 'button_link' );
		$strt_btn_color = get_sub_field( 'button_color' );
		if ( $strt_btn_link ) :
			printf(
				'<a href="%s" target="%s" class="btn %s %s %s" role="button">%s</a>',
				esc_url( $strt_btn_link['url'] ),
				( $strt_btn_link['target'] ? esc_attr( $strt_btn_link['target'] ) : '_self' ),
				esc_attr( $strt_btn_color ),
				esc_attr( $strt_btn_size ),
				esc_attr( $strt_btn_block ),
				esc_html( $strt_btn_link['title'] )
			);
		endif;
	endwhile;
endif;

echo '</div>';
