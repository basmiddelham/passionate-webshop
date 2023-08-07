<?php
/**
 * Fields for section options
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_section_options = new FieldsBuilder( 'section_options' );
$strt_section_options
	->addCheckbox( 'row_options', array( 'allow_custom' => 1 ) )
	->addChoice( 'text-center', 'Center all text' )
	->addChoice( 'align-items-center', 'Vertical center' )
	->addText(
		'anchor_id',
		array(
			'instructions' => 'No spaces or special characters.',
		)
	);

return $strt_section_options;
