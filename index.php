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
              東京蒲田の老舗蕎麦店で長年修行を重ねた後、<br>
              ここ松戸の地でおよそ10年にわたり蕎麦店を営んできた、<br>
              74歳松戸名物おばちゃん店主の店が<br>
              心機一転『諭吉そば』として生まれ変わりました。<br><br>
              74歳にしてとにかく元気な店主が<br>
              「まかない」をベースに考案した<br>
              特製醤油ラーメンをメインに、<br>
              極太蕎麦やうどん、揚げたての天ぷらや<br>
              蕎麦店時代から人気の手作り唐揚げなど、<br>
              毎日店主自ら仕込んでいます。<br>
              美味しくてお腹も満足していただけるボリューム感と<br>
              アットホームな雰囲気、店主の心意気は<br>
              蕎麦店時代から変わらず引き継がれたもの。<br>
              カウンター８席の小さなお店ではありますが、<br>
              皆様のお越しをお待ちしております。<br>
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
      <button id="more" class="p-news-more">MORE</button>
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
  <section class="p-access c-section fadein-set" id="access">
    <div class="p-access-inner c-section-inner">
      <h3 class="p-access-ttl c-title fadein-zoomout-set">
        <span class="c-title-jp">アクセス</span>
        <span class="c-title-en">ACCESS</span>
      </h3>
      <div class="p-access-cont fadein-set01">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/access/access_mv.png" alt="諭吉そば" class="p-access-img">
        <div class="p-access-info">
          <div class="p-access-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3241.7479746645863!2d139.7454329!3d35.6585805!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bbd9009ec09%3A0x481a93f0d2a409dd!2z5p2x5Lqs44K_44Ov44O8!5e0!3m2!1sja!2sjp!4v1723253211003!5m2!1sja!2sjp" style="border:0;" allowfullscreen="" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <p class="p-access-meta">
            千葉県松戸市小根本51-9 マツドKビル 1F <br>
            営業時間：11:45～14:00 <br>
            定休日  ：土曜日、日曜日、祝日
          </p>
        </div>
      </div>
      <!-- /.p-access-cont -->
    </div>
    <!-- /.p-menu-inner -->
  </section>
</main>
<?php get_template_part('template-parts/footer'); ?>
<script>
  $('#more').click(function() {
    $('#blind-area').css('display', 'block');
    $(this).css('display', 'none')
  });
</script>
