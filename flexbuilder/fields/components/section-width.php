<?php
/**
 * Fields for section width options
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_section_width = new FieldsBuilder( 'section_width' );
$strt_section_width
	->addRadio( 'section_width', array( 'label' => 'Width' ) )
		->addChoice( 'container container-small', 'Small' )
		->addChoice( 'container', 'Normal' )
		->addChoice( 'container-fluid', 'Wide' )
		->setDefaultValue( 'container' );

return $strt_section_width;
