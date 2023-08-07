<?php
/**
 * Fields for Pageheader layout
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_pageheader = new FieldsBuilder( 'pageheader' );
$strt_pageheader

		->addText( 'heading' )
		->addWysiwyg( 'text' );

return $strt_pageheader;
