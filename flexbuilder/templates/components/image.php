<?php
/**
 * Image Component
 *
 * @package Starter
 */

$strt_img_id        = get_sub_field( 'image' );
$strt_img_ratio     = get_sub_field( 'image_ratio' );
$strt_link_to_large = get_sub_field( 'link' );
$strt_img_size      = ( ! empty( $strt_columns_layout ) ) ? strt_image_size( $strt_columns_layout, $strt_img_ratio ) : 'col-12-4x3';
$strt_image         = wp_get_attachment_image( $strt_img_id, $strt_img_size, false, array( 'class' => 'img-fluid w-100' ) );

if ( $strt_img_id ) :
	if ( $strt_link_to_large ) :
		wp_enqueue_script( 'fancybox', get_stylesheet_directory_uri() . '/assets/dist/js/fancybox.js', array(), '1.0.0', true );
		wp_enqueue_style( 'fancybox', get_stylesheet_directory_uri() . '/assets/dist/css/fancybox.css', array(), '1.0.0' );
		printf(
			'<a data-fancybox href="%s" target="_blank" aria-label="Link to larger image">%s</a>',
			esc_url( wp_get_attachment_image_url( $strt_img_id, 'full' ) ),
			$strt_image // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		);
	else :
		echo $strt_image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	endif;
endif;
