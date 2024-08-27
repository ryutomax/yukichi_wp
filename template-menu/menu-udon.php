<div class="p-menu-cont-udon">
	<h4 class="p-menu-cont-ttl c-title fadein-zoomout-set">
		<span class="c-title-jp">おうどん</span>
		<span class="c-title-en">Udon</span></h4>
	<p class="p-menu-text-jp fadein-set01">太めで弾力のある田舎蕎麦をしっかりした出汁が受け取と止める味わい深い一品。</p>
	<p class="p-menu-text-en fadein-set01">A flavorful dish that combines thick and chewy country soba noodles with a strong dashi stock.</p>
	<ul class="p-menu-list">
	<?php
		$args = array(
			'post_type' => 'menu',
			'post_status' => 'publish',
			'tax_query' => [
				[
					'taxonomy' => 'menu-cat',   // カスタムタクソノミーを指定
					'field'    => 'slug',       // タームの"slug"または"id"を指定
					'terms'    => 'udon',      // 絞り込みたいタームを指定
				]
			]
		);
		$wp_query = new WP_Query( $args );
		if ( $wp_query->have_posts() ):
		while ( $wp_query->have_posts() ):
			$wp_query->the_post();
	?>
		<li class="p-menu-item fadein-set01">
			<img class="p-menu-item-img" src="<?php the_field('メニュー画像'); ?>" alt="<?php the_field('メニュー名'); ?>">
			<h4 class="p-menu-name">
				<span class="sub"><?php the_field('メニューリード文'); ?></span>
				<span class="main"><?php the_field('メニュー名'); ?></span>
				<span class="en"><?php the_field('メニュー名（英語）'); ?></span>
			</h4>
			<?php get_template_part('template-parts/acf_hot_cool'); ?>
			<div class="p-menu-item-intro">
				<p class="jp"><?php the_field('メニュー詳細'); ?></p>
				<p class="en"><?php the_field('メニュー詳細（英語）'); ?></p>
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