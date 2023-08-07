<?php
/**
 * Cards Layout
 *
 * @package Starter
 */

$strt_cards         = get_sub_field( 'cards' );
$strt_column_amount = get_sub_field( 'column_amount' );
$strt_btn_size      = get_sub_field( 'button_size' );
$strt_btn_color     = get_sub_field( 'button_color' );

if ( $strt_cards ) :
	strt_start_section();
	switch ( $strt_column_amount ) :
		case '2':
			$strt_column_classes = 'col-sm-6';
			$strt_img_size       = 'col-6-16x9';
			break;
		case '3':
			$strt_column_classes = 'col-sm-6 col-lg-4';
			$strt_img_size       = 'col-4-16x9';
			break;
		case '4':
			$strt_column_classes = 'col-sm-6 col-lg-3';
			$strt_img_size       = 'col-3-16x9';
			break;
	endswitch;
	echo '<div class="row justify-content-center pb-5">';
	if ( have_rows( 'cards' ) ) :
		while ( have_rows( 'cards' ) ) :
			the_row();
			$strt_image = get_sub_field( 'image' );
			$strt_title = get_sub_field( 'title' );
			echo '<div class="' . esc_attr( $strt_column_classes ) . ' mb-4">';
			echo '<div class="card h-100">';
			echo ( $strt_image ) ? wp_get_attachment_image( $strt_image, $strt_img_size, '', array( 'class' => 'img-fluid w-100' ) ) : '';
			echo '<div class="card-body d-flex flex-column">';
			echo ( $strt_title ) ? '<h5 class="card-title">' . esc_attr( $strt_title ) . '</h5>' : '';
			echo '<p class="card-text flex-fill"">' . esc_attr( get_sub_field( 'content' ) ) . '</p>';
			include get_template_directory() . '/flexbuilder/templates/components/button.php';
			echo '</div>';
			echo '</div>';
			echo '</div>';
		endwhile;
	endif;
	echo '</div>';
	strt_end_section();
endif;
