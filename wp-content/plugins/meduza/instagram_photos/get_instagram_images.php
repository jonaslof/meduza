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
//require('../../../../wp-blog-header.php');

//Use include path on live server
set_include_path('/home/meduza/public_html');
require('wp-blog-header.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/image.php');


include_once('instagram.class.php');

$instagram = new Instagram('702350b3f0b74a298a8096bed8311101');

$hashtag = ( substr(get_option('options_instagram_hashtag'), 0, 1) == '#' ) ? substr(get_option('options_instagram_hashtag'), 1) : get_option('options_instagram_hashtag');
$feed = $instagram->getTagMedia($hashtag);


$print = "Import från Instagram<br><br>";


/*
 *	Get Instagram usernames of coworkers
 */
$coworker_usernames = array();
$coworker_ids = get_posts(array(
	'post_type' => 'coworker',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'fields' => 'ids'
));

if ($coworker_ids) {
	foreach ($coworker_ids as $coworker_id) {
		$username = get_post_meta($coworker_id, 'coworker_instagram_username', true);
		if($username)
			$coworker_usernames[$coworker_id] = $username;
	}
}

/*
 *	Create a post with data from instagram photos if the user is a coworker
 */
if (!empty($feed->data)) {
	foreach ($feed->data as $photo) {
		$is_coworker = array_search($photo->user->username, $coworker_usernames);
		$post_exists = get_page_by_title($photo->id, 'OBJECT', 'instagram-image');

		if ($is_coworker && !$post_exists) {
			$post = array(
				'post_title' => $photo->id,
				'post_content' => $photo->caption->text,
				'post_date' => date('Y-m-d H:i:s', $photo->created_time),
				'post_date_gmt' => date('Y-m-d H:i:s', $photo->created_time),
				'post_type' => 'instagram-image',
				'post_status' => 'publish',
				'post_author' => 1,
			);

			$new_post = wp_insert_post($post, $wp_error);

			if ($new_post) {
				//Add custom post meta
				add_post_meta($new_post, 'instagram_id', $photo->id);
				add_post_meta($new_post, 'instagram_date', $photo->created_time);
				add_post_meta($new_post, 'instagram_image_url', $photo->images->standard_resolution->url);
				add_post_meta($new_post, 'instagram_user', $photo->user->username);
				add_post_meta($new_post, 'instagram_likes', $photo->likes->count);
				add_post_meta($new_post, 'instagram_text', $photo->caption->text);
				add_post_meta($new_post, 'instagram_link', $photo->link);

				//Upload image from instagram url
				$attach_image = media_sideload_image($photo->images->standard_resolution->url, $new_post, $photo->caption->text);
				// then find the last image added to the post attachments
				$attachments = get_posts(array('numberposts' => '1', 'orderby' => 'date', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'DSC'));
				if(sizeof($attachments) > 0){
				    // set image as the post thumbnail
				    set_post_thumbnail($new_post, $attachments[0]->ID);
				} 

				$print .= $photo->id . " sparades.<br>";
			} else {
				$print .= 'FEL - ' . $photo->id . ' kunde inte sparas. ' . $wp_error . '<br>';
			}
		} 
	}
}


echo $print;

