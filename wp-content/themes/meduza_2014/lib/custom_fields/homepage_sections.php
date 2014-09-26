<?php 
/**
 * Homepage sections
 */
register_field_group(array (
	'id' => 'acf_startsida',
	'title' => 'Startsida',
	'fields' => array (
		array (
			'key' => 'field_54217a05fe527',
			'label' => 'Sektioner',
			'name' => 'homepage_sections',
			'type' => 'repeater',
			'sub_fields' => array (
				array (
					'key' => 'field_54217a7dfe528',
					'label' => 'Typ av innehåll',
					'name' => 'section_type',
					'type' => 'select',
					'instructions' => 'Välj vilken typ av innehåll du vill ska visas i sektionen.',
					'column_width' => '',
					'choices' => array (
						'page_content' => 'Sida',
						'instagram' => 'Instagram-bilder',
					),
					'default_value' => 'page_content',
					'allow_null' => 0,
					'multiple' => 0,
				),
				array (
					'key' => 'field_54217afcfe529',
					'label' => 'Välj sida',
					'name' => 'section_pagecontent',
					'type' => 'post_object',
					'instructions' => 'Välj en sida du vill ska visas i den här sektionen',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_54217a7dfe528',
								'operator' => '==',
								'value' => 'page_content',
							),
						),
						'allorany' => 'all',
					),
					'column_width' => '',
					'post_type' => array (
						0 => 'page',
					),
					'taxonomy' => array (
						0 => 'all',
					),
					'allow_null' => 0,
					'multiple' => 0,
				),
				array (
					'key' => 'field_54217b6afe52a',
					'label' => 'Användare',
					'name' => 'section_instagramusers',
					'type' => 'relationship',
					'instructions' => 'Ange från vilka medarbetare du vill visa bilder.',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_54217a7dfe528',
								'operator' => '==',
								'value' => 'instagram',
							),
						),
						'allorany' => 'all',
					),
					'column_width' => '',
					'return_format' => 'id',
					'post_type' => array (
						0 => 'coworker',
					),
					'taxonomy' => array (
						0 => 'all',
					),
					'filters' => array (
						0 => 'search',
					),
					'result_elements' => array (
						0 => 'featured_image',
						1 => 'post_title',
					),
					'max' => '',
				),
				array (
					'key' => 'field_54217bf5276a5',
					'label' => 'Text',
					'name' => 'section_instagramtext',
					'type' => 'text',
					'instructions' => 'Ange om du vill ha en text över bilderna',
					'conditional_logic' => array (
						'status' => 1,
						'rules' => array (
							array (
								'field' => 'field_54217a7dfe528',
								'operator' => '==',
								'value' => 'instagram',
							),
						),
						'allorany' => 'all',
					),
					'column_width' => '',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
			),
			'row_min' => '',
			'row_limit' => '',
			'layout' => 'row',
			'button_label' => 'Lägg till sektion',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'page_template',
				'operator' => '==',
				'value' => 'homepage.php',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'normal',
		'layout' => 'no_box',
		'hide_on_screen' => array (
			0 => 'permalink',
			1 => 'the_content',
			2 => 'excerpt',
			3 => 'custom_fields',
			4 => 'discussion',
			5 => 'comments',
			6 => 'revisions',
			7 => 'slug',
			8 => 'author',
			9 => 'format',
			10 => 'featured_image',
			11 => 'categories',
			12 => 'tags',
			13 => 'send-trackbacks',
		),
	),
	'menu_order' => 0,
));