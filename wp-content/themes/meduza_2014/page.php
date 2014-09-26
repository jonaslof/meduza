<?php get_header(); ?>

		<div id="content" class="row-fluid">
		
			<div class="span12">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php echo the_content(); ?>
			<?php endwhile; else: ?>
				Nothing here to see.
			<?php endif; ?>
			</div><!-- .span-12 -->
			
		</div><!-- .row -->
		
<?php get_footer(); ?>
