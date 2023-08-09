<?php
/**
 * Fields for Shopnav layout
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_shopnav = new FieldsBuilder(
	'shopnav',
	array(
		'label' => 'Shop navigatie',
	)
);
$strt_shopnav
		->addMessage( 'Shop navigatie', 'Dit block toont de Shop navigatie.' );

return $strt_shopnav;
