<?php 
/**
 * Instagram settings
 */
register_field_group(array (
	'id' => 'instagram_options',
	'title' => 'Instagram inställningar',
	'fields' => array (
		array (
			'key' => 'field_00118262f8801',
			'label' => 'Hashtag',
			'name' => 'instagram_hashtag',
			'type' => 'text',
			'instructions' => 'Ange vilken hashtag som bilder ska hämtas från.',
			'type' => 'text',
			'formatting' => 'none',
			'maxlength' => '',
		)
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
	'menu_order' => 10,
));