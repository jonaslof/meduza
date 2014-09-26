<?php 
/**
 * Page content layout
 */
register_field_group(array (
	'id' => 'acf_sidlayout',
	'title' => 'Sidlayout',
	'fields' => array (
		array (
			'key' => 'field_54212d93b5001',
			'label' => 'Kolumner',
			'name' => 'page_columns',
			'type' => 'select',
			'choices' => array (
				'one-col' => 'En kolumn',
				'two-col' => 'Två kolumner',
			),
			'default_value' => 'one-col',
			'allow_null' => 0,
			'multiple' => 0,
		),
		array (
			'key' => 'field_54212e306620f',
			'label' => 'Innehåll vänster kolumn',
			'name' => 'left_col_content',
			'type' => 'wysiwyg',
			'conditional_logic' => array (
				'status' => 1,
				'rules' => array (
					array (
						'field' => 'field_54212d93b5001',
						'operator' => '==',
						'value' => 'two-col',
					),
				),
				'allorany' => 'all',
			),
			'default_value' => '',
			'toolbar' => 'full',
			'media_upload' => 'yes',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
				'order_no' => 0,
				'group_no' => 0,
			),
			array (
				'param' => 'page_template',
				'operator' => '!=',
				'value' => 'homepage.php',
				'order_no' => 1,
				'group_no' => 0,
			),
			array (
				'param' => 'page_template',
				'operator' => '!=',
				'value' => 'page-tpl-prices.php',
				'order_no' => 1,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'acf_after_title',
		'layout' => 'no_box',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 0,
));