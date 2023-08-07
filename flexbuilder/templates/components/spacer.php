<?php
/**
 * Spacer Component
 *
 * @package Starter
 */

echo '<div class="w-100 py-' . esc_attr( get_sub_field( 'spacer_size' ) ) . '">';
if ( get_sub_field( 'show_divider' ) ) :
	echo '<hr>';
endif;
echo '</div>';
