<?php
/**
 * Fields for Posts layout
 *
 * @package Starter
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

$strt_posts = new FieldsBuilder( 'posts' );
$strt_posts

	// Row options.
	->addTab( 'post_options', array( 'placement' => 'left' ) )

		// Columns amount.
		->addRadio(
			'post_columns',
			array(
				'label'         => 'Columns',
				'default_value' => '3',
			)
		)
			->addChoice( '2' )
			->addChoice( '3' )
			->addChoice( '4' )

		// Post amount.
		->addSelect( 'post_amount', array( 'label' => 'Amount' ) )
			->addChoice( '2', '2' )
			->addChoice( '3', '3' )
			->addChoice( '4', '4' )
			->addChoice( '6', '6' )
			->addChoice( '8', '8' )
			->addChoice( '9', '9' )
			->addChoice( '10', '10' )
			->addChoice( '12', '12' )
			->addChoice( '16', '16' )
			->setDefaultValue( '4' )

		// Excerpt length.
		->addNumber(
			'excerpt_length',
			array(
				'label'       => 'Excerpt length',
				'placeholder' => 280,
				'min'         => 100,
				'max'         => 560,
			)
		)

		// Categories.
		->addTaxonomy(
			'post_tax',
			array(
				'label'      => 'Category',
				'taxonomy'   => 'category',
				'field_type' => 'multi_select',
				'add_term'   => 0,
			)
		)
			->conditional( 'post_type', '==', 'post' )

		// Post options.
		->addCheckbox(
			'post_options',
			array(
				'label'         => 'Posts options',
				'allow_custom'  => 1,
				'save_custom'   => 1,
				'default_value' => array(
					0 => 'show_date',
					2 => 'show_cats',
				),
			)
		)
			->addChoice( 'show_date', 'Show date' )
			->addChoice( 'show_author', 'Show author' )
			->addChoice( 'show_cats', 'Show categories' )
			->addChoice( 'show_more', 'Show \'More posts\' button' )

		// More button.
		->addGroup( 'button' )
			->conditional( 'post_options', '==', 'show_more' )
			->addFields( strt_get_field_partial( 'components.buttons' ) )
		->endGroup()

	// Section options.
	->addTab( 'section_options' )
		->addFields( strt_get_field_partial( 'components.section-bg' ) )
		->addText(
			'anchor_id',
			array(
				'instructions' => 'No spaces or special characters.',
			)
		);

return $strt_posts;
