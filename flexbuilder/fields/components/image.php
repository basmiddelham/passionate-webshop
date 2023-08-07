<?php
/**
 * Fields for Image Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_image = new FieldsBuilder( 'image' );

$strt_image
	->addImage(
		'image',
		array(
			'return_format' => 'id',
			'preview_size'  => 'one_half',
		)
	)
	->addFields( strt_get_field_partial( 'components.image-ratio' ) )
	->addTruefalse(
		'link',
		array(
			'message' => 'Link to large?',
			'wrapper' => array( 'width' => '50' ),
		)
	);

return $strt_image;
