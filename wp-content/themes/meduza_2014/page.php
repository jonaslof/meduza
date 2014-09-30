<?php get_header(); ?>

		<section class="section page-section">

			<?php if (get_field('page_columns') === 'two-col') : ?>
				<div class="container">
					<div class="page-title"><h1><?php the_title(); ?></h1></div>
					<div class="section-text-content section-text-content-half section-text-content-left col-1-2"><?php echo get_field('left_col_content'); ?></div>
					<div class="section-text-content section-text-content-half section-text-content-right col-1-2"><?php echo $post->post_content; ?></div>
				</div>
			<?php else : ?>
				<div class="container-narrow">
					<div class="page-title"><h1><?php the_title(); ?></h1></div>
					<div class="section-text-content section-text-content-full"><?php echo $post->post_content; ?></div>
				</div>
			<?php endif; ?>
		</div>
	</section>
		
<?php get_footer(); ?>
