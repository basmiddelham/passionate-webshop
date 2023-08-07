<?php
/**
 * Form Component
 *
 * @package Starter
 */

$strt_form_id = get_sub_field( 'gravityform' );
$strt_display_title = ( get_sub_field( 'display_title' ) ) ? true : false;
$strt_display_description = ( get_sub_field( 'display_description' ) ) ? true : false;

if ( ! is_admin() ) :
	gravity_form( $strt_form_id, $strt_display_title, $strt_display_description, false, '', true );
else :
	gravity_form( $strt_form_id, $strt_display_title, $strt_display_description, false, '', false );
endif;
