<?php
/**
 * Text Editor Component
 *
 * @package Starter
 */

$strt_editor = get_sub_field( 'editor' );
if ( $strt_editor ) :
	echo wp_kses_post( $strt_editor );
endif;
