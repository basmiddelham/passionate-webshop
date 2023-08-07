<?php
/**
 * Video Component
 *
 * @package Starter
 */

$strt_video_type   = get_sub_field( 'video_type' );
$strt_video_aspect = get_sub_field( 'video_aspect' );
$strt_embed_link   = get_sub_field( 'embed_link' );
$strt_mp4_file     = get_sub_field( 'mp4_file' );

if ( 'embed' === $strt_video_type && $strt_embed_link ) :
	printf(
		'<div class="ratio ratio-%s">%s</div>',
		esc_attr( $strt_video_aspect ),
		wp_kses( $strt_embed_link, 'acf' )
	);
elseif ( 'mp4' === $strt_video_type && $strt_mp4_file ) :
	$strt_mp4_options = get_sub_field( 'mp4_options' );
	printf(
		'<video %s><source src="%s" type="video/mp4">Your browser does not support the video tag.</video>',
		esc_attr( implode( ' ', $strt_mp4_options ) ),
		esc_url( $strt_mp4_file )
	);
endif;
