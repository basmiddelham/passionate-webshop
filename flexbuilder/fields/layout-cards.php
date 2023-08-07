<?php
/**
 * Fields for Cards layout
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_cards = new FieldsBuilder( 'cards' );
$strt_cards

	->addTab( 'content', array( 'placement' => 'left' ) )
		->addRepeater(
			'cards',
			array(
				'button_label' => 'Add Card',
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
			->addText( 'title' )
			->addTextarea( 'content' )
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

return $strt_cards;
