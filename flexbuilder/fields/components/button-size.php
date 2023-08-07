<?php
/**
 * Fields for Buttons Size Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_btn_size = new FieldsBuilder( 'button_size' );
$strt_btn_size
	->addSelect( 'button_size' )
		->addChoice( 'btn-sm', 'Small' )
		->addChoice( '', 'Medium' )
		->addChoice( 'btn-lg', 'Large' )
		->setDefaultValue( '' );

return $strt_btn_size;
