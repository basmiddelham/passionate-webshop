<?php
/**
 * Fields to create columns
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_columns = new FieldsBuilder( 'columns' );
$strt_columns

	// Column options.
	->addTab( 'columns', array( 'placement' => 'left' ) )

		// Column layouts.
		->addFlexibleContent(
			'columns',
			array(
				'button_label'                    => 'Add Column',
				'acfe_flexible_advanced'          => 1,
				'acfe_flexible_stylised_button'   => 0,
				'acfe_flexible_layouts_templates' => 1,
				'acfe_flexible_layouts_previews'  => 1,
				'acfe_flexible_async'             => array(
					0 => 'title',
					1 => 'layout',
				),
				'acfe_flexible_add_actions'       => array(
					0 => 'title',
					1 => 'copy',
					2 => 'close',
				),
				'acfe_flexible_layouts_state'     => 'collapse',
				'acfe_flexible_remove_button'     => array(
					0 => 'collapse',
				),
				'acfe_flexible_grid'              => array(
					'acfe_flexible_grid_enabled' => '1',
				),
			)
		)
			// Columns.
			->addLayout(
				'column',
				array(
					'acfe_flexible_render_template' => 'flexbuilder/templates/components.php',
					'acfe_layout_col'               => '12',
					'acfe_layout_allowed_col'       => array(
						0 => '3',
						1 => '4',
						2 => '5',
						3 => '6',
						4 => '7',
						5 => '8',
						6 => '9',
					),
				)
			)
				->addFields( strt_get_field_partial( 'components' ) )

		->endFlexibleContent()

	// Section options.
	->addTab( 'section_options' )
		->addFields( strt_get_field_partial( 'components.section-bg' ) )
		->addFields( strt_get_field_partial( 'components.section-width' ) )
		->addFields( strt_get_field_partial( 'components.section-options' ) );
return $strt_columns;
