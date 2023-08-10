<?php
/**
 * Fields for Pageheader layout
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_pageheader = new FieldsBuilder( 'pageheader' );
$strt_pageheader

	->addField(
		'column-1',
		'acfe_column',
		array(
			'columns'  => '6/12',
		)
	)
	->addImage(
		'image',
		array(
			'return_format' => 'id',
			'preview_size'  => 'large',
		)
	)
	->addField(
		'column-2',
		'acfe_column',
		array(
			'columns'  => '6/12',
		)
	)
	->addWysiwyg(
		'editor',
		array(
			'media_upload' => 0,
		)
	)
	->addLink( 'button_link' );

return $strt_pageheader;
