<?php
/**
 * Fields for Table Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_table = new FieldsBuilder( 'table' );

$strt_table
	->addField( 'table', 'table', array( 'use_header' => 0 ) )
	->addCheckbox( 'table_options', array( 'layout' => 'horizontal' ) )
		->addChoice( 'table-sm', 'Use small table' )
		->addChoice( 'table-borderless', 'No borders' );

return $strt_table;
