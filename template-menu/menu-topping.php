<div class="p-menu-topping p-menu-cont">
	<h4 class="p-menu-topping-ttl c-title">
		<span class="c-title-jp">トッピング</span>
		<span class="c-title-en">Topping</span>
	</h4>
  <ul class="p-menu-topping-list">
	<?php
		$args = array(
			'post_type' => 'menu',
			'post_status' => 'publish',
			'tax_query' => [
				[
					'taxonomy' => 'menu-cat',   // カスタムタクソノミーを指定
					'field'    => 'slug',       // タームの"slug"または"id"を指定
					'terms'    => 'topping',      // 絞り込みたいタームを指定
				]
			]
		);
		$wp_query = new WP_Query( $args );
		if ( $wp_query->have_posts() ):
		while ( $wp_query->have_posts() ):
			$wp_query->the_post();
	?>
		<li class="p-menu-item">
			<h4 class="p-menu-name">
				<span class="main"><?php the_field('メニュー名'); ?></span>
				<span class="en"><?php the_field('メニュー名（英語）'); ?></span>
			</h4>
			<div class="p-menu-item-intro">
				<span class="price"><?php the_field('値段'); ?>(税込み)</span>
			</div>
		</li>
	<?php endwhile; ?>
	<?php else: ?>
		<p>準備中</p>
	<?php
		endif;
		wp_reset_postdata();
	?>
	</ul>
</div>
<!-- /.p-menu-cont -->