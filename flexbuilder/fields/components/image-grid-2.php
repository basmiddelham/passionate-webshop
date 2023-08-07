<?php
/**
 * Fields for Image Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_image_grid_2 = new FieldsBuilder(
	'image-grid-2',
	array(
		'label' => 'Image Grid 2',
	)
);

$strt_image_grid_2
	->addImage(
		'image-large',
		array(
			'return_format' => 'id',
			'preview_size'  => 'medium',
		)
	)
	->addImage(
		'image-small',
		array(
			'return_format' => 'id',
			'preview_size'  => 'thumbnail',
		)
	);

return $strt_image_grid_2;
