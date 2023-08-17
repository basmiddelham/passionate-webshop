<?php
/**
 * WooCommerce Emails
 *
 * @link https://woocommerce.com/
 *
 * @package strt
 */

/**
 * Unhook and remove WooCommerce default emails.
 */
add_action( 'woocommerce_email', 'strt_unhook_those_pesky_emails' );
function strt_unhook_those_pesky_emails( $email_class ) {
	/**
	 * Hooks for sending emails during store events
	 */
	remove_action( 'woocommerce_low_stock_notification', array( $email_class, 'low_stock' ) );
	remove_action( 'woocommerce_no_stock_notification', array( $email_class, 'no_stock' ) );
	remove_action( 'woocommerce_product_on_backorder_notification', array( $email_class, 'backorder' ) );

	// New order emails.
	remove_action( 'woocommerce_order_status_pending_to_processing_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
	remove_action( 'woocommerce_order_status_pending_to_completed_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
	remove_action( 'woocommerce_order_status_pending_to_on-hold_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
	remove_action( 'woocommerce_order_status_failed_to_processing_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
	remove_action( 'woocommerce_order_status_failed_to_completed_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );
	remove_action( 'woocommerce_order_status_failed_to_on-hold_notification', array( $email_class->emails['WC_Email_New_Order'], 'trigger' ) );

	// Processing order emails.
	remove_action( 'woocommerce_order_status_pending_to_processing_notification', array( $email_class->emails['WC_Email_Customer_Processing_Order'], 'trigger' ) );
	remove_action( 'woocommerce_order_status_pending_to_on-hold_notification', array( $email_class->emails['WC_Email_Customer_Processing_Order'], 'trigger' ) );

	// Completed order emails.
	remove_action( 'woocommerce_order_status_completed_notification', array( $email_class->emails['WC_Email_Customer_Completed_Order'], 'trigger' ) );

	// Note emails.
	remove_action( 'woocommerce_new_customer_note_notification', array( $email_class->emails['WC_Email_Customer_Note'], 'trigger' ) );
}

/**
 * WooCommerce Email - Add text before table when BACS is used
 */
add_action( 'woocommerce_email_before_order_table',
	function() {
		if ( ! class_exists( 'WC_Payment_Gateways' ) ) return;
		$gateways           = WC_Payment_Gateways::instance(); // gateway instance.
		$available_gateways = $gateways->get_available_payment_gateways();
		if ( isset( $available_gateways['bacs'] ) ) {
			echo '<p>U ervoor gekozen om op factuur te betalen. U kunt de betaling o.v.v. het factuurnummer overmaken aan:</p>
			<p><strong>Stichting Passionate Bulkboek</strong><br />
			Rekeningnummer: NL14INGB0005620336<br />
			BIC: INGBNL2A<br />
			BTW NR.: 8045.3766.5 B01<br />
			KvK: 41135304</p>';
		}
	},
	10,
	4
);

/**
 * WooCommerce Email - Change text above the footer
 */
function passionate_email_footer() {
	echo '<p><strong>Stichting Passionate Bulkboek</strong><br />
	Westersingel 16<br />
	3014 GN Rotterdam</p>
	<p>Heeft u vragen? Neem dan <a href="mailto:verkoop@passionatebulkboek.nl">contact</a> met ons op.</p>';
}
add_action( 'woocommerce_email_footer', 'passionate_email_footer', 10, 1 );

/**
 * Add message to WooCommerce email if shipping method is local pickup.
 */
// function add_order_email_instructions( $order, $sent_to_admin ) {
// 	$shipping_method = @array_shift( $order->get_shipping_methods() );
// 	$shipping_method_id = $shipping_method['method_id'];
// 	if ( ! $sent_to_admin ) {
// 		if ( 'local_pickup' == $shipping_method_id ) {
// 			// local pickup option
// 			echo '<p><strong>Afhalen:</strong> Neem contact op per <a href="mailto:info@iksieraden.nl">e-mail</a> voor een afspraak.</p>';
// 		} else {
// 			// other methods
// 			echo '';
// 		}
// 	}
// }
// add_action( 'woocommerce_email_before_order_table', 'add_order_email_instructions', 10, 2 );