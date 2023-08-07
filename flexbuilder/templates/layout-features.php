<?php
/**
 * Features Layout
 *
 * @package Starter
 */

$strt_features      = get_sub_field( 'features' );
$strt_column_amount = get_sub_field( 'column_amount' );
$strt_btn_size      = get_sub_field( 'button_size' );
$strt_btn_color     = get_sub_field( 'button_color' );

if ( $strt_features ) :
	strt_start_section();
	switch ( $strt_column_amount ) :
		case '2':
			$strt_column_classes = 'col-sm-6';
			break;
		case '3':
			$strt_column_classes = 'col-sm-6 col-lg-4';
			break;
		case '4':
			$strt_column_classes = 'col-sm-6 col-lg-3';
			break;
	endswitch;
	echo '<div class="row justify-content-center gx-xl-5 mb-4">';
	if ( have_rows( 'features' ) ) :
		while ( have_rows( 'features' ) ) :
			the_row();
			$strt_image = get_sub_field( 'image' );
			$strt_title = get_sub_field( 'title' );
			echo '<div class="' . esc_attr( $strt_column_classes ) . ' text-center mb-5 d-flex flex-column">';
			echo ( $strt_image ) ? wp_get_attachment_image( $strt_image, 'thumbnail', '', array( 'class' => 'mx-auto mb-3 rounded-1 shadow-sm' ) ) : '';
			echo ( $strt_title ) ? '<h3>' . esc_attr( $strt_title ) . '</h3>' : '';
			echo '<p class="flex-fill mb-2">' . esc_attr( get_sub_field( 'content' ) ) . '</p>';
			echo '<div>';
			include get_template_directory() . '/flexbuilder/templates/components/button.php';
			echo '</div>';
			echo '</div>';
		endwhile;
	endif;
	echo '</div>';
	strt_end_section();
endif;
