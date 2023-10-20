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
 *
 * @param array $fields WooCommerce Checkout fields.
 */
function strt_checkout_fields( $fields ) {
	// Add placeholders.
	$fields['billing']['billing_email']['placeholder'] = 'E-mailadres*';
	$fields['billing']['billing_phone']['placeholder'] = 'Telefoon (optioneel)';

	// Change layout of phone and email fields.
	$fields['billing']['billing_phone']['priority'] = 110;
	$fields['billing']['billing_email']['priority'] = 100;
	$fields['billing']['billing_phone']['class'][0] = 'form-row-last';
	$fields['billing']['billing_email']['class'][0] = 'form-row-first';

	// Make fields optional.
	$fields['billing']['billing_phone']['required'] = false;

	// Create PO code field.
	$fields['billing']['billing_po_code'] = array(
		'type'        => 'text',
		'label'       => 'Inkoopordernummer',
		'placeholder' => 'Inkoopordernummer (Optioneel)',
		'required'    => false,
		'class'       => array( 'po_code' ),
	);

	return $fields;
}
add_filter( 'woocommerce_checkout_fields', 'strt_checkout_fields' );

/**
 * Display custom field value on the order edit page
 */
function strt_checkout_field_display_admin_order_meta( $order ) {
	echo '<p><strong>Inkoopordernummer:</strong> ' . get_post_meta( $order->get_id(), '_billing_po_code', true ) . '</p>';
}
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'strt_checkout_field_display_admin_order_meta', 10, 1 );

/**
 * Add a custom field (in an order) to the emails
 */
function strt_display_email_order_meta( $order, $sent_to_admin, $plain_text ) {
	$po_code = get_post_meta( $order->get_id(), '_billing_po_code', true );
	if ( $po_code ) {
		if ( $plain_text ) {
			echo 'Inkoopordernummer: ' . $po_code;
		} else {
			echo '<h2><strong>Inkoopordernummer: </strong>' . $po_code . '</h2>';
		}
	}
}
add_action( 'woocommerce_email_order_meta', 'strt_display_email_order_meta', 10, 4 );

/**
 * Customize WooCommerce Address Checkout fields.
 *
 * @param array $fields WooCommerce DefaultAddress Checkout fields.
 */
function strt_default_address_fields( $fields ) {
	// Remove fields.
	// unset( $fields['address_2'] );

	// Placeholders.
	$fields['first_name']['placeholder'] = 'Voornaam*';
	$fields['last_name']['placeholder']  = 'Achternaam*';
	$fields['postcode']['placeholder']   = 'Postcode*';
	$fields['city']['placeholder']       = 'Plaats*';
	$fields['company']['placeholder']    = 'Schoolnaam (optioneel)';
	$fields['company']['label']          = 'Schoolnaam';

	$fields['address_1']['placeholder']  = 'Straatnaam*';
	$fields['address_2']['placeholder']  = 'Huisnummer*';
	$fields['address_1']['label']        = 'Straatnaam';
	$fields['address_2']['label']        = 'Huisnummer';
	$fields['address_2']['label_class']  = '';
	$fields['address_1']['class'][0]     = 'form-row-first';
	$fields['address_2']['class'][0]     = 'form-row-last';

	// Change postcode and city layout.
	$fields['postcode']['class'][0] = 'form-row-first';
	$fields['city']['class'][0]     = 'form-row-last';

	// Create salutation field.
	$salutation = array(
		'salutation' => array(
			'type'        => 'select',
			'label'       => 'Aanhef',
			'required'    => false,
			'class'       => array( 'select form-row-wide' ),
			'options'     => array(
				''       => 'Aanhef',
				'female' => 'Mevr.',
				'male'   => 'Dhr.',
			),
		),
	);

	// Add salutation field to checkout page.
	$fields = array_merge( $salutation, $fields );

	// Create middle name field.
	$middle_name = array(
		'middle_name' => array(
			'type'        => 'text',
			'label'       => '',
			'placeholder' => 'Tussenvoegsel',
			'required'    => false,
			'class'       => array( 'middle_name' ),
		),
	);

	// Add $middle_name field to $fields array to position 2 in array.
	$fields = array_merge( array_slice( $fields, 0, 2 ), $middle_name, array_slice( $fields, 2 ) );

	// Add classes to first and last name fields for formatting.
	$fields['first_name']['class'] = 'first_name';
	$fields['last_name']['class']  = 'last_name';

	return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'strt_default_address_fields', 20 );
