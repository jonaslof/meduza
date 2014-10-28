<?php
	if (!empty($section['section_instagramusers'])) {
		$usernames = array();
		foreach ($section['section_instagramusers'] as $coworker_id) {
			$cooworker_username = get_post_meta($coworker_id, 'coworker_instagram_username', true);
			if ($cooworker_username)
				array_push($usernames, $cooworker_username);
		}
	}

	$args = array(
		'post_type' => 'instagram-image',
		'post_status' => 'publish',
		'posts_per_page' => 19
	);

	if ($usernames && !empty($usernames)) {
		$args['meta_query'] = array(
			array(
				'key'     => 'instagram_user',
				'value'   => $usernames,
				'compare' => 'IN',
			),
		);
	}


	$images = new WP_Query($args);
?>

<section class="homepage-section homepage-section-instagram">
	
	<div class="section-instagram-images">
		<?php if ($images->have_posts()) : ?>
			<?php while ($images->have_posts()) : $images->the_post(); ?>
				<div class="instagram-image"><?php the_post_thumbnail('thumbnail'); ?></div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_query(); ?>
	</div>

	<div class="section-instagram-text">
		<?php if ($section['section_instagramtext']) : ?>
			<h2 class="instagram-title"><?php echo $section['section_instagramtext']; ?></h2>
		<?php endif; ?>
	</div>

</section>