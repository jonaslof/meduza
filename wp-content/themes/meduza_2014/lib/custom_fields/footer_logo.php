<?php
/**
 * Footer logo
 */
register_field_group(array (
	'id' => 'acf_sidfot-logotyp',
	'title' => 'Sidfot logotyp',
	'fields' => array (
		array (
			'key' => 'field_542184a291f4e',
			'label' => 'Logotyp',
			'name' => 'footer_logo',
			'type' => 'image',
			'save_format' => 'object',
			'preview_size' => 'tiny',
			'library' => 'all',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-sidfot',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'normal',
		'layout' => 'default',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 10,
));