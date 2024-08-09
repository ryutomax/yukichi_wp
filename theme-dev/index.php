<?php
	get_template_part('template-parts/head');
	get_template_part('template-parts/header');

  echo "debug now";
?>
<main class="l-main">
  <section class="p-top c-section">
    <div class="p-top-inner">
      <div class="p-top-banner">
        <img src="" alt="" class="p-top-banner-img">
      </div>
      <div class="p-top-main">
        <img src="" alt="" class="p-top-main-img">
        <div class="p-top-main-cont">
          <h2 class="p-top-main-h2">心躍る、<br>うまい<br>ラーメンを</h2>
          <div class="p-top-main-text">
            <p class="p-top-main-text-jp">
              新しいのにどこか懐かしさを感じる味わいの<br>
              昔ながらの屋台味から、新しい味を取り入れたものまで<br>
              ラーメン、そば、うどん、カレーを手づくりしています。<br>
              それぞれの個性ある味わいをお楽しみください。
            </p>
            <p class="p-top-main-text-en">
              It has a taste that feels nostalgic even though it is new. From traditional street food flavors to new flavors We make ramen, soba, udon, and curry by hand. Please enjoy the unique taste of each.
            </p>
          </div>
        </div>
      </div>
      <!-- /.p-top-main -->
    </div>
    <!-- /.p-top-inner -->
  </section>
  <section class="p-news c-section">
    <div class="p-news-inner">
      <h3 class="p-news-ttl c-title"><span>おしらせ</span><span>NEWS</span></h3>
      <img src="" alt="" class="p-news-img">
      <ul class="p-news-list">
        <li class="p-news-time">
          <time datetime="" class="p-news-time"></time>
          <h4 class="p-news-time-ttl"></h4>
        </li>
      </ul>
      <button class="p-news-more">MORE</button>
    </div>
    <!-- /.p-news-inner -->
  </section>
  <section class="p-menu c-section">
    <div class="p-menu-inner">
      <h3 class="p-menu-ttl c-title"><span>おしながき</span><span>MENU</span></h3>
      <img src="" alt="" class="p-menu-img">
      <div class="p-menu-ramen">
        <h4 class="p-menu-ramen-ttl c-title"><span>ラーメン</span><span>Soy-sauce Ramen</span></h4>
        <p class="p-menu-text-jp">まろやかな醤油の味わい、チャーシュー丼との相性も抜群です。</p>
        <p class="p-menu-text-en">The mellow soy sauce taste goes perfectly with the chashu rice bowl. The compatibility is also excellent.</p>
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
          <li class="p-menu-item">
            <img src="p-menu-item-img" alt="">
            <h4 class="p-menu-item-ttl">
              <span class="sub"><?php the_field('メニューリード文'); ?></span>
              <span class="main"><?php the_field('メニュー名'); ?></span>
              <span class="en"><?php the_field('メニュー名（英語）'); ?></span>
            </h4>
            <div class="p-menu-item-intro">
              <p class="jp"><?php the_field('メニュー詳細'); ?></p>
              <p class="en"><?php the_field('メニュー詳細（英語）'); ?></p>
              <span class="price"><?php the_field('値段'); ?>(税込み)</span>
            </div>

          </li>
          <?php endwhile; ?>
          <?php else: ?>
            <p>該当する記事がありません。</p>
          <?php
              endif;
              wp_reset_postdata();
          ?>
        </ul>
      </div>
    </div>
    <!-- /.p-menu-inner -->
  </section>
</main>

<?php get_template_part('template-parts/footer'); ?>
