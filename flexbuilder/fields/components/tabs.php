<?php
/**
 * Fields for Tabs Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_tabs = new FieldsBuilder( 'tabs' );

$strt_tabs
	->addRepeater(
		'tabs',
		array(
			'layout'       => 'block',
			'button_label' => 'Add tab',
			'collapsed'    => 'title',
		)
	)
		->addText(
			'title',
			array(
				'placeholder' => 'Title',
			)
		)

		->addFlexibleContent(
			'content',
			array(
				'button_label' => 'Add content',
			)
		)

			->addLayout( strt_get_field_partial( 'components.table' ) )
			->addLayout( strt_get_field_partial( 'components.video' ) )
			->addLayout( strt_get_field_partial( 'components.alert' ) )
			->addLayout( strt_get_field_partial( 'components.gallery' ) )
			->addLayout( strt_get_field_partial( 'components.buttons' ) )
			->addLayout( strt_get_field_partial( 'components.image' ) )
			->addLayout( strt_get_field_partial( 'components.editor' ) )
		->endFlexibleContent()

	->endRepeater();

return $strt_tabs;
