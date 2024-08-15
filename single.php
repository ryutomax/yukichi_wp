<?php if(is_single() && ('news' == get_post_type())):?>

    <?php get_template_part( 'template-singles/single-news'); ?>

<?php endif; ?>