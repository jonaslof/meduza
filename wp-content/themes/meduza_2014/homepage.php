<?php //Template Name: Startsida ?>
<?php get_header(); ?>
<?php 
	$sections = get_field('homepage_sections');
	if ($sections) {
		$section_number = 0;
		foreach ($sections as $section) {
			$section_number++;
			if($section['section_type'] === 'page_content') {
				include(locate_template('tpl-homepage_section_page.php'));
			} 
			else if ($section['section_type'] === 'instagram') {
				include(locate_template('tpl-homepage_section_instagram.php'));
			}
		}
	}
?>
<div class="icon-arrow"></div>
<?php get_footer(); ?>