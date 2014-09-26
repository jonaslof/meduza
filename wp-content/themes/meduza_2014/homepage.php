<?php //Template Name: Startsida ?>
<?php get_header(); ?>
<?php 
	$sections = get_field('homepage_sections');
	if ($sections) {
		foreach ($sections as $section) {
			if($section['section_type'] === 'page_content') {
				include(locate_template('tpl-homepage_section_page.php'));
			} 
			else if ($section['section_type'] === 'instagram') {
				include(locate_template('tpl-homepage_section_instagram.php'));
			}
		}
	}
?>
<?php get_footer(); ?>