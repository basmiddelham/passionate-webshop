<?php
/**
 * Fields for section background
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_section_bg = new FieldsBuilder( 'section_bg' );
$strt_section_bg
	->addRadio(
		'bg_color',
		array(
			'label'  => 'Background',
			'layout' => 'vertical',
		)
	)
		->addChoice( '', 'None' )
		->addChoice( 'bg-primary', 'primary' )
		->addChoice( 'bg-primary-subtle', 'primary-subtle' )
		->addChoice( 'bg-secondary', 'secondary' )
		->addChoice( 'bg-secondary-subtle', 'secondary-subtle' )
		->addChoice( 'bg-light', 'light' )
		->addChoice( 'bg-dark', 'dark' )
		->addChoice( 'bg-gray', 'light gray' )
		->addChoice( 'bg-img text-light', 'Background image' )
		->setDefaultValue( '' )
	->addImage(
		'bg_image',
		array(
			'return_format' => 'id',
			'label'         => 'Background image',
			'preview_size'  => 'thumbnail',
		)
	)
	->conditional( 'bg_color', '==', 'bg-img text-light' )
	->addTrueFalse(
		'bg_repeat',
		array(
			'label' => 'Background repeat',
			'ui'    => 1,
		)
	)
	->conditional( 'bg_color', '==', 'bg-img text-light' );

return $strt_section_bg;
