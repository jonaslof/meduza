<?php
/**
 * Products
 */
register_field_group(array (
	'id' => 'acf_produkter',
	'title' => 'Produkter',
	'fields' => array (
		array (
			'key' => 'field_5421837d67dfc',
			'label' => 'Titel',
			'name' => 'products_title',
			'type' => 'text',
			'instructions' => 'Ange titel i sektionen',
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'formatting' => 'none',
			'maxlength' => '',
		),
		array (
			'key' => 'field_5421839b67dfd',
			'label' => 'Produkter',
			'name' => 'products',
			'type' => 'repeater',
			'instructions' => 'Lägg till eller ta bort produkter',
			'sub_fields' => array (
				array (
					'key' => 'field_542183d467dfe',
					'label' => 'Logotyp',
					'name' => 'product_logo',
					'type' => 'image',
					'column_width' => '',
					'save_format' => 'object',
					'preview_size' => 'tiny',
					'library' => 'all',
				),
				array (
					'key' => 'field_542183fb67dff',
					'label' => 'Länk till webbsida',
					'name' => 'product_link',
					'type' => 'text',
					'instructions' => 'Länken måste börja med http://',
					'column_width' => '',
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'html',
					'maxlength' => '',
				),
			),
			'row_min' => '',
			'row_limit' => '',
			'layout' => 'table',
			'button_label' => 'Lägg till ny produkt',
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
	'menu_order' => 0,
));