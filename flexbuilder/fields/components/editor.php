<?php
/**
 * Fields for Editor Component
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_editor = new FieldsBuilder( 'editor' );

$strt_editor
	->addWysiwyg(
		'editor',
		array(
			'acfe_wysiwyg_min_height'       => 200,
			'acfe_wysiwyg_max_height'       => '',
			'acfe_wysiwyg_disable_wp_style' => 1,
			'acfe_wysiwyg_autoresize'       => 1,
			'acfe_wysiwyg_disable_resize'   => 0,
			'acfe_wysiwyg_remove_path'      => 0,
			'acfe_wysiwyg_menubar'          => 0,
			'acfe_wysiwyg_transparent'      => 1,
			'acfe_wysiwyg_merge_toolbar'    => 0,
			'tabs'                          => 'all',
			'media_upload'                  => 1,
			'delay'                         => 1,
			'acfe_wysiwyg_auto_init'        => 1,
			'acfe_wysiwyg_height'           => 200,
		)
	);

return $strt_editor;
