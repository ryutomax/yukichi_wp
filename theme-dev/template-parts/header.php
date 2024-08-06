<header id="header" class="l-header p-header u-zindex_1000">
  <div class="p-header-inner">
    <div class="p-header-top">
      <h1 class="p-header-logo c-logo">
        <a class="p-header-logo-link" href="<?= esc_url(home_url('/')) ?>">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/header/header-logo.png" alt="Lotus クリエイターの言葉を伝えるエンタメ総合メディア" class="p-header-logo-img">
        </a>
      </h1>
      <button class="p-header-menuBtn js-menu-btn u-tb-show" aria-label="Menuを開く">
        <span class="p-header-menuBtn-bar js-menu-btn-bar u-zindex_1"></span>
        <span class="p-header-menuBtn-bar js-menu-btn-bar u-zindex_1"></span>
        <span class="p-header-menuBtn-bar js-menu-btn-bar u-zindex_1"></span>
      </button>
    </div>
    <div class="p-header-btm js-menu-show">
      <nav class="p-header-nav">
        <div class="p-header-nav-item js-menu-text01"><a href="<?= esc_url(home_url('/')) ?>aboutus" class="p-header-nav-link"><span class="p-header-nav-i">A</span>bout Us<span class="p-header-nav-sub u-tb-show">ロータスについて</span></a></div>
        <div class="p-header-nav-item js-menu-text02"><a href="<?= esc_url(home_url('/')) ?>newslist" class="p-header-nav-link"><span class="p-header-nav-i">N</span>ews<span class="p-header-nav-sub u-tb-show">ニュース</span></a></div>
      </nav>
      <!-- /.p-header-nav -->
    </div>
    <!-- /.p-header-inner-right -->
  </div>
  <!-- /.p-header-inner -->
</header>
