<?php
/**
 * Fields for Header Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_heading = new FieldsBuilder( 'heading' );
$strt_heading
	->addText( 'heading_text' )

	->addButtongroup( 'heading_size' )
		->addChoice( '1', 'H1' )
		->addChoice( '2', 'H2' )
		->addChoice( '3', 'H3' )
		->addChoice( '4', 'H4' )
		->setDefaultValue( '2' )

	->addButtongroup( 'display_size', array( 'allow_null' => 1 ) )
		->addChoice( '1', 'D1' )
		->addChoice( '2', 'D2' )
		->addChoice( '3', 'D3' )
		->addChoice( '4', 'D4' );

return $strt_heading;
