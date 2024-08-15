<?php
	get_template_part('template-parts/head');
	get_template_part('template-parts/header');
?>
<main class="l-main">
	<div class="p-mainContent">
		<section class="c-content">
			<?php the_title(); ?>
			<?php the_content(); ?>
			<!-- /.p-single -->
		</section>
	</div>
	<!-- ./p-mainContent -->
</main>
<?php get_template_part('template-parts/footer'); ?>