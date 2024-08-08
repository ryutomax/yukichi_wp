<?php
	get_template_part('template-parts/head');
	get_template_part('template-parts/header');
?>
<main class="l-main">
	<?php get_template_part('template-parts/breadcrumb', null, $args); ?>
	<div class="p-mainContent">
		<section class="c-content">
			<?php
				if(have_posts()):
					while(have_posts()):
						the_post();

				$post_id = get_the_ID();
			?>
			<div class="p-single p-single-anime">
				<span class="p-single-type" style="background-color: #f4538a;">
					<?php
						$terms = wp_get_post_terms($post_id, 'category', array('fields' => 'names'));
						if (!is_wp_error($terms) && !empty($terms)) {
							echo convert_jp($terms[0]);
						}
					?>
				</span>
				<h1 class="p-single-title"><?php the_title(); ?></h1>
				<time class="p-single-date" datetime="<?= get_the_date('Y.m.d'); ?>"><?= get_the_date('Y.m.d'); ?></time>
				<?php
					$post_thumbnail = get_the_post_thumbnail_url($post_id);
					if (!$post_thumbnail) {
						$post_thumbnail = esc_url(get_template_directory_uri() . '/'). 'assets/images/common/thumbnail-none.jpg';
					}
				?>
				<img src="<?= esc_url($post_thumbnail); ?>" alt="<?php the_title(); ?>" class="p-single-thumbnail" loading="lazy">
				<?= generate_gallery_link($title); ?>
				<?php include get_template_directory() . '/template-parts/sns_share.php'; ?>

				<div class="p-single-cont">
					<?php the_content(); ?>
					<?php get_template_part('template-parts/pagination'); ?><!-- ページネーション -->
					<?php include get_template_directory() . '/template-parts/sns_share.php'; ?>
				</div>
				<?php
					endwhile;
					wp_reset_postdata();
					endif;
				?>
				<!-- 作品情報 -->
				<?php include get_template_directory() . '/template-parts/meta_info.php'; ?>
			</div>
			<!-- /.p-single -->
			<div class="p-articles">
				<div class="p-articles-related"><h2>関連記事</h2></div>
			</div>
		</section>
	</div>
	<!-- ./p-mainContent -->
</main>
<?php get_template_part('template-parts/footer'); ?>