
<?php
		$args = array(
			'post_type' => 'banner',
			'post_status' => 'publish',
      'posts_per_page' => 1
		);
		$wp_query = new WP_Query( $args );
		if ( $wp_query->have_posts() ):
			while ( $wp_query->have_posts() ):
				$wp_query->the_post();
	?>
    <div class="p-top-banner">
      <img src="<?php the_post_thumbnail_url(); ?>" alt="<?= the_title(); ?>" class="p-top-banner-img">
    </div>
    <?php endwhile; ?>
	<?php else: ?>
	<?php
		endif;
		wp_reset_postdata();
	?>