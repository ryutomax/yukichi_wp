<?php
	get_template_part('template-parts/head');
	get_template_part('template-parts/header');
?>
<main class="l-main">
	<section class="p-newsSingle c-section">
		<div class="p-newsSingle-inner c-section-inner">
			<h3 class="p-news-ttl c-title fadein-zoomout-set">
        <span class="c-title-jp">おしらせ</span>
        <span class="c-title-en">NEWS</span>
      </h3>
			<div class="p-newsSingle-cont">
				<?php the_title(); ?>
				<?php the_content(); ?>
			</div>
		</div>
	</section>
	<!-- ./p-mainContent -->
</main>
<?php get_template_part('template-parts/footer'); ?>