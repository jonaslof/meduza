<?php

	include_once('lib/advanced_custom_fields.php');

	add_theme_support( 'post-thumbnails' );
	
	/*------------------------------------------------------------------*\
	 *	Load scripts													*
	\*------------------------------------------------------------------*/
	
    function register_scripts_and_styles() {
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("http://code.jquery.com/jquery-latest.min.js"), false);
        wp_enqueue_script('jquery');

        wp_deregister_script('scripts');
        wp_register_script('scripts', (get_bloginfo('url') . "/wp-content/themes/meduza_2014/public/scripts.min.js"), array('jquery'), false, false);
        wp_enqueue_script('scripts');

        wp_deregister_style('styles');
        wp_register_style('styles', (get_bloginfo('url') . "/wp-content/themes/meduza_2014/public/assets/css/styles.css"), false);
        wp_enqueue_style('styles');

        wp_deregister_style('sprites');
        wp_register_style('sprites', (get_bloginfo('url') . "/wp-content/themes/meduza_2014/public/sprites.css"), false);
        wp_enqueue_style('sprites');
    }

	if( !is_admin() )
	{
		add_filter('wp_enqueue_scripts', 'register_scripts_and_styles');
	}

	
	/*--------------------------------------------------------------------------------------
    *   Register menus
    *
    *   @desc: 
    *   @author: 
    *   @since: 
    *-------------------------------------------------------------------------------------*/
    register_nav_menu('header-menu', __( 'Huvudmeny' ));


	/*--------------------------------------------------------------------------------------
    *   Add class to current menu item 
    *
    *   @desc: 
    *   @author: 
    *   @since: 
    *-------------------------------------------------------------------------------------*/
	function current_menu_item_class( $classes, $item )
	{
		if( in_array('current_page_item', $classes) )
		{
			$classes[] = "active";
		}
		return $classes;
	}
	add_filter('nav_menu_css_class', 'current_menu_item_class', 10 , 2);


	/*--------------------------------------------------------------------------------------
    *   Function to add a custom post type archive to menu 
    *
    *   @desc: 
    *   @author: 
    *   @since: 
    *-------------------------------------------------------------------------------------*/
    function current_type_nav_class($classes, $item) {
        $post_type = get_query_var('post_type');

        // Go to Menus and add a menu class named: {custom-post-type}-menu-item
        // This adds a 'current_page_parent' class to the parent menu item
        if( in_array( $post_type.'-menu-item', $classes ) )
            array_push($classes, 'current_page_item');

        return $classes;
    }
    add_filter('nav_menu_css_class', 'current_type_nav_class', 10, 2);


    /*--------------------------------------------------------------------------------------
    *   Register widget spaces 
    *
    *   @desc: 
    *   @author: 
    *   @since: 
    *-------------------------------------------------------------------------------------*/
    $args = array(
        'name'          => 'Övre sidfot',
        'id'            => 'footer-top',
        'description'   => 'Widgets som visas näst längst ner på alla sidor',
        'class'         => 'footer-top-widgets',
        'before_widget' => '<div class="widget footer-top-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>'
    );

    register_sidebar($args);

    $args = array(
        'name'          => 'Nedre Sidfot',
        'id'            => 'footer-bottom',
        'description'   => 'Widgets som visas längst ner på alla sidor',
        'class'         => 'footer-bottom-widgets',
        'before_widget' => '<div class="widget footer-bottom-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widgettitle">',
        'after_title'   => '</h3>'
    );

    register_sidebar($args);


    /*--------------------------------------------------------------------------------------
    *   Image sizes 
    *
    *   @desc: 
    *   @author: 
    *   @since: 
    *-------------------------------------------------------------------------------------*/
    function custom_image_sizes() 
    {
        add_image_size('tiny', 150, 150);
        add_image_size('portrait-small', 240, 360, array('center', 'center'));
        add_image_size('portrait-medium', 300, 450, array('center', 'center'));
        add_image_size('portrait-large', 440, 1000);
        add_image_size('cover', 1600, 1600);
    }
    add_action('after_setup_theme', 'custom_image_sizes');


    /**
     * Edit the admin menu
     * @return [type] [description]
     */
    function edit_admin_menus() {
    	global $menu;
		remove_menu_page( 'index.php' ); //Dashboard
		remove_menu_page( 'edit.php' );  //Posts
		remove_menu_page( 'edit-comments.php' );  //Comments
	  	
		//Move Media menu item
	  	$media_menu_item = $menu[10];
	  	unset($menu[10]);
	  	unset($menu[4]); //Separator
	  	$menu[30] = $media_menu_item;

	  	//ACF Options page
	  	$acf_options = $menu[100];
	  	unset($menu[100]);
	  	$menu[24] = $acf_options;
	  	$menu[24][6] = 'dashicons-welcome-widgets-menus';

	  	return $menu;
	}
	add_action( 'admin_menu', 'edit_admin_menus', 12 );


	/**
	 * Edit the settings for the ACF Options page
	 * @param  [type] $settings [description]
	 * @return [type]           [description]
	 */
	function my_acf_options_page_settings( $settings )
	{
		$settings['title'] = 'Innehåll';
		$settings['pages'] = array('Allmänt', 'Sidfot');
		return $settings;
	}

	add_filter('acf/options_page/settings', 'my_acf_options_page_settings');
	
?>