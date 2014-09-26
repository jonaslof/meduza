<?php
/*
	Widget Name: Boilerplate Widget
	Description: This is a boilerplate for a widget.
*/

class BP_Widget extends WP_Widget
{ 
	var $foo;
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	(Constructor)
	*
	*	@desc: 
	*	@author: 
	*	@since: 
	* 
	*-------------------------------------------------------------------------------------*/
	
	public function __construct()
	{
		parent::__construct(
	 		'bp_widget', // Base ID
			'Boilerplate Widget', // Name
			array(
				'description' => __( 'A Boilerplate Widget', 'text_domain' ),
			)
		);
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	form
	*
	*	@see WP_Widget::form()
	*
	*	@param array $instance 			Previously saved values from database.
	* 
	*-------------------------------------------------------------------------------------*/
	
	function form( $instance )
	{
		
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	update
	*
	*	@see WP_Widget::update()
	*
	*	@param array $new_instance 		Values just sent to be saved.
	*	@param array $old_instance 		Previously saved values from database.
	*
	*	@return array 					Updated safe values to be saved.
	* 
	*-------------------------------------------------------------------------------------*/
	
	function update( $new_instance, $old_instance )
	{
		$instance = array();
		
		return $instance;
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	widget
	*
	*	@see WP_Widget::widget()
	*
	*	@param array $args     			Widget arguments.
	*	@param array $instance 			Saved values from database.
	* 
	*-------------------------------------------------------------------------------------*/
	
	function widget( $args, $instance )
	{
	
	}
}