<?php
/**
 * Functions to cleanup the frontend <head> and dashboard
 *
 * @package Starter
 */

/**
 * Clean up <head>
 */
remove_action( 'wp_head', 'rsd_link' ); // Disable XML-RPC RSD link from WordPress Header.
remove_action( 'wp_head', 'wlwmanifest_link' ); // Remove wlwmanifest link.
remove_action( 'wp_head', 'wp_shortlink_wp_head' ); // Remove shortlink.
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 ); // Remove oEmbed discovery links.
remove_action( 'wp_head', 'wp_resource_hints', 2 ); // Remove dns-prefetch Link.
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Disable feed links.
remove_action( 'wp_head', 'feed_links', 2 ); // Disable feed links.
remove_action( 'wp_head', 'wp_generator' ); // Remove WordPress version number.

/**
 * Disable Link header for the REST API
 */
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );

/**
 * See: https://kinsta.com/knowledgebase/wordpress-disable-rss-feed//
 */
function strt_disable_feed() {
	wp_die( 'No feed available' );
}
add_action( 'do_feed', 'strt_disable_feed', 1 );
add_action( 'do_feed_rdf', 'strt_disable_feed', 1 );
add_action( 'do_feed_rss', 'strt_disable_feed', 1 );
add_action( 'do_feed_rss2', 'strt_disable_feed', 1 );
add_action( 'do_feed_atom', 'strt_disable_feed', 1 );
add_action( 'do_feed_rss2_comments', 'strt_disable_feed', 1 );
add_action( 'do_feed_atom_comments', 'strt_disable_feed', 1 );

/**
 * Remove default WordPress favicon
 */
add_filter( 'get_site_icon_url', '__return_false' );

/**
 * Remove inline width from caption shortcode.
 */
add_filter( 'img_caption_shortcode_width', '__return_false' );

/**
 * Disable Block editor.
 */
add_filter( 'use_block_editor_for_post', '__return_false' );

/**
 * Disable Widgets Block editor.
 */
function strt_theme_support() {
	remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'strt_theme_support' );

/**
 * Remove the block styles file from wp_head().
 */
function strt_remove_wp_block_library_css() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
	wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS.
	wp_dequeue_style( 'classic-theme-styles' );
}
add_action( 'wp_enqueue_scripts', 'strt_remove_wp_block_library_css', 100 );

/**
 * Remove WP5.9 SVG filters
 */
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

/**
 * Remove jQuery migrate.
 *
 * @param object $scripts The WordPress scripts.
 */
function strt_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
		// Check whether the script has any dependencies.
		if ( $script->deps ) {
			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
		}
	}
}
add_action( 'wp_default_scripts', 'strt_remove_jquery_migrate' );

/**
 * Remove admin-bar CSS
 */
function strt_remove_adminbar_css() {
	remove_action( 'wp_head', '_admin_bar_bump_cb' );
}
add_action( 'get_header', 'strt_remove_adminbar_css' );

/**
 * Disable the emoji's
 */
function strt_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'strt_disable_emojis' );

/**
 * Remove items from admin-bar
 *
 * @param object $wp_admin_bar Classes for the admin-bar.
 */
function strt_remove_from_admin_bar( $wp_admin_bar ) {
	/*
	 * Placing items in here will only remove them from admin bar
	 * when viewing the frontend of the site
	*/
	if ( ! is_admin() ) {
		// WordPress Core Items (uncomment to remove).
		$wp_admin_bar->remove_node( 'comments' );
		$wp_admin_bar->remove_node( 'search' );
		$wp_admin_bar->remove_node( 'customize' );
	}

	/*
	 * Items placed outside the if statement will remove it from both the frontend
	 * and backend of the site
	*/
	$wp_admin_bar->remove_node( 'wp-logo' );
}
add_action( 'admin_bar_menu', 'strt_remove_from_admin_bar', 999 );

/**
 * Hide dashboard widgets
 */
function strt_dashboard_setup() {
	global $wp_meta_boxes;
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now'] );
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );
	unset( $wp_meta_boxes['dashboard']['normal']['core']['rg_forms_dashboard'] );

	/**
	 * Custom dashboard widget
	 */
	function strt_custom_widget() {
		echo '<h3>Voor vragen en ondersteuning kunt u contact opnemen met Bas Middelham: +31(0)6-229 385 76 of <a href="mailto:bas@middelham.nl">bas@middelham.nl</a></h3>';
	}
	wp_add_dashboard_widget( 'custom_help_widget', 'Helpdesk', 'strt_custom_widget' );
}
add_action( 'wp_dashboard_setup', 'strt_dashboard_setup', 11 );

/**
 * Remove admin menu items for non-administrators
 */
function strt_remove_admin_menu_items() {
	if ( ! current_user_can( 'manage_options' ) ) {
		remove_menu_page( 'edit-comments.php' );
		remove_menu_page( 'tools.php' );
		remove_menu_page( 'wpseo_workouts' );
	}
}
add_action( 'admin_init', 'strt_remove_admin_menu_items' );

/**
 * Remove Themehigh notices
 */
function strt_admin_theme_style() {
	if ( ! current_user_can( 'manage_options' ) ) {
		echo '<style>.thwepo-review-wrapper { display: none; }</style>';
	}
}
add_action( 'admin_enqueue_scripts', 'strt_admin_theme_style' );
add_action( 'login_enqueue_scripts', 'strt_admin_theme_style' );
