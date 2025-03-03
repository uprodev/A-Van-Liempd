<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php 
  $is_default = $default_or_custom == 'Default';
  $is_custom = $default_or_custom == 'Custom' && $custom;
  ?>

  <?php if ($is_default || $is_custom): ?>

    <?php 
    $args = array(
      'post_type' => ['kennis'], 
      'posts_per_page' => 9,
      'post_status' => 'publish',
      'paged' => get_query_var('paged')
    );
    if($is_custom) {
      $args['post__in'] = wp_list_pluck($custom, 'ID');
      $args['orderby'] = 'post__in';
    }
    $wp_query = new WP_Query($args); 
    ?>

    <?php include __DIR__ . '/../../inc/paddings.php' ?>

    <section class="card-section<?= $class_pt . $class_pb ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="container">
        <div class="row">
          <div class="title-wrap col-lg-8 col-12">

            <?php if ($title): ?>
              <h3 class="title"><?= $title ?></h3>
            <?php endif ?>
            
            <?= $text ?>

          </div>
          <div class="content d-flex flex-wrap" id="response_kennis">

            <?php while ($wp_query->have_posts()): $wp_query->the_post(); ?>

              <div class="item">
                <?php get_template_part('parts/content', 'post', ['is_custom' => false, 'post_id' => get_the_ID()]) ?>
              </div>

              <?php 
            endwhile;
            wp_reset_postdata(); 
            ?>

          </div>

          <?php if ($wp_query->max_num_pages > 1 && $load_more_button_text): ?>
            <script> var this_page = 1; </script>

            <div class="link-wrap link-wrap-full d-flex justify-content-center load_kennis">
              <a href="#" data-param-posts='<?php echo serialize($wp_query->query_vars); ?>' data-max-pages='<?php echo $wp_query->max_num_pages; ?>'><?= $load_more_button_text ?><i class="fa-light fa-arrow-right"></i></a>
            </div>
          <?php endif ?>

        </div>
      </div>
    </section>
  <?php endif ?>

  <?php include __DIR__ . '/../../inc/red_block.php' ?>

  <?php endif; ?>