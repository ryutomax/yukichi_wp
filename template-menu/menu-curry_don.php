<div class="p-menu-cont">
	<h4 class="p-menu-cont-ttl c-title fadein-zoomout-set">
		<span class="c-title-jp">ご飯もの</span>
		<span class="c-title-en">Rice</span>
	</h4>
	<p class="p-menu-text-jp fadein-set01">お米は千葉県産のコシヒカリ。手作りのカレーライスやおにぎり各種をご賞味ください。</p>
	<!-- <p class="p-menu-text-en fadein-set01">Rice is Koshihikari produced in Chiba Prefecture.<br>Please enjoy our handmade curry rice and a variety of onigiri rice balls.</p> -->
	<ul class="p-menu-list">
	<?php
		$args = array(
			'post_type' => 'menu',
			'post_status' => 'publish',
			'tax_query' => [
				[
					'taxonomy' => 'menu-cat',   // カスタムタクソノミーを指定
					'field'    => 'slug',       // タームの"slug"または"id"を指定
					'terms'    => 'curry_don',      // 絞り込みたいタームを指定
				]
			]
		);
		$wp_query = new WP_Query( $args );
		if ( $wp_query->have_posts() ):
			while ( $wp_query->have_posts() ):
				$wp_query->the_post();
	?>
			<li class="p-menu-item fadein-set01">
				<?php if( get_field('メニュー画像') ): ?>
					<div class="p-menu-item-img">
						<img src="<?php the_field('メニュー画像'); ?>" alt="<?php the_field('メニュー名'); ?>" loading="lazy">
					</div>
				<?php else: ?>
					<div class="p-menu-item-img">
						<img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/menu/menu_ready.png" alt="<?php the_field('メニュー名'); ?>" loading="lazy">
					</div>				
				<?php endif; ?>				
				<h4 class="p-menu-name">
					<!-- <span class="sub"><?php the_field('メニューリード文'); ?></span> -->
					<span class="main"><?php the_field('メニュー名'); ?></span>
					<!-- <span class="en"><?php the_field('メニュー名（英語）'); ?></span> -->
				</h4>
				<?php get_template_part('template-parts/acf_hot_cool'); ?>
				<div class="p-menu-item-intro">
					<p class="jp"><?php the_field('メニュー詳細'); ?></p>
					<!-- <p class="en"><?php the_field('メニュー詳細（英語）'); ?></p> -->
					<span class="price"><?php the_field('値段'); ?></span>
				</div>
			</li>
			<?php endwhile; ?>
	<?php else: ?>
		<p class="p-menu-ready">準備中</p>
	<?php
		endif;
		wp_reset_postdata();
	?>
	</ul>
</div>
<!-- /.p-menu-cont -->