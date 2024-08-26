<?php
/*
Template Name: お問い合わせフォーム
*/
?>
<?php get_template_part('template-parts/head') ?>
<?php get_template_part('template-parts/header') ?>
<main class="l-main">
  <div class="p-contact c-section">
    <div class="p-contact-inner c-section-inner">
      <?php get_template_part('template-parts/top-header'); ?>
      <div class="p-contact-form">
        <h3 class="p-contact-ttl c-title">
          <span class="c-title-jp">お問い合わせ</span>
          <span class="c-title-en">CONTACT</span>
        </h3>
        <p class="p-contact-form-caption">＊印は必須入力項目です。</p>
        <?php
          // ショートコードを呼び出してフォームを表示
          // echo do_shortcode('[contact-form-7 id="a84adb9" title="お問い合わせフォーム"]');
          echo do_shortcode('[mwform_formkey key="117"]');
        ?>
      </div>
      <!-- /.p-contact-form -->
    </div>
  </div>
</main>
<?php get_template_part('template-parts/footer') ?>

<script>
  <?php if(is_page('contact')): ?>//取材申し込み入力ページのみ処理実施
    const targetBtm = document.getElementById('input-bottom');
    if(targetBtm) {
      targetBtm.classList.add('is-display-block');
    }

    const btmLink = document.getElementById('bottom-link');
    if(btmLink) {
      btmLink.href = "<?= esc_url(home_url('/')) ?>information";
    }

    document.getElementById("datetime-local").type = "datetime-local";
  <?php endif; ?>
</script>