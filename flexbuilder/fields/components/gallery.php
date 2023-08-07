<?php
/**
 * Fields for Gallery Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_gallery = new FieldsBuilder( 'gallery' );
$strt_gallery
	->addGallery(
		'gallery',
		array(
			'preview_size'  => 'thumbnail',
			'return_format' => 'id',
		)
	)
	->addSelect( 'gallery_columns', array( 'wrapper' => array( 'width' => '33' ) ) )
		->addChoice( '1', '1 Column' )
		->addChoice( '2', '2 Columns' )
		->addChoice( '3', '3 Columns' )
		->addChoice( '4', '4 Columns' )
		->addChoice( '5', '5 Columns' )
		->addChoice( '6', '6 Columns' )
		->setDefaultValue( '3' )
	->addSelect( 'gallery_size', array( 'wrapper' => array( 'width' => '33' ) ) )
		->addChoice( 'post-thumbnail', 'Thumbnail' )
		->addChoice( 'col-3', '1/4' )
		->addChoice( 'col-3-16x9', '1/4 16x9' )
		->addChoice( 'col-3-4x3', '1/4 4x3' )
		->addChoice( 'col-4', '1/3' )
		->addChoice( 'col-4-16x9', '1/3 16x9' )
		->addChoice( 'col-4-4x3', '1/3 4x3' )
		->addChoice( 'col-6', '1/2' )
		->addChoice( 'col-6-16x9', '1/2 16x9' )
		->addChoice( 'col-6-4x3', '1/2 4x3' )
		->addChoice( 'col-12', 'Full' )
		->setDefaultValue( 'post-thumbnail' )
	->addSelect( 'gallery_link', array( 'wrapper' => array( 'width' => '33' ) ) )
		->addChoice( 'none', 'None' )
		->addChoice( 'file', 'File' )
		->setDefaultValue( 'none' );

return $strt_gallery;
