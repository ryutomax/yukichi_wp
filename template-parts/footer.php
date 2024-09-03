    <footer class="p-footer">
      <div class="p-footer-inner">
        <h1 class="p-footer-logo">
          <a class="p-footer-logo-link" href="<?= esc_url(home_url('/')) ?>">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/main_logo_white.png" alt="諭吉そば 心躍る、うまい一杯を" class="p-footer-logo-img" loading="lazy">
          </a>
        </h1>
        <ol class="p-footer-icons">
          <a href="https://www.facebook.com/lapin20150209/" class="p-footer-icon" terget="_blank" rel="noopener noreferrer">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/icons/Facebook_icon.png" alt="Facebook 諭吉そば 心躍る、うまい一杯を" class="p-footer-icon-img">
          </a>
          <a href="https://www.instagram.com/?hl=ja" class="p-footer-icon" terget="_blank" rel="noopener noreferrer">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/icons/Instagram_icon.png" alt="Instagram 諭吉そば 心躍る、うまい一杯を" class="p-footer-icon-img">
          </a>
          <a href="https://twitter.com/sobacchan_m" class="p-footer-icon" terget="_blank" rel="noopener noreferrer">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/icons/X_icon.png" alt="X 諭吉そば 心躍る、うまい一杯を" class="p-footer-icon-img">
          </a>
          <a href="<?= esc_url(home_url('/')) ?>contact" class="p-footer-icon">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/icons/contact_icon.png" alt="お問い合わせ" class="p-footer-icon-img">
          </a>
        </ol>
        <div class="p-footer-info">
          <p class="p-footer-info-desc">
            千葉県松戸市小根本51-9 マツドKビル 1F <br>
            営業時間：11:30～19:30（14:00～15:00休憩）<br>
            定休日  ：土・日・祝
          </p>
        </div>
      </div>
      <!-- /.l-footer__inner -->
      <small class="p-footer-copyright">Copyright &#169; DH Inc.CO.,LTD. All rights reserved.</small>
      <?php wp_footer() ?>
    </footer>
  </body>
</html>