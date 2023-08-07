<?php
/**
 * Flexible Content field for less components
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_content = new FieldsBuilder( 'content_small' );
$strt_content
	->addFlexibleContent(
		'content_small',
		array(
			'button_label'                    => 'Add content',
			'acfe_flexible_advanced'          => 1,
			'acfe_flexible_async'             => array(
				0 => 'title',
				1 => 'layout',
			),
			'acfe_flexible_add_actions'       => array(
				0 => 'title',
				1 => 'toggle',
				2 => 'copy',
			),
		)
	)

		->addLayout( strt_get_field_partial( 'components.buttons' ) )

		->addLayout( strt_get_field_partial( 'components.image' ) )

		->addLayout( strt_get_field_partial( 'components.editor' ) )

	->endFlexibleContent();

return $strt_content;
