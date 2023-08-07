<?php
/**
 * Functions for use with Flexbuilder
 *
 * @package Starter
 */

/**
 * Returns correct image size for the column layout
 *
 * @param string $columns_layout the column layout.
 * @param string $image_ratio the image ratio option.
 */
function strt_image_size( $columns_layout, $image_ratio ) {
	$image_size = 'col-' . $columns_layout . ( $image_ratio ? '-' . $image_ratio : '' );
	return $image_size;
}

/**
 * Simple function to pretty up our field partial includes.
 *
 * @param string $partial The file to include.
 */
function strt_get_field_partial( $partial ) {
	$partial = str_replace( '.', '/', $partial );
	return include get_template_directory() . "/flexbuilder/fields/{$partial}.php";
}

/**
 * Enqueue flexeditor-style in the WordPress admin edit pages.
 *
 * @param int $hook Hook suffix for the current admin page.
 */
function strt_enqueue_admin_script( $hook ) {
	if ( 'post.php' !== $hook ) {
		return;
	}
	wp_enqueue_style( 'backend', get_template_directory_uri() . '/assets/dist/css/backend.css', array(), '1.0' );
}
add_action( 'admin_enqueue_scripts', 'strt_enqueue_admin_script' );

/**
 * Custom validation for 'Anchor ID' field.
 *
 * @param boolean $valid Whether the input value valid or not.
 * @param string  $value The value of the Anchor ID field.
 */
function strt_acf_validate_value( $valid, $value ) {
	// Bail early if value is already invalid.
	if ( true !== $valid ) {
		return $valid;
	}
	// Prevent value from saving if it contains spaces of special characters.
	if ( is_string( $value ) && str_contains( $value, ' ' ) !== false || preg_match( '/[\'^£$%&*()}{@#~?><>,|=+¬]/', $value ) ) {
		return 'Do not use any spaces or special characters.';
	}
	return $valid;
}
add_filter( 'acf/validate_value/name=anchor_id', 'strt_acf_validate_value', 10, 4 );

/**
 * Function for opening the section wrapper classes
 */
function strt_start_section() {
	$strt_section_width   = get_sub_field( 'section_width' );
	$strt_container       = ( ! empty( $strt_section_width ) ) ? $strt_section_width : 'container';
	$strt_bg_color        = get_sub_field( 'bg_color' );
	$strt_bg_image        = get_sub_field( 'bg_image' );
	$strt_bg_repeat       = get_sub_field( 'bg_repeat' );
	$strt_anchor_id       = get_sub_field( 'anchor_id' );
	$strt_anchor_id       = ( $strt_anchor_id ) ? ' id="' . $strt_anchor_id . '"' : '';
	$strt_section_classes = array( $strt_bg_color );

	if ( ! empty( $strt_bg_color ) ) :
		if ( 'bg-img text-light' === $strt_bg_color && ! empty( $strt_bg_image ) ) :
			$strt_url    = wp_get_attachment_image_url( $strt_bg_image, 'col-12' );
			$strt_repeat = ( $strt_bg_repeat ? array_push( $strt_section_classes, 'bg-repeat' ) : '' );
			$strt_style  = ' style="background-image: url(' . $strt_url . ');"';
		else :
			$strt_style = '';
		endif;
		printf(
			'<section%s class="pt-5 py-lg-5 py-xl-6 %s"%s><div class="%s">',
			wp_kses_post( $strt_anchor_id ),
			esc_attr( implode( ' ', $strt_section_classes ) ),
			wp_kses_post( $strt_style ),
			esc_attr( $strt_container )
		);
	else :
		printf(
			'<section%s class="mb-lg-5 mb-xl-6 %s">',
			wp_kses_post( $strt_anchor_id ),
			esc_attr( $strt_container )
		);

	endif;
}

/**
 * Function for closing the section wrapper classes
 */
function strt_end_section() {
	if ( get_sub_field( 'bg_color' ) ) :
			echo '</div></section>';
		else :
			echo '</section>';
	endif;
}
