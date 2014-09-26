<?php 
/*--------------------------------------------------------------------------------------
*
*	Get instagram photos and save them as a post with post type instagram-photo
*
*	@desc:		Performs a get request to get instagram photos and filter by users that are coworkers on Meduza
*
*	@author: 	JL
*	@since: 	2014-09-23
* 
*-------------------------------------------------------------------------------------*/

function debug($var, $die = false) {
	echo '<pre>';
	var_dump($var);
	echo '</pre>';

	if($die) 
		die();
}

define('WP_USE_THEMES', false);
require('../../../../wp-blog-header.php');

$request = file_get_contents('https://api.instagram.com/v1/media/popular?client_id=702350b3f0b74a298a8096bed8311101');

debug($request);