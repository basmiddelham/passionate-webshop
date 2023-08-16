<?php
/**
 * Main Flexible Content field
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_flexbuilder = new FieldsBuilder(
	'flexbuilder',
	array(
		'style'          => 'seamless',
		'hide_on_screen' => array(
			0  => 'block_editor',
			1  => 'the_content',
			2  => 'excerpt',
			3  => 'discussion',
			4  => 'comments',
			5  => 'slug',
			6  => 'author',
			7  => 'format',
			8  => 'featured_image',
			9  => 'categories',
			10 => 'tags',
			11 => 'send-trackbacks',
		),
	)
);

$strt_flexbuilder
	->setLocation( 'page_template', '==', 'flexbuilder/flexbuilder-template.php' )
	->addFlexibleContent(
		'section',
		array(
			'button_label'                    => 'Add Section',
			'acfe_flexible_advanced'          => 1,
			'acfe_flexible_stylised_button'   => 1,
			'acfe_flexible_layouts_templates' => 1,
			'acfe_flexible_layouts_previews'  => 1,
			'acfe_flexible_async'             => array(
				0 => 'title',
				1 => 'layout',
			),
			'acfe_flexible_add_actions'       => array(
				0 => 'title',
				1 => 'toggle',
				2 => 'copy',
				3 => 'close',
			),
			'acfe_flexible_layouts_state'     => 'collapse',
			'acfe_flexible_remove_button'     => array(
				0 => 'collapse',
			),
		)
	)

		// Pageheader.
		->addLayout(
			strt_get_field_partial( 'layout-pageheader' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/layout-pageheader.php' )
		)

		// Columns.
		->addLayout(
			strt_get_field_partial( 'layout-columns' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/layout-columns.php' )
		)

		// Features.
		->addLayout(
			strt_get_field_partial( 'layout-features' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/layout-features.php' )
		)

		// Posts.
		// ->addLayout(
		// 	strt_get_field_partial( 'layout-posts' ),
		// 	array( 'acfe_flexible_render_template' => 'flexbuilder/templates/layout-posts.php' )
		// )

		// Cards.
		// ->addLayout(
		// 	strt_get_field_partial( 'layout-cards' ),
		// 	array( 'acfe_flexible_render_template' => 'flexbuilder/templates/layout-cards.php' )
		// )

		// Featured products.
		->addLayout(
			strt_get_field_partial( 'layout-featured' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/layout-featured.php' )
		)

		// Shopnav.
		// ->addLayout(
		// 	strt_get_field_partial( 'layout-shopnav' ),
		// 	array( 'acfe_flexible_render_template' => 'flexbuilder/templates/layout-shopnav.php' )
		// )

		// Mapbox.
		->addLayout(
			strt_get_field_partial( 'components.map' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/map.php' )
		);

add_action(
	'acf/init',
	function() use ( $strt_flexbuilder ) {
		acf_add_local_field_group( $strt_flexbuilder->build() );
	}
);
