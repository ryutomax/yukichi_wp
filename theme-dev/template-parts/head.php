<!DOCTYPE html>
<html lang="ja">

  <?php if (is_home() || is_front_page()) :?>
    <?php $title = "TOP｜諭吉そば"; ?>
    <?php $description = '諭吉そば 心躍る、うまいラーメンを'; ?>
  <?php endif; ?>
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="<?= $description ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=BIZ+UDGothic:wght@400;700&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/sib3tig.css">
    <!--favicon-->
    <link rel="icon" type="image/png" href="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/favicons/favicon-16x16.png" sizes="16x16">
    <!--絶対パスで記述-->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="<?= $title ?>" />
    <meta property="og:locale" content="ja_JP" />
    <meta name="og:image" content="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/OGP.jpg">
    <!--twitter用-->
    <meta name="twitter:card" content="summary_large_image" /><!-- summary summary_large_image photo gallery appから選ぶ -->
    <!-- <meta name="twitter:site" content="" /> -->
    <meta name="twitter:title" content="<?= $title ?>" />
    <meta name="twitter:url" content="https://twitter.com/" />
    <meta name="twitter:description" content="<?= $description ?>" />
    <meta name="twitter:image" content="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/common/OGP.jpg" />
    <!--絶対パスで記述-->
    <title><?= $title ?></title>
    <?php wp_head(); ?>
    <!-- Google Ads -->
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5155165014369001" crossorigin="anonymous"></script>
  </head>

  <body class="js-load">
