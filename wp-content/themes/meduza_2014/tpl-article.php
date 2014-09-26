<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="article-header">
		<h3><?php the_title(); ?></h3>
	</header>
	<div class="article-content">
		<?php the_content(); ?>
	</div>
	<footer class="article-footer">
		<p>Av: <?php the_author(); ?></p>
		<p>Publicerat i <?php the_category(); ?></p>
	</footer>
</article>