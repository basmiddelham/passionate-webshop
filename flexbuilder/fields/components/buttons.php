<?php
/**
 * Fields for Button Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_btns = new FieldsBuilder( 'buttons' );
$strt_btns

	->addField(
		'column-1',
		'acfe_column',
		array(
			'columns'  => '6/12',
		)
	)
	->addFields( strt_get_field_partial( 'components.button-size' ) )
	->addField(
		'column-2',
		'acfe_column',
		array(
			'columns'  => '6/12',
		)
	)
	->addFields( strt_get_field_partial( 'components.button-align' ) )
	->addField(
		'column-3',
		'acfe_column',
		array(
			'columns'  => '12/12',
		)
	)
	->addFlexibleContent( 'buttons' )
		->addLayout( 'button' )
			->addLink( 'button_link' )
			->addFields( strt_get_field_partial( 'components.button-color' ) )
	->endFlexibleContent();

return $strt_btns;
