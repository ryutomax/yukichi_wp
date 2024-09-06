<?php
  $temp = get_field("温冷");
  if($temp): 
?>
<div class="p-menu-temp">
  <?php foreach( $temp as $t ): ?>
    <?php if($t == "hot"): ?>
      <img src="<?= esc_url(get_template_directory_uri() . '/'); ?>assets/images/menu/menu-hot.png" alt="hot" class="" loading=”lazy”>
    <?php endif; ?>
    <?php if($t == "cool"): ?>
      <img src="<?= esc_url(get_template_directory_uri() . '/'); ?>assets/images/menu/menu-cool.png" alt="cool" class="" loading=”lazy”>
    <?php endif; ?>
  <?php endforeach; ?>
</div>
<?php endif; ?>