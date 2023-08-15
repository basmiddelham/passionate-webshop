<?php
/**
 * @function    Check if 'iDeal gateway only' product categories are in the Cart
 * @author      Bas Middelham
 */
 function check_ideal_cats_in_cart() {
	// Set $cat_in_cart to false
	$cat_in_cart = false;

	// Get 'Ideal only' categories from ACF options page
	$ideal_only_cats = get_field('ideal_only', 'option');

	if ($ideal_only_cats) {
		// Create a global array for products that matched to be displayed in messages.
		global $matched_products;
		$matched_products = [];

		// Loop through all products in the Cart        
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

			// Get the product categories and add to an array
			$get_the_terms = get_the_terms($cart_item['product_id'], 'product_cat');
			$product_cats = [];
			foreach ($get_the_terms as $product_cat) {
				array_push($product_cats, $product_cat->term_id);
			}

			// See what categories match
			$match_cats = array_intersect($product_cats, $ideal_only_cats);

			// If categories match, set $cat_in_cart to true
			if ($match_cats) {
				$cat_in_cart = true;

				// Add title of the matching product to $matched_products array
				array_push($matched_products, get_the_title($cart_item['product_id']));
			}
		}
		return $cat_in_cart;
	}
}

/**
 * @function    Check if 'iDeal gateway only' products are in the Cart
 * @author      Bas Middelham
 */
function check_ideal_products_in_cart() {

	// Make sure it's only on front end
	if (!is_admin()) {

		// If cart is empty - bail and return false
		if (is_null((WC()->cart))) {

			return false;

		} else {


			// Set $products_in_cart to false
			$products_in_cart = false;

			// Enable global array for products that matched to be displayed in messages.
			global $matched_products;

			// Loop through all products in the Cart        
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {

				// Get 'Ideal only' ACF option
				$ideal_only_product = get_post_meta($cart_item['product_id'], 'ideal_only_product', true);

				// Set $products_in_cart to true if option is enabled
				if ('1' === $ideal_only_product) {
					$products_in_cart = true;

					// Add title of the matching product to $matched_products array
					array_push($matched_products, get_the_title($cart_item['product_id']));
				}
			}
			return $products_in_cart;
		}
	}
}

/**
 * @snippet  Display a notice in the Cart when a product in the Cart matches an 'iDeal Gateway Only' category
 * @author   Bas Middelham
 */
add_action('woocommerce_before_cart', function () {
	if ( ! is_cart() ) return;

	global $matched_products;

	// Print a notice if a product in the cart is iDeal only   
	if ( check_ideal_cats_in_cart() || check_ideal_products_in_cart() ) {
		wc_print_notice( 'Let op: één of meerdere producten in uw cart kunnen alleen met iDeal (online) betaald worden. 
		Andere betaalopties zullen niet worden getoond: <strong>' . implode(", ", $matched_products) . '</strong>.');
	}
});

/**
 * @snippet  Display an alert message above payment gateways when a product in the Cart matches an 'iDeal Gateway Only' category
 * @author   Bas Middelham
 */
add_filter( 'woocommerce_review_order_before_payment', function () {
	if ( ! is_checkout() ) return;

	global $matched_products;

	// Show an alert if a product in the cart is iDeal only   
	if ( check_ideal_cats_in_cart() || check_ideal_products_in_cart() ) {
		echo '<div class="alert alert-warning">Let op: één of meerdere producten in uw cart kunnen alleen met iDeal (online) betaald worden. 
		Andere betaalopties zullen niet worden getoond: <strong>' . implode(", ", $matched_products) . '</strong>.</div>';
	}
});

/**
 * @snippet  Disable other gateways when a product in the Cart matches an 'iDeal Gateway Only' category
 * @author   Bas Middelham
 */
add_filter( 'woocommerce_available_payment_gateways', function ( $available_gateways ) {
	if ( ! is_checkout() ) return;

	// Do something if a product in the cart is iDeal only   
	if ( check_ideal_cats_in_cart() || check_ideal_products_in_cart() ) {

		// Loop through all payment gateways and disable all except iDeal
		foreach ($available_gateways as $gateway => $val) {
			if ('mollie_wc_gateway_ideal' !== $gateway) {
				unset( $available_gateways[$gateway] );
			}
		}
	}
  return $available_gateways;
});
