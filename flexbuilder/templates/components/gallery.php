<?php
/**
 * Gallery Component
 *
 * @package Starter
 */

$strt_gallery         = get_sub_field( 'gallery' );
$strt_gallery_columns = get_sub_field( 'gallery_columns' );
$strt_gallery_size    = get_sub_field( 'gallery_size' );
$strt_gallery_link    = get_sub_field( 'gallery_link' );
if ( $strt_gallery ) :
	if ( 'file' === $strt_gallery_link ) :
		wp_enqueue_script( 'fancybox', get_stylesheet_directory_uri() . '/assets/dist/js/fancybox.js', array(), '1.0.0', true );
		wp_enqueue_style( 'fancybox', get_stylesheet_directory_uri() . '/assets/dist/css/fancybox.css', array(), '1.0.0' );
	endif;
	$strt_shortcode = sprintf(
		'[gallery columns="%s" size="%s" link="%s" ids="%s"]',
		$strt_gallery_columns,
		$strt_gallery_size,
		$strt_gallery_link,
		implode( ',', $strt_gallery )
	);
	echo do_shortcode( $strt_shortcode );
endif;
