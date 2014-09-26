<?php 
/**
 * Footer background color
 */
register_field_group(array (
	'id' => 'footer_color',
	'title' => 'Sidfot bakgrundsfärg',
	'fields' => array (
		array (
			'key' => 'field_00412d93b5001',
			'label' => 'Bakgrundsfärg',
			'name' => 'footer_bgcolor',
			'type' => 'select',
			'choices' => array (
				'EC008C' => 'Rosa',
				'C227B9' => 'Lila',
				'F78E1E' => 'Orange',
				'C4D600' => 'Grön',
				'00B5CC' => 'Blå',
				'000000' => 'Svart',
			),
			'default_value' => 'EC008C',
			'allow_null' => 0,
			'multiple' => 0,
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
	'menu_order' => 11,
));