<!DOCTYPE html>
<html lang="ja">

  <?php if (is_home() || is_front_page()) :?>
    <?php $title = "諭吉そば"; ?>
    <?php $description = '諭吉そば 心躍る、うまい一杯を'; ?>
  <?php elseif (is_page('contact') || is_page('complete')) :?>
    <?php $title = "お問い合わせ｜諭吉そば"; ?>
    <?php $description = '諭吉そば 心躍る、うまい一杯を'; ?>
  <?php elseif (is_single() && ('news' == get_post_type())) :?>
    <?php $title = "おしらせ｜諭吉そば"; ?>
    <?php $description = '諭吉そば 心躍る、うまい一杯を'; ?>
  <?php else:?>
    <?php $title = "諭吉そば"; ?>
    <?php $description = '諭吉そば 心躍る、うまい一杯を'; ?>
  <?php endif; ?>
  <head>
    <meta charset="UTF-8" />
    <meta name="description" content="<?= $description ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@400;500;600;700;800&family=Yuji+Syuku&display=swap" rel="stylesheet">
    <!--favicon-->
    <link rel="icon" type="image/png" href="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/icons/favicon.ico" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo esc_url(get_template_directory_uri() . '/'); ?>assets/images/icons/favicon.ico" sizes="16x16">
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
  </head>

  <body class="js-load">
