<article class="coworker">
	<a href="<?php echo get_the_permalink(); ?>">
		<?php if (has_post_thumbnail()): ?>
			<div class="coworker-photo">
				<?php the_post_thumbnail('portrait-medium'); ?>
			</div>
		<?php endif; ?>
		<header class="coworker-header">
			<h2><?php the_title(); ?></h2>
		</header>
	</a>
	<footer class="coworker-footer">
		<p class="coworker-title"><?php echo get_field('coworker_position'); ?></p>
		<p class="coworker-phone"><?php echo get_field('coworker_phone') ? get_field('coworker_phone') : ''; ?></p>
	</footer>
</article>