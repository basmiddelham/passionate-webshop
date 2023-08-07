<?php
/**
 * Fields for Map Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_map = new FieldsBuilder( 'map' );
$strt_map

	->addText(
		'mainMarker',
		array(
			'label'        => 'Latitude / Longitude',
			'instructions' => 'Klik met je rechter muisknop op een locatie in Google Maps en kies het eerste item om de latitude en longitude te kopiëren.',
			'placeholder'  => 'Bijv.: 51.92533243340427, 4.46877398457137',
			'prepend'      => 'Latitude, Longtitude',
		)
	)
	->addText(
		'mainMarkerTitle',
		array(
			'label'        => 'Titel',
			'placeholder'  => 'Titel',
			'instructions' => 'Optioneel: Deze titel verschijnt in een popup boven de marker. HTML toegestaan',
		)
	)
	->addColorPicker(
		'mainMarkerColor',
		array(
			'label' => 'Color',
		)
	)

	->addNumber(
		'mapZoom',
		array(
			'default_value' => 14,
			'min'           => 10,
			'max'           => 18,
			'step'          => '0.5',
			'prepend'       => 'Zoom:',
		)
	)

	->addNumber(
		'mapPitch',
		array(
			'default_value' => 0,
			'min'           => 0,
			'max'           => 85,
			'prepend'       => 'Pitch:',
		)
	)

	->addNumber(
		'mapBearing',
		array(
			'default_value' => 0,
			'min'           => -180,
			'max'           => 180,
			'prepend'       => 'Bearing:',
		)
	)

	->addNumber(
		'mapOffsetX',
		array(
			'default_value' => 0,
			'min'           => -999,
			'max'           => 999,
			'prepend'       => 'Offset X:',
		)
	)

	->addNumber(
		'mapOffsetY',
		array(
			'default_value' => 0,
			'min'           => -999,
			'max'           => 999,
			'prepend'       => 'Offset Y:',
		)
	);

return $strt_map;
