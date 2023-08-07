<?php
/**
 * TinyMCE customisations.
 *
 * Defaults: 'formatselect, forecolor, bold, italic, underline, bullist, numlist, blockquote, alignleft, aligncenter, alignright, alignjustify,
 * link, unlink, wp_adv, wp_more, pastetext, pasteword, selectall, removeformat, charmap, outdent, indent, undo, redo
 *
 * @package Starter
 */

/**
 * First toolbar customizations
 */
function strt_tinymce_toolbar_1() {
	return array(
		'formatselect',
		'bold',
		'italic',
		'link',
		'removeformat',
		'wp_adv',
	);
}
add_filter( 'mce_buttons', 'strt_tinymce_toolbar_1' );

/**
 * Second toolbar customizations
 */
function strt_tinymce_toolbar_2() {
	return array(
		'styleselect',
		'aligncenter',
		'alignright',
		'bullist',
		'numlist',
		'superscript',
		'hr',
		'pastetext',
		'blockquote',
		'charmap',
	);
}
add_filter( 'mce_buttons_2', 'strt_tinymce_toolbar_2' );

/**
 * Add custom styles to the styles menu.
 *
 * @param array $init_array The TinyMCE options.
 */
function strt_tinymce_custom_styles( $init_array ) {
	$style_formats = array(
		array(
			'title' => __( 'Size', 'strt' ),
			'items' => array(
				array(
					'title'   => __( 'Lead', 'strt' ),
					'block'   => 'p',
					'classes' => 'lead',
				),
				array(
					'title'   => __( 'Small', 'strt' ),
					'block'   => 'p',
					'classes' => 'small',
				),
				array(
					'title' => 'Display',
					'items' => array(
						array(
							'title'    => __( 'Display 1', 'strt' ),
							'selector' => 'h1, h2, h3, h4, h5, h6, p',
							'classes'  => 'display-1',
						),
						array(
							'title'    => __( 'Display 2', 'strt' ),
							'selector' => 'h1, h2, h3, h4, h5, h6, p',
							'classes'  => 'display-2',
						),
						array(
							'title'    => __( 'Display 3', 'strt' ),
							'selector' => 'h1, h2, h3, h4, h5, h6, p',
							'classes'  => 'display-3',
						),
						array(
							'title'    => __( 'Display 4', 'strt' ),
							'selector' => 'h1, h2, h3, h4, h5, h6, p',
							'classes'  => 'display-4',
						),
						array(
							'title'    => __( 'Display 5', 'strt' ),
							'selector' => 'h1, h2, h3, h4, h5, h6, p',
							'classes'  => 'display-5',
						),
						array(
							'title'    => __( 'Display 6', 'strt' ),
							'selector' => 'h1, h2, h3, h4, h5, h6, p',
							'classes'  => 'display-6',
						),
					),
				),
			),
		),
		array(
			'title' => 'Color',
			'items' => array(
				array(
					'title'   => __( 'Color 1', 'strt' ),
					'inline'  => 'span',
					'classes' => 'text-primary',
				),
				array(
					'title'   => __( 'Color 2', 'strt' ),
					'inline'  => 'span',
					'classes' => 'text-secondary',
				),
				array(
					'title'   => __( 'Muted', 'strt' ),
					'inline'  => 'span',
					'classes' => 'text-muted',
				),
				array(
					'title'   => __( 'White', 'strt' ),
					'inline'  => 'span',
					'classes' => 'text-white',
				),
				array(
					'title'   => __( 'Light', 'strt' ),
					'inline'  => 'span',
					'classes' => 'text-light',
				),
				array(
					'title'   => __( 'Dark', 'strt' ),
					'inline'  => 'span',
					'classes' => 'text-dark',
				),
			),
		),
	);

	$init_array['style_formats'] = wp_json_encode( $style_formats );
	return $init_array;
}
add_filter( 'tiny_mce_before_init', 'strt_tinymce_custom_styles' );
