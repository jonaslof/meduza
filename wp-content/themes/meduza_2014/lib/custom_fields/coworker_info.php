<?php 
/**
 * Coworker information
 */
register_field_group(array (
	'id' => 'acf_info-medarbetare',
	'title' => 'Info medarbetare',
	'fields' => array (
		array (
			'key' => 'field_54212f8830748',
			'label' => 'Yrkesroll',
			'name' => 'coworker_position',
			'type' => 'text',
			'default_value' => '',
			'placeholder' => 'Ange yrkesroll',
			'prepend' => '',
			'append' => '',
			'formatting' => 'none',
			'maxlength' => '',
		),
		array (
			'key' => 'field_54212fae30749',
			'label' => 'Telefonnummer',
			'name' => 'coworker_phone',
			'type' => 'text',
			'default_value' => '',
			'placeholder' => 'Ange telefonnummer',
			'prepend' => '',
			'append' => '',
			'formatting' => 'none',
			'maxlength' => '',
		),
		array (
			'key' => 'field_54212fcd3074a',
			'label' => 'Användarnamn på Instagram',
			'name' => 'coworker_instagram_username',
			'type' => 'text',
			'default_value' => '',
			'placeholder' => 'Ange användarnamn för Instagram',
			'prepend' => '',
			'append' => '',
			'formatting' => 'none',
			'maxlength' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'coworker',
				'order_no' => 0,
				'group_no' => 0,
			),
		),
	),
	'options' => array (
		'position' => 'normal',
		'layout' => 'no_box',
		'hide_on_screen' => array (
		),
	),
	'menu_order' => 0,
));