<?php
/**
 * Tabs Component
 *
 * @package Starter
 */

if ( have_rows( 'tabs' ) ) :
	$strt_tabs_id = wp_unique_id();
	echo '<ul class="nav nav-tabs" role="tablist">';
	while ( have_rows( 'tabs' ) ) :
		the_row();
		$strt_active   = ( ( 1 === get_row_index() ) ? ' active' : '' );
		$strt_selected = ( ( 1 === get_row_index() ) ? 'true' : 'false' );
		$strt_row_id   = esc_attr( $strt_tabs_id . get_row_index() );
		printf(
			'<li class="nav-item" role="presentation">
				<button type="button" role="tab" class="nav-link%s" id="tab_%s" data-bs-toggle="tab" data-bs-target="#tabcontent_%s" aria-controls="tabcontent_%s" aria-selected="%s">
					%s
				</button>
			</li>',
			esc_attr( $strt_active ),
			esc_attr( $strt_row_id ),
			esc_attr( $strt_row_id ),
			esc_attr( $strt_row_id ),
			esc_attr( $strt_selected ),
			esc_html( get_sub_field( 'title' ) )
		);
	endwhile;
	echo '</ul>';
	echo '<div class="tab-content p-3 border-start border-bottom border-end">';
	while ( have_rows( 'tabs' ) ) :
		the_row();
		$strt_active = ( ( 1 === get_row_index() ) ? ' show active' : '' );
		$strt_row_id = esc_attr( $strt_tabs_id . get_row_index() );
		printf(
			'<div class="tab-pane fade%s" id="tabcontent_%s" role="tabpanel" aria-labelledby="tab_%s">',
			esc_attr( $strt_active ),
			esc_attr( $strt_row_id ),
			esc_attr( $strt_row_id )
		);
		if ( have_rows( 'content' ) ) :
			while ( have_rows( 'content' ) ) :
				the_row();
				get_template_part( 'flexbuilder/templates/components/' . get_row_layout() );
				endwhile;
			endif;
		echo '</div>';
	endwhile;
	echo '</div>';
endif;
