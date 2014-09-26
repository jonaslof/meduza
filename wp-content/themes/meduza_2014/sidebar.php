<aside class="sidebar">
	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
		<?php dynamic_sidebar(''); ?>
	<?php endif; ?>
</aside>