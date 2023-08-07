<?php
/**
 * Fields for Features layout
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_features = new FieldsBuilder( 'features' );
$strt_features

	->addTab( 'content', array( 'placement' => 'left' ) )
		->addRepeater(
			'features',
			array(
				'button_label' => 'Add Feature',
				'layout'       => 'block',
			)
		)
			->addImage(
				'image',
				array(
					'return_format' => 'id',
					'preview_size'  => 'medium',
				)
			)
			->addText(
				'title',
				array(
					'placeholder' => 'Title',
				)
			)
			->addTextarea(
				'content',
				array(
					'placeholder' => 'Text',
					'rows' => 5,
				)
			)
			->addLink( 'button_link' )
		->endRepeater()

	->addTab( 'options' )

		->addSelect( 'column_amount', array( 'label' => 'Column amount' ) )
			->addChoice( '2' )
			->addChoice( '3' )
			->addChoice( '4' )
			->setDefaultValue( '4' )

		->addFields( strt_get_field_partial( 'components.button-color' ) )
		->addFields( strt_get_field_partial( 'components.button-size' ) )
		->addFields( strt_get_field_partial( 'components.section-bg' ) );

return $strt_features;
