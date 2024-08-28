<?php
	get_template_part('template-parts/head');
	get_template_part('template-parts/header');
?>
<main class="l-main">
	<section class="p-top c-section">
		<div class="p-top-inner c-section-inner">
		<?php get_template_part('template-parts/top-header'); ?>
		</div>
	</section>
	<section class="p-newsSingle c-section">
		<div class="p-newsSingle-inner c-section-inner">
			<h3 class="p-news-ttl c-title fadein-zoomout-set">
				<span class="c-title-jp">おしらせ</span>
				<span class="c-title-en">NEWS</span>
			</h3>
			<div class="p-newsSingle-cont">
				<time datetime="<?= get_the_date('Y.m.d'); ?>" class="p-newsSingle-time"><?= get_the_date('Y.m.d'); ?></time>
				<h3 class="p-newsSingle-ttl"><?php the_title(); ?></h3>
				<?php if ( has_post_thumbnail() ): ?>
					<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="p-newsSingle-img">
				<?php endif; ?>
				<?php the_content(); ?>
			</div>
		</div>
	</section>
	<!-- ./p-mainContent -->
	<?php get_template_part('template-parts/access'); ?>
</main>
<?php get_template_part('template-parts/footer'); ?>