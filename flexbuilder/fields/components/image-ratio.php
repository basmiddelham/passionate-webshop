<?php
/**
 * Fields for Image Ratio Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_image_ratio = new FieldsBuilder( 'image_ratio' );

$strt_image_ratio
	->addSelect(
		'image_ratio',
		array(
			'wrapper' => array( 'width' => '33' ),
		)
	)
		->addChoice( '16x9', '16x9' )
		->addChoice( '4x3', '4x3' )
		->addChoice( '', 'natural' )
		->setDefaultValue( '16x9' );

return $strt_image_ratio;
