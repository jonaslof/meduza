<?php get_header(); ?>

<div class="row-fluid">

	<div class="span12">

		<section id="site-main" role="main">
		
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
				<?php get_template_part('tpl', 'article'); ?>
				
			<?php endwhile; else: ?>
				Nothing here to see.
			<?php endif; ?>
			
		</section><!-- #site-main -->
	
	</div><!-- .span-12 -->
	
</div><!-- .row -->
		
<?php get_footer(); ?>
