<?php
/**
 * Fields to create an accordion
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_accordion = new FieldsBuilder( 'accordion' );

$strt_accordion
	->addRepeater(
		'accordion',
		array(
			'layout'       => 'block',
			'button_label' => 'Add item',
			'collapsed'    => 'title',
		)
	)
		->addText( 'title' )
		->addWysiwyg( 'content' )
	->endRepeater();

return $strt_accordion;
