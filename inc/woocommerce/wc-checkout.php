<?php
/**
 * WooCommerce Checkout
 *
 * @link https://woocommerce.com/
 *
 * @package strt
 */

/**
 * Customize WooCommerce Checkout fields.
 */
// function strt_checkout_fields( $fields ) {
// 	// Add placeholders.
// 	$fields['billing']['billing_email']['placeholder'] = 'E-mailadres';
// 	$fields['billing']['billing_phone']['placeholder'] = 'Telefoon';

// 	// Change layout of phone and email fields.
// 	$fields['billing']['billing_phone']['priority'] = 110;
// 	$fields['billing']['billing_email']['priority'] = 100;
// 	$fields['billing']['billing_phone']['class'][0] = 'form-row-last';
// 	$fields['billing']['billing_email']['class'][0] = 'form-row-first';

// 	// Make fields optional.
// 	$fields['billing']['billing_phone']['required'] = false;

// 	return $fields;
// }
// add_filter( 'woocommerce_checkout_fields' , 'strt_checkout_fields' );

/**
 * Customize WooCommerce Address Checkout fields.
 */
// function strt_default_address_fields( $fields ) {
// 	// Remove fields.
// 	unset( $fields['address_2'] );

// 	// Placeholders.
// 	$fields['postcode']['placeholder']   = 'Postcode';
// 	$fields['city']['placeholder']       = 'Plaats';
// 	$fields['first_name']['placeholder'] = 'Voornaam';
// 	$fields['last_name']['placeholder']  = 'Achternaam';
// 	$fields['company']['placeholder']    = 'Bedrijf (optioneel)';

// 	// Change postcode and city layout.
// 	if ( is_checkout() ) {
// 		$fields['postcode']['class'][0] = 'form-row-first';
// 		$fields['city']['class'][0]     = 'form-row-last';
// 	}

// 	return $fields;
// }
// add_filter('woocommerce_default_address_fields', 'strt_default_address_fields', 20);
