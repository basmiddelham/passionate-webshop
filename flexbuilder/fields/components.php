<?php
/**
 * Flexible Content field for components
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_content = new FieldsBuilder( 'content' );
$strt_content
	->addFlexibleContent(
		'content',
		array(
			'button_label'                    => 'Add Content',
			'acfe_flexible_advanced'          => 1,
			'acfe_flexible_layouts_templates' => 1,
			'acfe_flexible_layouts_previews'  => 0,
			'acfe_flexible_async'             => array(
				0 => 'title',
				1 => 'layout',
			),
			'acfe_flexible_layouts_state'     => 'open',
			'acfe_flexible_add_actions'       => array(
				0 => 'title',
				1 => 'copy',
			),
			'acfe_flexible_remove_button'     => array(
				0 => 'collapse',
			),
		)
	)


		->addLayout(
			strt_get_field_partial( 'components.spacer' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/spacer.php' )
		)

		->addLayout(
			strt_get_field_partial( 'components.slideshow' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/slideshow.php' )
		)
		->addLayout(
			strt_get_field_partial( 'components.form' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/form.php' )
		)
		->addLayout(
			strt_get_field_partial( 'components.map' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/map.php' )
		)
		->addLayout(
			strt_get_field_partial( 'components.table' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/table.php' )
		)
		->addLayout(
			strt_get_field_partial( 'components.tabs' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/tabs.php' )
		)
		->addLayout(
			strt_get_field_partial( 'components.accordion' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/accordion.php' )
		)
		->addLayout(
			strt_get_field_partial( 'components.video' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/video.php' )
		)
		->addLayout(
			strt_get_field_partial( 'components.alert' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/alert.php' )
		)
		->addLayout(
			strt_get_field_partial( 'components.gallery' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/gallery.php' )
		)
		->addLayout(
			strt_get_field_partial( 'components.image-grid-2' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/image-grid-2.php' )
		)
		->addLayout(
			strt_get_field_partial( 'components.image' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/image.php' )
		)
		->addLayout(
			strt_get_field_partial( 'components.buttons' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/buttons.php' )
		)
		->addLayout(
			strt_get_field_partial( 'components.heading' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/heading.php' )
		)
		->addLayout(
			strt_get_field_partial( 'components.editor' ),
			array( 'acfe_flexible_render_template' => 'flexbuilder/templates/components/editor.php' )
		)
	->endFlexibleContent();

return $strt_content;
