<?php get_header(); ?>
	<section class="section section-coworker">
		<div class="container">
			
			<div class="single-coworker">
				<?php if (has_post_thumbnail()): ?>
					<div class="single-coworker-photo"><?php the_post_thumbnail('portrait_large'); ?></div>
				<?php endif; ?>

				<div class="single-coworker-info">
					<?php if (get_field('coworker_position')): ?>
						<div class="single-coworker-title"><?php echo get_field('coworker_position'); ?></div>
					<?php endif; ?>

					<h1 class="single-coworker-name"><?php the_title(); ?></h1>
					
					<?php if (get_field('coworker_phone')): ?>
						<div class="single-coworker-phone"><?php echo get_field('coworker_phone'); ?></div>
					<?php endif; ?>

					<div class="single-coworker-content">
						<?php echo $post->post_content; ?>
					</div>
				</div>
			</div>

		</div>
	</section>


	<?php if (get_field('coworker_instagram_username')): ?>
		<?php 
			$args = array(
				'post_type' => 'instagram-image',
				'posts_per_page' => 19,
				'post_status' => 'publish',
				'meta_key' => 'instagram_user',
				'meta_value' => get_field('coworker_instagram_username')
			);

			$instagram_images = new WP_Query($args); 
		?>
		<?php if ($instagram_images->have_posts()): ?>
			<section class="section section-instagram">

				<div class="section-instagram-images">
					<?php foreach ($instagram_images->posts as $image): ?>
						<?php echo get_the_post_thumbnail($image->ID, 'thumbnail'); ?>
					<?php endforeach; ?>
				</div>

				<div class="section-instagram-text">
					<h2 class="instagram-title"><?php echo 'Instagram @' . get_field('coworker_instagram_username'); ?></h2>
				</div>

			</section>
		<?php endif; ?>
	<?php endif; ?>


	<?php 
		$args = array(
			'post_type' => 'coworker',
			'posts_per_page' => -1,
			'post_status' => 'publish',
			'post__not_in' => array($post->ID)
		); 

		$coworkers = new WP_Query($args); 
	?>
	<?php if ($coworkers->have_posts()): ?>
		<section class="section section-coworkers section-other-coworkers">
			<div class="section-title"><h2>Övriga medarbetare</h2></div>
			<?php while ($coworkers->have_posts()): $coworkers->the_post(); ?>
				<article class="coworker">
					<a href="<?php echo get_the_permalink(); ?>">
						<?php if (has_post_thumbnail()): ?>
							<div class="coworker-photo">
								<?php the_post_thumbnail('portrait-small'); ?>
							</div>
						<?php endif; ?>
						<header class="coworker-header">
							<h3><?php the_title(); ?></h3>
						</header>
					</a>
					<footer class="coworker-footer">
						<p class="coworker-title"><?php echo get_field('coworker_position'); ?></p>
						<p class="coworker-phone"><?php echo get_field('coworker_phone') ? get_field('coworker_phone') : ''; ?></p>
					</footer>
				</article>
			<?php endwhile; ?>
		</section>
	<?php endif; ?>
	<?php wp_reset_query(); ?>
<?php get_footer(); ?>