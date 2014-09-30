	
<?php if (get_field('products', 'options')): ?> 
	<section class="section section-products">
		
	<div class="section-title"><h3><?php echo get_option('options_products_title'); ?></h3></div>
	
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
<footer id="footer" class="section section-footer" style="background-color: #<?php echo $footer_bgcolor; ?>">
		
	<div class="container container-narrow">	
		<?php if (get_field('footer_logo', 'options')): ?>
			<div class="footer-logo">
				<?php $footer_logo = get_field('footer_logo', 'options'); ?>
				<?php echo wp_get_attachment_image($footer_logo['id'], 'tiny'); ?>
			</div>
		<?php endif; ?>

		<?php if (get_field('footer_contact', 'options')): ?>
			<div class="footer-contact">
				<?php echo get_field('footer_contact', 'options'); ?>
			</div>
		<?php endif; ?>
	</div>

</footer><!-- #colophon -->
	

<?php wp_footer(); ?>

</body>
</html>