<?php
/**
 * Accordion Component
 *
 * @package Starter
 */

$strt_acc = get_sub_field( 'accordion' );
if ( $strt_acc ) :
	$strt_acc_id = wp_unique_id();
	echo '<div id="accordion_' . esc_attr( $strt_acc_id ) . '" class="accordion">';
	foreach ( $strt_acc as $strt_index => $strt_acc_item ) :
		$strt_show      = ( ( 0 === $strt_index ) ? 'show' : '' );
		$strt_collapsed = ( ( 0 !== $strt_index ) ? 'collapsed' : '' );
		$strt_aria      = ( ( 0 === $strt_index ) ? 'true' : 'false' );
		$strt_item_id   = $strt_acc_id . $strt_index;
		echo '<div class="accordion-item">';
		echo '<h2 id="heading_' . esc_attr( $strt_item_id ) . '" class="accordion-header">';
		printf(
			'<button type="button" 
				class="accordion-button %s" 
				aria-expanded="%s" 
				aria-controls="content_%s" 
				data-bs-toggle="collapse" 
				data-bs-target="#content_%s">
				%s
			</button>',
			esc_attr( $strt_collapsed ),
			esc_attr( $strt_aria ),
			esc_attr( $strt_item_id ),
			esc_attr( $strt_item_id ),
			esc_attr( $strt_acc_item['title'] )
		);
		echo '</h2>';
		printf(
			'<div class="accordion-collapse collapse %s" 
				id="content_%s" 
				aria-labelledby="heading_%s" 
				data-bs-parent="#accordion_%s">
				<div class="accordion-body">%s</div>
			</div>',
			esc_attr( $strt_show ),
			esc_attr( $strt_item_id ),
			esc_attr( $strt_item_id ),
			esc_attr( $strt_acc_id ),
			wp_kses_post( $strt_acc_item['content'] )
		);
		echo '</div>';
	endforeach;
	echo '</div>';
endif;
