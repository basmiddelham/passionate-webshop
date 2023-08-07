<?php
/**
 * Fields for Buttons Align Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_btn_align = new FieldsBuilder( 'button_align' );
$strt_btn_align
	->addSelect( 'button_align' )
		->addChoice( 'justify-content-sm-start', 'Left' )
		->addChoice( 'justify-content-sm-center', 'Center' )
		->addChoice( 'justify-content-sm-end', 'Right' )
		->addChoice( 'w-100', 'Block' )
		->setDefaultValue( 'justify-content-start' );

return $strt_btn_align;
