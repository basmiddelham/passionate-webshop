<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package strt
 */

require get_template_directory() . '/inc/woocommerce/wc-checkout.php';
require get_template_directory() . '/inc/woocommerce/wc-emails.php';

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function strt_woocommerce_setup() {
	add_theme_support(
		'woocommerce',
		array(
			'thumbnail_image_width' => 300,
			'single_image_width'    => 450,

			'product_grid'          => array(
				'default_columns' => 4,
				'min_columns'     => 4,
				'max_columns'     => 4,
			),
		)
	);
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'strt_woocommerce_setup' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function strt_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 4,
		'columns'        => 4,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'strt_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'strt_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function strt_woocommerce_wrapper_before() {
		?>
			<div class="container">
				<div class="row justify-content-center">
					<main id="primary" class="col-xxl-9">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'strt_woocommerce_wrapper_before' );

if ( ! function_exists( 'strt_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function strt_woocommerce_wrapper_after() {
		?>
					</main>
					<?php get_sidebar(); ?>
				</div>
			</div>
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'strt_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'strt_woocommerce_header_cart' ) ) {
			strt_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'strt_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function strt_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		strt_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'strt_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'strt_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function strt_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'strt' ); ?>">
			<?php echo wp_kses_post( strt_get_icon_svg( 'ui', 'shop', 24 ) ); ?>
			<span class="count"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
		</a>
		<?php
	}
}

if ( ! function_exists( 'strt_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function strt_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php strt_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

/**
 * Custom Woocommerce product search.
 *
 * @param string $form The search form markup.
 */
function strt_get_product_search_form( $form ) {
	$form = '<form role="search" method="get" class="woocommerce-product-search" action="' . esc_url( home_url( '/' ) ) . '">
		<label class="screen-reader-text" for="woocommerce-product-search-field">' . esc_html__( 'Search for:', 'strt' ) . '</label>
		<div class="input-group">
			<input type="search" 
				id="woocommerce-product-search-field" 
				class="search-field form-control" 
				placeholder="Zoek producten&hellip;" 
				value="' . get_search_query() . '" 
				name="s" />
			<button type="submit" 
				class="btn btn-primary" 
				value="' . esc_attr_x( 'Search', 'submit button', 'strt' ) . '">'
				. esc_html_x( 'Search', 'submit button', 'strt' ) . '</button>
				</div>
		<input type="hidden" name="post_type" value="product" />
	</form>';
	return $form;
}
add_filter( 'get_product_search_form', 'strt_get_product_search_form', 10, 2 );

/**
 * Change breadcrumb to Bootstrap defaults
 */
add_filter(
	'woocommerce_breadcrumb_defaults',
	function () {
		return array(
			'delimiter'   => '',
			'wrap_before' => '<nav class="woocommerce-breadcrumb" aria-label="breadcrumb"><ol class="breadcrumb">',
			'wrap_after'  => '</ol></nav>',
			'before'      => '<li class="breadcrumb-item">',
			'after'       => '</li>',
			'home'        => __( 'Home', 'strt' ),
		);
	}
);

/**
 * Hide sidebar on product pages by returning false
 *
 * @param bool $conditionals The sidebar conditionals.
 */
function strt_wc_sidebar_conditional( $conditionals ) {
	if ( is_product() || is_cart() || is_checkout() || is_account_page() )
		return false;
	return $conditionals;
}
add_filter( 'is_active_sidebar', 'strt_wc_sidebar_conditional', 10, 2 );

/**
 * Disable Select2 style and script.
 */
function strt_dequeue_stylesandscripts() {
	if ( class_exists( 'woocommerce' ) ) {
		// wp_dequeue_style( 'select2' );
		// wp_deregister_style( 'select2' );
		// wp_dequeue_script( 'selectWoo' );
		// wp_deregister_script( 'selectWoo' );
	}
}
add_action( 'wp_enqueue_scripts', 'strt_dequeue_stylesandscripts', 100 );

/**
 * Custom text for 'Add to cart' button
 *
 * @param string $text Buton text.
 *
 * @return string String for add to cart text.
 */
function strt_add_to_cart_text( $text ) {
	if ( 'Toevoegen aan winkelwagen' === $text ) {
		return 'In winkelwagen';
	}
	return $text;
}
add_filter( 'woocommerce_product_add_to_cart_text', 'strt_add_to_cart_text', 10, 2 );

/**
 * Display Custom Taxonomy Terms in a Widget Using Shortcode
 *
 * @param array $atts Shortcode attributes.
 */
function strt_terms_shortcode( $atts ) {
	// Attributes.
	$atts = shortcode_atts(
		array(
			'custom_taxonomy' => '',
		),
		$atts
	);

	ob_start();
	$args = array(
		'taxonomy' => $atts['custom_taxonomy'],
		'title_li' => '',
	);
	echo '<ul>' . wp_list_categories( $args ) . '</ul>';
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'strt_terms', 'strt_terms_shortcode' );

/**
 * Allow Text widgets to execute shortcodes
 */
add_filter( 'widget_text', 'do_shortcode' );
