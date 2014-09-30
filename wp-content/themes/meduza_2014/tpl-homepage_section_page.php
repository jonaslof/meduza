<?php if ($section['section_pagecontent']) : ?>
	<?php $post = $section['section_pagecontent']; ?>

		<?php if (has_post_thumbnail()) :  ?>

			<?php $image_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
			<section id="section" class="homepage-section homepage-section-cover" style="background-image: url(<?php echo $image_src[0];?>);">
				<div class="section-cover-content">
					<div class="container container-narrow homepage-section-container">
							<?php if (get_field('page_columns') === 'two-col') : ?>
								<div class="section-text-content section-text-content-half section-text-content-left col-1-2"><?php echo get_field('left_col_content'); ?></div>
								<div class="section-text-content section-text-content-half section-text-content-right col-1-2"><?php echo $post->post_content; ?></div>
							<?php else : ?>
								<div class="section-text-content section-text-content-full"><?php echo $post->post_content; ?></div>
							<?php endif; ?>
					</div>
				</div>
			</section>	

		<?php else : ?>
		
			<section id="section" class="homepage-section">
				
					<?php if (get_field('page_columns') === 'two-col') : ?>
						<div class="container">
							<div class="section-title"><h2><?php the_title(); ?></h2></div>
							<div class="section-text-content section-text-content-half section-text-content-left col-1-2"><?php echo get_field('left_col_content'); ?></div>
							<div class="section-text-content section-text-content-half section-text-content-right col-1-2"><?php echo $post->post_content; ?></div>
						</div>>
					<?php else : ?>
						<div class="container container-narrow">
							<div class="section-title"><h2><?php the_title(); ?></h2></div>
							<div class="section-text-content section-text-content-full"><?php echo $post->post_content; ?></div>
						</div>
					<?php endif; ?>
			</section>	

		<?php endif; ?>
	


<?php endif; ?>