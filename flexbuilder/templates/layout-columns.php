<?php
/**
 * Template for rendering Flexbuilder columns
 *
 * @package Starter
 */

$strt_row_classes = (array) get_sub_field( 'row_options' );
array_push( $strt_row_classes, 'row justify-content-center' );
$strt_row_classes = implode( ' ', (array) $strt_row_classes );
strt_start_section();

if ( have_rows( 'columns' ) ) :
	echo '<div class="' . esc_attr( $strt_row_classes ) . '">';
	$i = 0;
	while ( have_rows( 'columns' ) ) :
		the_row();
		$strt_columns_layout = get_layout_col();
		echo '<div class="col-lg-' . esc_attr( $strt_columns_layout ) . ' mb-5 mb-lg-0">';
		include get_template_directory() . '/flexbuilder/templates/components.php';
		echo '</div>';
		$i++;
	endwhile;
	echo '</div>';
endif;

strt_end_section();
