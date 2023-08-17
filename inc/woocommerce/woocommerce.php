<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package strt
 */

require_once get_template_directory() . '/inc/woocommerce/wc-checkout.php';
require_once get_template_directory() . '/inc/woocommerce/wc-emails.php';
// require_once get_template_directory() . '/inc/woocommerce/wc-gateway.php';
// require_once get_template_directory() . '/inc/woocommerce/wc-bacs-only.php';
// require_once get_template_directory() . '/inc/woocommerce/wc-ideal-only.php';
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
				'min_columns'     => 3,
				'max_columns'     => 3,
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
					<main id="primary" class="col-lg-9">
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


// Disable WooCommerce breadcrumbs.
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

// Remove result count from archives.
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

// Remove catelog ordering from archives.
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// Remove cart button from archives.
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');

/**
 * Add header image to seperate shops.
 */
function strt_before_main_content() {
	if ( is_tax( 'project' ) ) {
		add_filter( 'woocommerce_show_page_title', '__return_empty_array' );
		$queried_object = get_queried_object();
		$project_header = get_field( 'project_header', $queried_object );
		if ( $project_header ) {
			echo '<div class="project-header mb-4">' . wp_get_attachment_image( $project_header, 'project_header' ) . '</div>';
		}
	}
}
add_action( 'woocommerce_before_main_content', 'strt_before_main_content', 20, 0 );

/**
 * Add Cultuurkaart badge to archive.
 */
function strt_before_shop_loop_item_title() {
	// Add Cultuurkaart badge.
	if ( get_field( 'cultuurkaart' ) ) {
		echo '<div class="ck_badge-overlay">
				<span class="top-right ck_badge">Cultuurkaart</span>
			</div>';
	}
}
add_action( 'woocommerce_before_shop_loop_item_title', 'strt_before_shop_loop_item_title', 5 );

/**
 * Add Cultuurkaart badge to Single product.
 */
function strt_single_product_image_thumbnail_html( $wc_get_gallery_image_html ) {
	if ( get_field( 'cultuurkaart' ) ) {
		$wc_get_gallery_image_html .= '<div class="ck_badge-overlay single-product">
				<span class="bottom-right ck_badge">Cultuurkaart</span>
			</div>';
	}
	return $wc_get_gallery_image_html;
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'strt_single_product_image_thumbnail_html' );

/**
 * Add Project badge to archive.
 */
function strt_template_loop_product_thumbnail() {
	global $post;
	$terms = get_the_terms( $post->ID, 'project' );
	if ( $terms && ! is_wp_error( $terms ) ) :
		$project = $terms[0];
	endif;
	echo '<div class="product-thumb">';
	echo woocommerce_get_product_thumbnail();
	echo '<span class="project-badge ' . $project->slug . '"></span>';
	echo '</div>';
}
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'strt_template_loop_product_thumbnail', 10 );

/**
 * Add Project badge to Single product.
 */
function strt_add_project_badge( $wc_get_gallery_image_html ) {
	global $post;
	$terms = get_the_terms( $post->ID, 'project' );
	if ( $terms && ! is_wp_error( $terms ) ) :
		$project = $terms[0];
	endif;
	$wc_get_gallery_image_html .= '<span class="project-badge single-product ' . $project->slug . '"></span>';
	return $wc_get_gallery_image_html;
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'strt_add_project_badge' );

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
				class="search-field form-control form-control-sm" 
				placeholder="Zoek producten&hellip;" 
				value="' . get_search_query() . '" 
				name="s" />
			<button type="submit" 
				class="btn btn-sm btn-primary" 
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
	if ( is_cart() || is_checkout() || is_account_page() )
		return false;
	return $conditionals;
}
add_filter( 'is_active_sidebar', 'strt_wc_sidebar_conditional', 10, 2 );

/**
 * Disable Select2 style and script.
 */
