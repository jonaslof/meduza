<?php get_header(); ?>
	
	<section class="section section-coworkers">
		<div class="container-wide">
			<div class="page-title"><h1>Frisök</h1></div>
			<?php if ( have_posts() ) : ?>
				<div class="coworkers">
					<?php while ( have_posts() ) : the_post(); ?>		
						<?php get_template_part('tpl', 'coworker'); ?>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

<?php get_footer(); ?>