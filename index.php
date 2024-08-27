<?php
	get_template_part('template-parts/head');
	get_template_part('template-parts/header');
  require_once(locate_template('template-parts/module_func.php', true, true));
?>
<main class="l-main">
  <section class="p-top c-section">
    <div class="p-top-inner c-section-inner">
      <?php get_template_part('template-parts/top-header'); ?>
      <div class="p-top-banner">
        <img src="" alt="" class="p-top-banner-img">
      </div>
      <div class="p-top-main" id="introduction">
        <div class="steamWrap fadein-set01">
          <div class="steamBox">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/greeting/greeting_mv.png" alt="心躍る、うまいラーメンを" class="p-top-main-img">
            <div class="steam01 c-steam"><img class="steam01-img" src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/steam01.png" alt="湯気"></div>
            <div class="steam02 c-steam"><img class="steam02-img" src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/steam02.png" alt="湯気"></div>
            <div class="steam03 c-steam"><img class="steam03-img" src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/steam01.png" alt="湯気"></div>
            <div class="steam04 c-steam"><img class="steam04-img" src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/steam02.png" alt="湯気"></div>
            <div class="steam05 c-steam"><img class="steam05-img" src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/steam01.png" alt="湯気"></div>
          </div>
        </div>
        <div class="p-top-main-cont">
          <h2 class="p-top-main-copy fadein-zoomout-set">心躍る、<br>うまい<br>ラーメンを</h2>
          <div class="p-top-main-text">
            <p class="p-top-main-text-jp fadein-set02">
              新しいのにどこか懐かしさを感じる味わいの<br>
              昔ながらの屋台味から、新しい味を取り入れたものまで<br>
              ラーメン、そば、うどん、カレーを手づくりしています。<br>
              それぞれの個性ある味わいをお楽しみください。
            </p>
            <p class="p-top-main-text-en fadein-set03">
              It has a taste that feels nostalgic even though it is new.<br>From traditional street food flavors to new flavors <br>We make ramen, soba, udon, and curry by hand. <br>Please enjoy the unique taste of each.
            </p>
          </div>
        </div>
      </div>
      <!-- /.p-top-main -->
    </div>
    <!-- /.p-top-inner -->
  </section>
  <section class="p-news c-section" id="news">
    <div class="p-news-inner c-section-inner">
      <h3 class="p-news-ttl c-title fadein-zoomout-set">
        <span class="c-title-jp">おしらせ</span>
        <span class="c-title-en">NEWS</span>
      </h3>
      <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/news/news_mv.png" alt="おしらせ" class="p-news-img">
      <div class="p-news-list">
        <?php
					$args = array(
						'post_type' => 'news',
						'post_status' => 'publish',
            'posts_per_page' => 10,
					);
          $news_count = 1;
          // 表示される記事数取得
					$wp_query = new WP_Query( $args );
          $news_num = $wp_query->found_posts;
					if ( $wp_query->have_posts() ):
					while ( $wp_query->have_posts() ):
						$wp_query->the_post();
				?>
          <?php if($news_count <= 5): ?>
            <article class="p-news-itme fadein-set01">
              <a href="<?php the_permalink(); ?>" class="p-news-link">
                <time datetime="<?= get_the_date('Y.m.d'); ?>" class="p-news-time"><?= get_the_date('Y.m.d'); ?></time>
                <h4 class="p-news-item-ttl"><?php str_len($post->post_title, 30); ?></h4>
              </a>
            </article>
          <?php else: ?>
            <?php if ($news_count == 6): ?>
              <div class="p-news-hide" id="blind-area" style="display:none;">
            <?php endif; ?>
              <article class="p-news-itme fadein-set01">
                <a href="<?php the_permalink(); ?>" class="p-news-link">
                  <time datetime="<?= get_the_date('Y.m.d'); ?>" class="p-news-time"><?= get_the_date('Y.m.d'); ?></time>
                  <h4 class="p-news-time-ttl"><?php str_len($post->post_title, 30); ?></h4>
                </a>
              </article>
            <!-- 最後の記事でタグを閉じる 記事カウント件数＝表示記事数-->
            <?php if ($news_count == $news_num + 1): ?>
              </div>
              <!-- /.p-news-hide -->
            <?php endif; ?>
          <?php endif; ?>
        <?php $news_count++; ?>
        <?php endwhile; ?>
        <?php else: ?>
          <p>お知らせはありません。</p>
        <?php
            endif;
            wp_reset_postdata();
        ?>
      </div>
      <?php if($news_num > 5): ?>
        <button id="more" class="p-news-more">MORE</button>
      <?php endif; ?>
    </div>
    <!-- /.p-news-inner -->
  </section>
  <section class="p-menu c-section" id="menu">
    <div class="p-menu-inner c-section-inner">
      <h3 class="p-menu-ttl c-title">
        <span class="c-title-jp fadein-zoomout-set">おしながき</span>
        <span class="c-title-en fadein-zoomout-set">MENU</span>
      </h3>
      <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/menu/menu_mv.png" alt="心躍る、うまいラーメンを" class="p-menu-img">
      <!-- ラーメン -->
      <?php get_template_part('template-menu/menu-ramen'); ?>
      <!-- お蕎麦 -->
      <?php get_template_part('template-menu/menu-soba'); ?>
      <!-- おうどん -->
      <?php get_template_part('template-menu/menu-udon'); ?>
      <!-- トッピング -->
      <?php get_template_part('template-menu/menu-topping'); ?>
      <!-- カレー・丼 -->
      <?php get_template_part('template-menu/menu-curry_don'); ?>
      <p class="p-menu-caption">※価格は税込です。※商品情報は一部となります。詳しくは店舗メニューよりご確認ください。<br>
      ※店舗の都合により、販売する数量や時間の限定、及び予告なく販売を中止させていただく場合もございますので、あらかじめご了承ください。</p>
    </div>
    <!-- /.p-menu-inner -->
  </section>
  <!-- アクセス -->
  <?php get_template_part('template-parts/access'); ?>
</main>
<?php get_template_part('template-parts/footer'); ?>
<script>
  $('#more').click(function() {
    $('#blind-area').css('display', 'block');
    $(this).css('display', 'none')
  });
</script>
