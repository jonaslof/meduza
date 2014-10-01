<?php 
/**
 * Header logo
 */
register_field_group(array (
	'id' => 'acf_logotyp',
	'title' => 'Logotyp',
	'fields' => array (
		array (
			'key' => 'field_54218262f88b6',
			'label' => 'Logotyp SVG',
			'name' => 'logo_svg',
			'type' => 'image',
			'instructions' => 'Logotyp i SVG-format',
			'save_format' => 'object',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),
		array (
			'key' => 'field_542182bef88b7',
			'label' => 'Logotyp PNG',
			'name' => 'logo_png',
			'type' => 'image',
			'save_format' => 'object',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),
		array (
			'key' => 'field_542182bef88b8',
			'label' => 'Logotyp mobil SVG',
			'name' => 'logo_mobile_svg',
			'type' => 'image',
			'save_format' => 'object',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),
		array (
			'key' => 'field_542182bef88b9',
			'label' => 'Logotyp mobil PNG',
			'name' => 'logo_mobile_png',
			'type' => 'image',
			'save_format' => 'object',
			'preview_size' => 'thumbnail',
			'library' => 'all',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-allmant',
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
	'menu_order' => 0,
));