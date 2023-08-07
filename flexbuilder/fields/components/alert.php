<?php
/**
 * Fields to create an alert
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_alert = new FieldsBuilder( 'alert' );

$strt_alert
	->addFields( strt_get_field_partial( 'components-small' ) )
	->addSelect( '_color' )
		->addChoice( 'alert-primary', 'Primary' )
		->addChoice( 'alert-secondary', 'Secondary' )
		->addChoice( 'alert-info', 'Info' )
		->addChoice( 'alert-success', 'Success' )
		->addChoice( 'alert-warning', 'Warning' )
		->addChoice( 'alert-danger', 'Danger' )
		->addChoice( 'alert-light', 'light' )
		->addChoice( 'alert-dark', 'dark' )
		->setDefaultValue( 'alert-primary' );

return $strt_alert;
