<?php
/**
 * Fields for Video Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_video = new FieldsBuilder( 'video' );

$strt_video
	->addRadio(
		'video_type',
		array(
			'type'    => 'button_group',
			'wrapper' => array( 'width' => '50' ),
		)
	)
		->addChoice( 'embed', 'Embed' )
		->addChoice( 'mp4', 'MP4' )
		->setDefaultValue( 'embed' )
	->addSelect(
		'video_aspect',
		array(
			'default_value' => array( 0 => '16x9' ),
			'wrapper'       => array( 'width' => '50' ),
		)
	)
		->conditional( 'video_type', '==', 'embed' )
		->addChoice( '21x9' )
		->addChoice( '16x9' )
		->addChoice( '4x3' )
	->addOembed( 'embed_link' )
		->conditional( 'video_type', '==', 'embed' )
	->addFile(
		'mp4_file',
		array(
			'acfe_uploader' => 'wp',
			'return_format' => 'url',
		)
	)
		->conditional( 'video_type', '==', 'mp4' )
	->addCheckbox(
		'mp4_options',
		array(
			'label'         => 'Options',
			'layout'        => 'horizontal',
			'default_value' => array(
				0 => 'controls',
			),
		)
	)
		->conditional( 'video_type', '==', 'mp4' )
		->addChoice( 'controls', 'Controls' )
		->addChoice( 'preload', 'Preload' )
		->addChoice( 'loop', 'Loop' )
		->addChoice( 'muted autoplay', 'Autoplay' );

return $strt_video;
