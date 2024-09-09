<header id="header" class="p-header js-header u-zindex_1000">
  <div class="p-header-inner">
    <div class="p-header-top">
      <h1 class="p-header-logo c-logo fadein-zoomout-set">
        <a class="p-header-logo-link" href="<?= esc_url(home_url('/')) ?>">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/main_logo_black.png" alt="諭吉そば 心躍る、うまい一杯を" class="p-header-logo-img">
        </a>
      </h1>
      <button class="c-menuBtn js-menu-btn u-zindex_1000" aria-label="Menuを開く">
        <span class="c-menuBtn-bar js-menu-btn-bar u-zindex_1"></span>
        <span class="c-menuBtn-bar js-menu-btn-bar u-zindex_1"></span>
        <span class="c-menuBtn-bar js-menu-btn-bar u-zindex_1"></span>
      </button>
    </div>
    <!-- /.p-header-top -->
    <div class="p-header-btm js-menu-show">
      <nav class="p-header-nav">
        <div class="p-header-nav-item fadein-set04"><a href="<?= esc_url(home_url('/')) ?>#introduction" class="p-header-nav-link">ごあいさつ</a></div>
        <div class="p-header-nav-item fadein-set05"><a href="<?= esc_url(home_url('/')) ?>#news" class="p-header-nav-link">おしらせ</a></div>
        <div class="p-header-nav-item fadein-set06"><a href="<?= esc_url(home_url('/')) ?>#menu" class="p-header-nav-link">おしながき</a></div>
        <div class="p-header-nav-item fadein-set07"><a href="<?= esc_url(home_url('/')) ?>#access" class="p-header-nav-link">アクセス</a></div>
      </nav>
      <!-- /.p-header-nav -->
    </div>
    <!-- /.p-header-btm -->
  </div>
  <!-- /.p-header-inner -->
</header>