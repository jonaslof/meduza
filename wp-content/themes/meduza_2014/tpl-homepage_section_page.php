<?php if ($section['section_pagecontent']) : ?>
	<?php $post = $section['section_pagecontent']; ?>
	<section id="section" class="homepage-section">

		<?php if (has_post_thumbnail()) :  ?>
			<div class="section-background">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php else : ?>
			<h2><?php the_title(); ?></h2>
		<?php endif; ?>
		
		<?php if (get_field('page_columns') === 'two-col') : ?>
			<div class="section-text-content section-text-content-half section-text-content-left"><?php echo get_field('left_col_content'); ?></div>
			<div class="section-text-content section-text-content-half section-text-content-right"><?php echo $post->post_content; ?></div>
		<?php else : ?>
			<div class="section-text-content section-text-content-full"><?php echo $post->post_content; ?></div>
		<?php endif; ?>

	</section>

<?php endif; ?>