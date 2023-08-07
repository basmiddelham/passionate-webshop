<?php
/**
 * Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Starter
 */


// define('ALLOW_UNFILTERED_UPLOADS', true);

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function strt_setup() {
	load_theme_textdomain( 'strt', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus(
		array(
			'primary-navigation' => esc_html__( 'Primary', 'strt' ),
			'social'             => esc_html__( 'Social', 'strt' ),
		)
	);
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_editor_style( 'assets/dist/css/tinymce.css' );

	/**
	 * Add images sizes
	 */
	set_post_thumbnail_size( 200, 200, true );
	add_image_size( 'col-3', 290, 0, false );
	add_image_size( 'col-3-4x3', 290, 218, true );
	add_image_size( 'col-3-16x9', 290, 163, true );
	add_image_size( 'col-4', 400, 0, false );
	add_image_size( 'col-4-4x3', 400, 300, true );
	add_image_size( 'col-4-16x9', 400, 225, true );
	add_image_size( 'col-5', 510, 0, false );
	add_image_size( 'col-5-4x3', 510, 382.5, true );
	add_image_size( 'col-5-16x9', 510, 286.88, true );
	add_image_size( 'col-6', 620, 0, false );
	add_image_size( 'col-6-4x3', 620, 465, true );
	add_image_size( 'col-6-16x9', 620, 349, true );
	add_image_size( 'col-7', 730, 0, false );
	add_image_size( 'col-7-4x3', 730, 547, true );
	add_image_size( 'col-7-16x9', 730, 411, true );
	add_image_size( 'col-8', 840, 0, false );
	add_image_size( 'col-8-4x3', 840, 630, true );
	add_image_size( 'col-8-16x9', 840, 472, true );
	add_image_size( 'col-9', 950, 0, false );
	add_image_size( 'col-9-4x3', 950, 712, true );
	add_image_size( 'col-9-16x9', 950, 534, true );
	add_image_size( 'col-12', 1280, 0, false );
	add_image_size( 'col-12-4x3', 1280, 960, true );
	add_image_size( 'col-12-16x9', 1280, 720, true );
	add_image_size( 'ig6-1x1', 340, 340, true );
	add_image_size( 'ig6-1x1-@2x', 510, 510, true );
	add_image_size( 'ig6-16x9', 340, 191, true );
}
add_action( 'after_setup_theme', 'strt_setup' );

/**
 * Make Custom Image Sizes Selectable in Admin
 */
add_filter(
	'image_size_names_choose',
	function ( $sizes ) {
		return array_merge(
			$sizes,
			array(
				'col-3'  => '3/12',
				'col-4'  => '4/12',
				'col-5'  => '5/12',
				'col-6'  => '6/12',
				'col-7'  => '7/12',
				'col-8'  => '8/12',
				'col-9'  => '9/12',
				'col-12' => '12/12',
			)
		);
	}
);

/**
 * Remove default image sizes.
 *
 * @param array $sizes WordPress default image sizes.
 */
function strt_remove_default_img_sizes( $sizes ) {
	$targets = array(
		'medium_large',
		'large',
		'1536x1536',
		'2048x2048',
	);
	foreach ( $sizes as $size_index => $size ) {
		if ( in_array( $size, $targets, true ) ) {
			unset( $sizes[ $size_index ] );
		}
	}
	return $sizes;
}
add_filter( 'intermediate_image_sizes', 'strt_remove_default_img_sizes', 10, 1 );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function strt_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'strt_content_width', 1280 );
}
add_action( 'after_setup_theme', 'strt_content_width', 0 );

/**
 * Register widget area.
 */
function strt_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'strt' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'strt' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'strt_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function strt_scripts() {
	// Create Template variables to pass to scripts.
	$template_vars = array(
		'expand'            => __( 'Expand submenu', 'strt' ),
		'collapse'          => __( 'Collapse submenu', 'strt' ),
		'templateDirectory' => get_template_directory_uri(),
		'homeDirectory'     => home_url(),
	);

	// Set versions based on last modification time to avoid caching.
	$css_ver = gmdate( 'ymd-Gis', filemtime( plugin_dir_path( __FILE__ ) . 'assets/dist/css/frontend.css' ) );
	$js_ver  = gmdate( 'ymd-Gis', filemtime( plugin_dir_path( __FILE__ ) . 'assets/dist/js/frontend.js' ) );

	// Enqueue styles.
	wp_enqueue_style( 'strt-stylesheet', get_stylesheet_directory_uri() . '/assets/dist/css/frontend.css', array(), $css_ver );

	// Enqueue scripts.
	wp_enqueue_script( 'strt-scripts', get_template_directory_uri() . '/assets/dist/js/frontend.js', array(), $js_ver, true );

	// Pass translatable strings to strt-scripts.
	wp_localize_script( 'strt-scripts', 'TemplateVars', $template_vars );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'strt_scripts' );

