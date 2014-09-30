<?php //Template Name: Sida med Instagram-bilder ?>
<?php get_header(); ?>
	
	<?php if (get_field('page_instagram_users')): ?>
		
		<?php 
			$usernames = array();
			foreach (get_field('page_instagram_users') as $coworker_id) {
				$cooworker_username = get_post_meta($coworker_id, 'coworker_instagram_username', true);
				if ($cooworker_username)
					array_push($usernames, $cooworker_username);
			}

			$args = array(
				'post_type' => 'instagram-image',
				'post_status' => 'publish',
				'posts_per_page' => 10
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
		
		<?php if ($images->have_posts()): ?>
			<section class="section section-instagram-page">
				<div class="section-instagram-images">
					<?php foreach ($images->posts as $image): ?>
						<?php echo get_the_post_thumbnail($image->ID, 'medium'); ?>
					<?php endforeach; ?>
				</div>
				<div class="section-instagram-text section-instagram-page-title">
					<h1 class="instagram-title"><?php the_title(); ?></h1>
				</div>
			</section>
		<?php endif; ?>

	<?php endif; ?>

	<section class="section page-section">
			<?php if (get_field('page_columns') === 'two-col') : ?>
				
				<div class="container">
					<?php if (!get_field('page_instagram_users')): ?>
						<h1 class="page-title"><?php the_title(); ?></h1>
					<?php endif; ?>
					<div class="section-text-content section-text-content-half section-text-content-left col-1-2"><?php echo get_field('left_col_content'); ?></div>
					<div class="section-text-content section-text-content-half section-text-content-right col-1-2"><?php echo $post->post_content; ?></div>
				</div>

			<?php else : ?>

				<div class="container-narrow">
					<?php if (!get_field('page_instagram_users')): ?>
						<h1 class="page-title"><?php the_title(); ?></h1>
					<?php endif; ?>
					<div class="section-text-content section-text-content-full"><?php echo $post->post_content; ?></div>
				</div>

			<?php endif; ?>
	</section>

<?php get_footer(); ?>