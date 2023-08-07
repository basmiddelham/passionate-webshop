<?php
/**
 * Fields for Slideshow Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_slideshow = new FieldsBuilder( 'slideshow' );

$strt_slideshow
	->addGallery(
		'slideshow',
		array(
			'preview_size'  => 'thumbnail',
			'return_format' => 'id',
		)
	)
	->addFields( strt_get_field_partial( 'components.image-ratio' ) )
	->addSelect(
		'effect',
		array(
			'wrapper' => array( 'width' => '33' ),
		)
	)
		->addChoice( 'slide', 'Slide' )
		->addChoice( 'fade', 'Crossfade' )
	->addTruefalse(
		'enable_zoom',
		array(
			'label'   => 'Zoom',
			'message' => 'Link to large images?',
			'wrapper' => array( 'width' => '33' ),
			'ui'      => 1,
		)
	);

return $strt_slideshow;
