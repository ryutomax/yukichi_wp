<?php
  get_template_part('template-parts/head');
  require_once(locate_template('template-parts/module_func.php', true, true));
  get_template_part('template-parts/header');
?>
<main class="l-main">
  <section class="p-404">
    <h3 class="p-404-title">Sorry...</h3>
    <p class="p-404-text">Page not found.<br>お探しのページはありません</p>
    <a href="<?= esc_url(home_url('/')) ?>" class="p-404-topBack">TOPへ戻る</a>
  </section>
</main>
<?php get_template_part('template-parts/footer') ?>