function strt_dequeue_stylesandscripts() {
	if ( class_exists( 'woocommerce' ) ) {
		wp_dequeue_style( 'select2' );
		wp_deregister_style( 'select2' );
		wp_dequeue_script( 'selectWoo' );
		wp_deregister_script( 'selectWoo' );
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
	$atts = shortcode_atts(
		array(
			'custom_taxonomy' => '',
		),
		$atts
	);
	ob_start();
	$taxonomies = get_terms(
		array(
			'taxonomy' => $atts['custom_taxonomy'],
		)
	);
	if ( ! empty( $taxonomies ) ) :
		$output = '<div class="list-group">';
		foreach ( $taxonomies as $category ) {
			$output .= '<a class="list-group-item list-group-item-action" href="' . esc_url( get_term_link( $category->term_id ) ) . '" id="' . esc_attr( $category->term_id ) . '">
				' . esc_html( $category->name ) . '</li>';
		}
		$output .= '</a>';
		echo wp_kses_post( $output );
	endif;
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'strt_terms', 'strt_terms_shortcode' );

/**
 * Shopnav shortcode
 */
function strt_shopnav_shortcode() {
	ob_start();
	echo get_template_part( 'template-parts/shopnav' );
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'shopnav', 'strt_shopnav_shortcode' );

/**
 * Doelgroep shortcode
 */
function strt_doelgroep_shortcode() {
	ob_start();

	$strt_doelgroep = get_terms(
		array(
			'taxonomy'   => 'pa_doelgroep',
			'hide_empty' => false,
		)
	);
	if ( ! empty( $strt_doelgroep ) ) :
		$strt_output = '<ul class="shop_doelgroep">';
		foreach ( $strt_doelgroep as $strt_cat ) {
			$strt_output .= '<li><a class="btn" href="' . get_term_link( $strt_cat->term_id ) . '">' . $strt_cat->name . '</a></li>';
		}
		$strt_output .= '</ul>';
		echo $strt_output;
	endif;

	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'shop_doelgroep', 'strt_doelgroep_shortcode' );

/**
 * Category shortcode
 */
function strt_cat_shortcode() {
	ob_start();

	$strt_taxonomies = get_terms(
		array(
			'taxonomy'   => 'product_cat',
			'hide_empty' => true,
			'exclude'    => array( 15 ),
		)
	);
	if ( ! empty( $strt_taxonomies ) ) :
		$strt_output = '<ul class="shop_category">';
		foreach ( $strt_taxonomies as $strt_cat ) {
			$strt_output .= '<li><a class="btn" href="' . get_term_link( $strt_cat->term_id ) . '">' . $strt_cat->name . '</a></li>';
		}
		$strt_output .= '</ul>';
		echo $strt_output;
	endif;

	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
add_shortcode( 'shop_category', 'strt_cat_shortcode' );

/**
 * Remove taxonomy from url
 *
 * @param array $query The query.
 */
function strt_change_term_request( $query ) {
	$tax_name = 'project';

	// Request for child terms differs, we should make an additional check.
	if ( isset( $query['attachment'] ) ) :
		$include_children = true;
		$name             = $query['attachment'];
	elseif ( isset( $query['name'] ) ) :
		$include_children = false;
		$name             = $query['name'];
	endif;

	if ( isset( $name ) ) :
		$term = get_term_by( 'slug', $name, $tax_name ); // get the current term to make sure it exists.
	endif;

	if ( isset( $name ) && $term && ! is_wp_error( $term ) ) : // check it here.
		if ( $include_children ) {
			unset( $query['attachment'] );
			$parent = $term->parent;
			while ( $parent ) {
				$parent_term = get_term( $parent, $tax_name );
				$name        = $parent_term->slug . '/' . $name;
				$parent      = $parent_term->parent;
			}
		} else {
			unset( $query['name'] );
		}

		switch ( $tax_name ) :
			case 'category':
				$query['category_name'] = $name; // for categories.
				break;
			case 'post_tag':
				$query['tag'] = $name; // for post tags.
				break;
			default:
				$query[ $tax_name ] = $name; // for another taxonomies.
				break;
		endswitch;

	endif;

	return $query;
}
add_filter( 'request', 'strt_change_term_request', 1, 1 );

/**
 * Generate rewrite rules for custom taxonomy archives
 *
 * @param string $url The rewrite rules.
 * @param array  $term The term.
 * @param array  $taxonomy The taxonomy.
 */
function strt_term_permalink( $url, $term, $taxonomy ) {
	$taxonomy_name = 'project'; // your taxonomy name here.
	$taxonomy_slug = 'project'; // the taxonomy slug can be different with the taxonomy name (like 'post_tag' and 'tag' ).

	// exit the function if taxonomy slug is not in URL.
	if ( strpos( $url, $taxonomy_slug ) === false || $taxonomy !== $taxonomy_name ) :
		return $url;
	endif;
	$url = str_replace( '/' . $taxonomy_slug, '', $url );

	return $url;
}
add_filter( 'term_link', 'strt_term_permalink', 10, 3 );

/**
 * Customize text
 */
add_filter( 'gettext', 'translate_text' );
add_filter( 'ngettext', 'translate_text' );
function translate_text( $translated ) {
	$translated = str_ireplace( 'Je winkelwagen is momenteel leeg.', 'Uw winkelwagen is momenteel leeg.', $translated );
	return $translated;
}

/**
 * Auto Complete all WooCommerce orders.
 */
add_action( 'woocommerce_thankyou', 'passionate_woocommerce_auto_complete_order' );
function passionate_woocommerce_auto_complete_order( $order_id ) {
	if ( ! $order_id ) {
		return;
	}
	$order = wc_get_order( $order_id );
	$order->update_status( 'completed' );
}

/**
 * Add CKT form to Sigle Product on Cultuurkaart Tegoed products
 */
function strt_template_single_excerpt() {
	wc_get_template( 'single-product/short-description.php' );
	if ( get_field( 'cultuurkaart' ) ) {
		gravity_form( 'Cultuurkaart Betaling', false, false, false, null, true );
	}
}
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'strt_template_single_excerpt', 20 );
