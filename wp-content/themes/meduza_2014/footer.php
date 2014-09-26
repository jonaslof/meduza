	
	<?php if (get_field('products', 'options')): ?> 
		<section class="section section-products">
			<h2><?php echo get_option('options_products_title'); ?></h2>
			
			<?php foreach (get_field('products', 'options') as $product):  ?>
	
				<?php if ($product['product_logo']): ?>
					<?php if ($product['product_link'] && $product['product_link'] != ''): ?>
						<a href="<?php echo $product['product_link']?>" title="<?php echo $product['product_logo']['title']; ?>" target="_blank"><?php echo wp_get_attachment_image($product['product_logo']['id'], 'tiny'); ?></a>
					<?php else: ?>
						<?php echo wp_get_attachment_image($product['product_logo']['id'], 'tiny'); ?>
					<?php endif; ?>
				<?php endif; ?>
			<?php endforeach; ?>

		</section>
	<?php endif; ?>


	<?php $footer_bgcolor = get_field('footer_bgcolor', 'options') ? get_field('footer_bgcolor', 'options') : ''; ?>
	<footer id="colophon" class="row-fluid" role="contentinfo" style="background-color: #<?php echo $footer_bgcolor; ?>">
	
		<div class="span12">
			This is a footer.
		</div>
	
	</footer><!-- #colophon -->
	
</div><!-- .container-fluid -->

<?php wp_footer(); ?>

</body>
</html>