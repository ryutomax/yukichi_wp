    <a href="#" class="c-toUpBtn js-toUpBtn u-zindex_100">
      <!-- <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/" alt="ページ上部へ"> -->
    </a>
    <footer class="p-footer">
      <div class="p-footer-inner">
        <h1 class="p-footer-logo">
          <a class="p-footer-logo-link" href="<?= esc_url(home_url('/')) ?>">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/main_logo_white.png" alt="諭吉そば 心躍る、うまいラーメンを" class="p-footer-logo-img" loading="lazy">
          </a>
        </h1>
        <nav class="p-footer-nav">
          <ul class="p-footer-nav-top u-tb-show-flex">
            <li class="p-footer-nav-item"><a href="<?= esc_url(home_url('/')) ?>aboutus" class="p-footer-nav-link"><span class="p-footer-nav-i"></a></li>
            <li class="p-footer-nav-item"><a href="<?= esc_url(home_url('/')) ?>newslist" class="p-footer-nav-link"><span class="p-footer-nav-i"></a></li>
          </ul>
          <div class="p-footer-nav-btm">
            <a href="<?= esc_url(home_url('/')) ?>information" class="p-footer-nav-link">運営会社/利用規約/プライバシーポリシー</a>
            <a href="<?= esc_url(home_url('/')) ?>contact" class="p-footer-nav-link">/ お問い合わせ</a>
          </div>
        </nav>
        
      </div>
      <!-- /.l-footer__inner -->
      <small class="p-footer-copyright">Copyright &#169; DH Inc.CO.,LTD. All rights reserved.</small>
      <?php wp_footer() ?>
    </footer>
  </body>
</html>