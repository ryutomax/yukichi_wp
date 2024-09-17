<div class="p-menu-cont">
	<h4 class="p-menu-cont-ttl c-title fadein-zoomout-set">
		<span class="c-title-jp">ラーメン</span>
		<span class="c-title-en">Ramen</span>
	</h4>
	<p class="p-menu-text-jp fadein-set01">コシのある太麺にキレのある特製醤油を使ったスープ、しっとりチャーシューと<br>手切りメンマにざっくり切った青ネギのトッピングの特製ラーメンをご賞味ください。</p>
	<!-- <p class="p-menu-text-en fadein-set01">Please enjoy our special ramen noodles with thick, firm noodles, a sharp broth made with special soy sauce, <br>moist chashu pork and hand-cut bamboo shoots, topped with roughly chopped green onions.</p> -->
	<ul class="p-menu-list">
	<?php
		$args = array(
			'post_type' => 'menu',
			'post_status' => 'publish',
			'tax_query' => [
				[
					'taxonomy' => 'menu-cat',   // カスタムタクソノミーを指定
					'field'    => 'slug',       // タームの"slug"または"id"を指定
					'terms'    => 'ramen',      // 絞り込みたいタームを指定
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
				<img class="p-menu-item-img" src="<?php the_field('メニュー画像'); ?>" alt="<?php the_field('メニュー名'); ?>" loading=”lazy”>
			<?php else: ?>
				<img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/menu/menu_ready.png" alt="<?php the_field('メニュー名'); ?>" class="p-menu-item-img-ready" loading=”lazy”>
			<?php endif; ?>
			<h4 class="p-menu-name">
				<span class="sub"><?php the_field('メニューリード文'); ?></span>
				<span class="main"><?php the_field('メニュー名'); ?></span>
				<!-- <span class="en"><?php the_field('メニュー名（英語）'); ?></span> -->
			</h4>
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