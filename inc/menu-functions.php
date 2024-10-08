<?php
/**
 * Functions and filters related to the menus.
 *
 * @package Starter
 */

/**
 * Display SVG icons in social links menu.
 *
 * @param string $item_output The menu item output.
 * @param object $item The Menu item.
 * @param object $depth The Menu depth.
 * @param object $args The menu options.
 * @return string
 */
function strt_social_menu_svg( $item_output, $item, $depth, $args ) {
	if ( 'social' === $args->theme_location ) {
		$svg = Strt_SVG_Icons::get_social_link_svg( $item->url, 24 );
		if ( empty( $svg ) ) {
			$svg = Strt_SVG_Icons::get_svg( 'ui', 'link', 24 );
		}
		$item_output = str_replace( '</span>', '</span>' . $svg, $item_output );
	}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'strt_social_menu_svg', 10, 4 );


/**
 * Add dropdown-icon to primary-navigation if menu item has children.
 *
 * @param string $title The menu title.
 * @param object $item The menu items.
 * @param object $args The menu arguments.
 */
function strt_nav_menu_item_title( $title, $item, $args ) {
	if ( 'primary-navigation' === $args->theme_location ) {
		foreach ( $item->classes as $value ) {
			if ( 'menu-item-has-children' === $value || 'page_item_has_children' === $value ) {
				$title = $title . '<svg xmlns="http://www.w3.org/2000/svg" width="10" height="6"><path fill="currentColor" d="M1 0 0 1l5 5 5-5-1-1-4 4z"/></svg>';
			}
		}
	}
	return $title;
}
add_filter( 'nav_menu_item_title', 'strt_nav_menu_item_title', 10, 4 );

/**
 * Add 'nav-item' classes to wp_nav_menu
 *
 * @param array  $classes menu item classes.
 * @param object $item menu items.
 * @param object $args menu arguments.
 */
function strt_nav_menu_css_class( $classes, $item, $args ) {
	if ( 'primary-navigation' === $args->theme_location || 'secondary-navigation' === $args->theme_location ) {
		$classes[] = 'nav-item';
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'strt_nav_menu_css_class', 10, 4 );

/**
 * Add 'nav-link' classes to wp_nav_menu
 *
 * @param array  $atts menu item attributes.
 * @param object $item menu items.
 * @param object $args menu arguments.
 */
function strt_nav_menu_link_attributes( $atts, $item, $args ) {
	if ( 'primary-navigation' === $args->theme_location || 'secondary-navigation' === $args->theme_location ) {
		$atts['class'] = 'nav-link';
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'strt_nav_menu_link_attributes', 1, 3 );

/**
 * Add fields to menu-items
 * https://www.advancedcustomfields.com/resources/adding-fields-menu-items/
 *
 * @param array  $items menu items.
 * @param object $args menu arguments.
 */
function strt_wp_nav_menu_objects( $items, $args ) {
	foreach ( $items as $item ) {
		if ( 'primary' === $args->menu->slug ) {
			$icon     = get_field( 'menu_icon', $item );
			$my_title = '<span class="inner"><span data-hover="' . $item->title . '">' . $item->title . '</span></span>';
			$my_icon  = '';
			if ( $icon ) {
				$my_icon = strt_get_icon_svg( 'ui', $icon );
			}
			$item->title = $my_icon . $my_title;
		} elseif ( 'secondary' === $args->menu->slug ) {
			$amount = WC()->cart->get_cart_contents_count();
			if ( $item->title === 'Winkelwagen' && $amount > 0 && ! is_cart() ) {
				$amount_bubble = '<sup class="count">' . esc_html( WC()->cart->get_cart_contents_count() ) . '</sup>';
				$item->title = 'Winkelwagen' . $amount_bubble;
			}
		}
	}
	return $items;
}
add_filter( 'wp_nav_menu_objects', 'strt_wp_nav_menu_objects', 10, 2 );
