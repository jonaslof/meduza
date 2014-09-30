<?php //Template Name: Priser ?>
<?php get_header(); ?>
	<section class="section section-prices">
		<div class="container">
			<div class="page-title"><h1><?php the_title(); ?></h1></div>

			<div class="pricelist pricelist-hair">
				<div class="pricelist-inner">
					<?php if (get_field('pricelist_hair_title')): ?>
						<header class="pricelist-header">
							<div class="pricelist-title-decoration"></div>
							<h2 class="pricelist-title"><?php echo get_field('pricelist_hair_title'); ?></h2>
						</header>
					<?php endif; ?>

					<?php $pricelist = get_field('pricelist_hair'); ?>
					<?php if ($pricelist): ?>
						<ul class="pricelist-items">
							<?php foreach ($pricelist as $service): ?>
								<li class="pricelist-item">
									<div class="pricelist-item-service"><?php echo $service['pricelist_hair_service']; ?></div>
									<div class="pricelist-item-price"><?php echo $service['pricelist_hair_price']; ?></div>
								</li> 
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>

			<div class="pricelist pricelist-nails">
				<div class="pricelist-inner">
					<?php if (get_field('pricelist_nails_title')): ?>
						<header class="pricelist-header">
							<div class="pricelist-title-decoration"></div>
							<h2 class="pricelist-title"><?php echo get_field('pricelist_nails_title'); ?></h2>
						</header>
					<?php endif; ?>

					<?php $pricelist = get_field('pricelist_nails'); ?>
					<?php if ($pricelist): ?>
						<ul class="pricelist-items">
							<?php foreach ($pricelist as $service): ?>
								<li class="pricelist-item">
									<div class="pricelist-item-service"><?php echo $service['pricelist_nails_service']; ?></div>
									<div class="pricelist-item-price"><?php echo $service['pricelist_nails_price']; ?></div>
								</li> 
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>
			</div>

			<?php if (get_field('page_columns') === 'two-col') : ?>
				<div class="section-text-content section-text-content-half section-text-content-left col-1-2"><?php echo get_field('left_col_content'); ?></div>
				<div class="section-text-content section-text-content-half section-text-content-right col-1-2"><?php echo $post->post_content; ?></div>
			<?php else : ?>
				<div class="section-text-content section-text-content-full"><?php echo $post->post_content; ?></div>
			<?php endif; ?>
		</div>
	</section>
<?php get_footer(); ?>