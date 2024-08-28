<?php
/*
Template Name: 送信完了
*/
?>
<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>
<main class="l-main">
  <div class="p-contact">
    <?php get_template_part('template-parts/top-header'); ?>
    <div class="p-contact-form">
      <h3 class="p-contact-ttl c-title">
        <span class="c-title-jp">送信完了</span>
        <span class="c-title-en">CONTACT</span>
      </h3>
      <?php
        // ここにページの他のコンテンツやテンプレートコードを追加

        // ショートコードを呼び出してフォームを表示
        echo do_shortcode('[mwform_formkey key="117"]');

        // ここにページの他のコンテンツやテンプレートコードを追加
      ?>
      <p class="p-contact-text">お問い合わせありがとうございます。<br>内容確認後、担当者よりご回答させて頂きます。</p>
      <a href="<?= esc_url(home_url('/')) ?>" class="p-input-topBack">TOPへ戻る</a>
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer') ?>