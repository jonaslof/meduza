<?php 
/**
 * Footer contacts
 */
register_field_group(array (
	'id' => 'acf_kontaktuppgifter',
	'title' => 'Kontaktuppgifter',
	'fields' => array (
		array (
			'key' => 'field_542184c4c98bf',
			'label' => 'Innehåll',
			'name' => 'footer_contact',
			'type' => 'wysiwyg',
			'default_value' => '',
			'toolbar' => 'basic',
			'media_upload' => 'no',
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
	'menu_order' => 12,
));