// Custom template tags for the theme.
require get_template_directory() . '/inc/template-tags.php';

// Enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// Menu functions and filters.
require get_template_directory() . '/inc/menu-functions.php';

// SVG Icons class.
require get_template_directory() . '/inc/class-strt-svg-icons.php';

// TinyMCE customisations.
require get_template_directory() . '/inc/tinymce.php';

// Cleanup <head> and admin-bar.
require get_template_directory() . '/inc/cleanup.php';

// Load Flexbuilder files.
require_once 'vendor/autoload.php';
require get_template_directory() . '/flexbuilder/flexbuilder-functions.php';
require get_template_directory() . '/flexbuilder/fields/flexbuilder.php';

// Load Gravity Forms hooks.
if ( class_exists( 'GFCommon' ) ) {
	require get_template_directory() . '/inc/gravityforms.php';
}

// Load WooCommerce.
if ( class_exists( 'woocommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce/woocommerce.php';
}

/**
 * Custom login logo.
 */
function strt_custom_login_logo() {
	echo '<style type="text/css">
		#login h1 a {
			background-image: url("' . esc_url( get_stylesheet_directory_uri() ) . '/assets/dist/images/logo-login.svg");
			height: 72px;
			width:320px;
			background-size: 320px 72px;
		}
	</style>';
}
add_action( 'login_enqueue_scripts', 'strt_custom_login_logo' );

/**
 * Generate custom search form
 *
 * @param string $form Form HTML.
 * @return string Modified form HTML.
 */
function strt_search_form( $form ) {
	$form = '<form role="search" method="get" class="searchform input-group" action="' . home_url( '/' ) . '" >
		<input type="search" class="search-field form-control" id="search-field" name="s" value="' . get_search_query() . '" placeholder="' . esc_attr_x( 'Search …', 'placeholder', 'strt' ) . '" title="' . esc_attr_x( 'Search for:', 'label', 'strt' ) . '" />
		<label class="visually-hidden" for="search-field">' . _x( 'Search for:', 'label', 'strt' ) . '</label>
		<input type="submit" class="search-submit btn btn-primary" value="' . esc_attr_x( 'Search', 'submit button', 'strt' ) . '" />
	</form>';

	return $form;
}
add_filter( 'get_search_form', 'strt_search_form' );

/**
 * Add tags to wp_kses_allowed_html. Needed for svg functions
 *
 * @param array  $tags Allowed tags.
 * @param string $context The context of use.
 */
function strt_add_tags_to_allowed_html( $tags, $context ) {
	// Add iframe tag to so the video component can be sanitized.
	if ( 'acf' === $context ) {
		$tags['iframe'] = array(
			'src'             => true,
			'height'          => true,
			'width'           => true,
			'frameborder'     => true,
			'allowfullscreen' => true,
		);
	}
	// Add SVG tag so get_svg() can be sanitized.
	$tags['svg']  = array(
		'width'       => true,
		'height'      => true,
		'class'       => true,
		'xmlns'       => true,
		'fill'        => true,
		'viewbox'     => true,
		'role'        => true,
		'aria-hidden' => true,
		'focusable'   => true,
	);
	$tags['path'] = array(
		'd'    => true,
		'fill' => true,
	);
	return $tags;
}
add_filter( 'wp_kses_allowed_html', 'strt_add_tags_to_allowed_html', 10, 2 );

/**
 * Filter the excerpt length.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
add_filter(
	'excerpt_length',
	function() {
		return 14;
	}
);

/**
 * Icon shortcode
 *
 * @param array $atts Excerpt length.
 */
function strt_icon_func( $atts ) {
	$a = shortcode_atts(
		array(
			'name' => 'arrow_right',
			'type' => 'ui',
			'size' => 16,
		),
		$atts
	);
	return wp_kses_post( strt_get_icon_svg( $a['type'], $a['name'], $a['size'] ) );
}
add_shortcode( 'icon', 'strt_icon_func' );

/**
 * Gravity Forms - Add privacy message below submit button
 *
 * @param string $button The submit button markup.
 */
function strt_submit_button_form( $button ) {
	if ( ! is_admin() ) {
		$button .= '<div class="mt-2 small"><a class="icon-link" href="' . get_privacy_policy_url() . '" target="_blank" rel="noopener noreferrer">' . wp_kses_post( strt_get_icon_svg( 'ui', 'lock' ) ) . 'Je gegevens zijn veilig bij ons.</a></div>';
	}
	return $button;
}
add_filter( 'gform_submit_button_3', 'strt_submit_button_form', 10, 2 );
add_filter( 'gform_submit_button_4', 'strt_submit_button_form', 10, 2 );

// Move Yoast to bottom.
function strt_move_yoast() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'strt_move_yoast' );
