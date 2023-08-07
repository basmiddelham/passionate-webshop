<?php
/**
 * Fields for Buttons Color Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_btn_color = new FieldsBuilder( 'button_color' );
$strt_btn_color
	->addSelect( 'button_color' )
		->addChoice( 'btn-primary', 'Primary' )
		->addChoice( 'btn-outline-primary', 'Primary outline' )
		->addChoice( 'btn-secondary', 'Secondary' )
		->addChoice( 'btn-outline-secondary', 'Secondary outline' )
		->addChoice( 'btn-light', 'Light' )
		->addChoice( 'btn-outline-light', 'Light outline' )
		->addChoice( 'btn-dark', 'Dark' )
		->addChoice( 'btn-outline-dark', 'Dark outline' )
		->addChoice( 'btn-info', 'Info' )
		->addChoice( 'btn-outline-info', 'Info outline' )
		->addChoice( 'btn-link', 'Link' )
		->setDefaultValue( 'btn-primary' );

return $strt_btn_color;
