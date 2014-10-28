<?php
/*
	Plugin Name: Meduza Core Plugin
	Plugin URI:
	Description: Core functions for Meduza
	Version: 0.1
	Author: Lagercrantz Media
	Author URI: http://www.lagercrantzmedia.se/
*/

include('widgets/bp-widget.php');

$meduza_core_plugin = new Meduza_Core_Plugin();

class Meduza_Core_Plugin
{
	private $widgets = array( 'BP_Widget' );
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	(Constructor)
	*
	*	@desc: 
	*	@author: 
	*	@since: 
	* 
	*-------------------------------------------------------------------------------------*/
	
	function Meduza_Core_Plugin()
	{
		// actions
		add_action( 'widgets_init', array($this, 'widgets_init'));
		add_action('init', array($this, 'init'));
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	init
	*
	*	@desc: 
	*	@author: 
	*	@since: 
	* 
	*-------------------------------------------------------------------------------------*/
	
	function init()
	{
		$this->register_post_types();
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	register_widgets
	*
	*	@desc: 
	*	@author: 
	*	@since: 
	* 
	*-------------------------------------------------------------------------------------*/
	
	function widgets_init()
	{
		foreach( $this->widgets as $widget )
		{
			register_widget( $widget );
		}
	}


	/*--------------------------------------------------------------------------------------
	*
	*	register_widgets
	*
	*	@desc: 
	*	@author: 
	*	@since: 
	* 
	*-------------------------------------------------------------------------------------*/
	function register_post_types() {
		//Coworker
		$labels = array(
			'name' 					=> 'Medarbetare',
			'singular_name' 		=> 'Medarbetare',
			'add_new'	 			=> 'Lägg till ny',
			'add_new_item' 			=> 'Skapa ny medarbetare',
			'edit_item' 			=> 'Ändra medarbetare',
			'new_item' 				=> 'Ny medarbetare',
			'all_items' 			=> 'Alla medarbetare',
			'view_item' 			=> 'Visa medarbetare',
			'search_items' 			=> 'Sök medarbetare',
			'not_found' 			=>  'Inga medarbetare hittades',
			'not_found_in_trash' 	=> 'Inga medarbetare hittades i papperskorgen', 
			'parent_item_colon' 	=> '',
			'menu_name' 			=> 'Medarbetare'
		);
		$args = array(
			'labels' 				=> $labels,
			'public' 				=> true,
			'publicly_queryable' 	=> true,
			'show_ui'            	=> true,
			'show_in_menu'       	=> true,
			'query_var' 			=> true,
			'rewrite' 				=> array( 'slug' => 'frisorer'),
			'has_archive' 			=> true, 
			'hierarchical' 			=> false,
			'menu_position' 		=> 21,
			'menu_icon' 			=> 'dashicons-groups',
			'supports' 				=> array( 'title', 'editor', 'thumbnail', 'revisions' )
		); 
		register_post_type( 'coworker', $args );

		//Instagram images
		$labels = array(
			'name' 					=> 'Instagrambilder',
			'singular_name' 		=> 'Instagrambild',
			'add_new'	 			=> 'Lägg till ny',
			'add_new_item' 			=> 'Skapa ny Instagrambild',
			'edit_item' 			=> 'Ändra Instagrambild',
			'new_item' 				=> 'Ny Instagrambild',
			'all_items' 			=> 'Alla Instagrambilder',
			'view_item' 			=> 'Visa Instagrambild',
			'search_items' 			=> 'Sök Instagrambild',
			'not_found' 			=>  'Inga Instagrambilder hittades',
			'not_found_in_trash' 	=> 'Inga Instagrambilder hittades i papperskorgen', 
			'parent_item_colon' 	=> '',
			'menu_name' 			=> 'Instagrambilder'
		);
		$args = array(
			'labels' 				=> $labels,
			'public' 				=> true,
			'publicly_queryable' 	=> true,
			'show_ui'            	=> true,
			'show_in_menu'       	=> true,
			'query_var' 			=> true,
			'rewrite' 				=> array( 'slug' => 'instagram'),
			'has_archive' 			=> true, 
			'hierarchical' 			=> false,
			'menu_position' 		=> 22,
			'menu_icon' 			=> 'dashicons-camera',
			'supports' 				=> array( 'title', 'thumbnail' )
		); 
		register_post_type( 'instagram-image', $args );
	}
}