<?php
/**
 * Table Component
 *
 * @package Starter
 * @var array $strt_table_options
 */

$strt_table         = get_sub_field( 'table' );
$strt_table_options = get_sub_field( 'table_options' );
if ( $strt_table ) :
	echo '<div class="table-responsive">';
	echo '<table class="table ' . esc_attr( implode( ' ', $strt_table_options ) ) . ' ">';
	if ( $strt_table['header'] ) :
		echo '<thead class="thead-light">';
		echo '<tr>';
		foreach ( $strt_table['header'] as $strt_head ) :
			echo '<th scope="col">' . esc_attr( $strt_head['c'] ) . ' </th>';
		endforeach;
		echo '</tr>';
		echo '</thead>';
	endif;
	echo '<tbody>';
	foreach ( $strt_table['body'] as $strt_row ) :
		echo '<tr>';
		foreach ( $strt_row as $strt_data ) :
			echo '<td>' . esc_attr( $strt_data['c'] ) . ' </td>';
		endforeach;
		echo '</tr>';
	endforeach;
	echo '</tbody>';
	echo '</table>';
	echo '</div>';
endif;
