<?php
/**
 * Alert Component
 *
 * @package Starter
 */

$strt_alert_color = get_sub_field( '_color' );
echo '<div class="alert ' . esc_attr( $strt_alert_color ) . '" role="alert">';
if ( have_rows( 'content_small' ) ) :
	while ( have_rows( 'content_small' ) ) :
		the_row();
		get_template_part( 'flexbuilder/templates/components/' . get_row_layout() );
	endwhile;
endif;
echo '</div>';
