<?php
/**
 * Fields for Featured products layout
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_featured = new FieldsBuilder(
	'featured',
	array(
		'label' => 'Uirgelichte producten',
	)
);
$strt_featured
	->addFields( strt_get_field_partial( 'components.editor' ) )
	->addMessage( 'Shop navigatie', 'Dit block toont de Uitgelichte producten.' );

return $strt_featured;
