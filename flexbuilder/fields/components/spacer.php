<?php
/**
 * Fields for Slideshow Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_spacer = new FieldsBuilder( 'spacer' );

$strt_spacer
	->addRadio(
		'spacer_size',
		array(
			'type'    => 'button_group',
			'wrapper' => array( 'width' => '50' ),
		)
	)
		->addChoice( '3', 'Small' )
		->addChoice( '5', 'Regular' )
		->addChoice( '6', 'Large' )
		->setDefaultValue( '3' )
	->addTruefalse(
		'show_divider',
		array(
			'message'       => 'Toon divider',
			'default_value' => 1,
			'ui'            => 1,
			'wrapper'       => array( 'width' => '50' ),
		)
	);

return $strt_spacer;
