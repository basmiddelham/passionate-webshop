<?php
/**
 * Fields to create an accordion
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_form = new FieldsBuilder(
	'form',
	array(
		'label' => 'Formulier',
	)
);

$strt_form
	->addTruefalse(
		'display_title',
		array(
			'message' => 'Display title?',
			'wrapper' => array( 'width' => '50' ),
		)
	)
	->addTruefalse(
		'display_description',
		array(
			'message' => 'Display description?',
			'wrapper' => array( 'width' => '50' ),
		)
	)
	->addField(
		'gravityform',
		'forms',
		array(
			'instructions'  => 'Choose a form',
			'return_format' => 'id',
		)
	);

return $strt_form;
