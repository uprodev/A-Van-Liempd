<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php include __DIR__ . '/../../inc/paddings.php' ?>

  <?php 
  $is_default = $selector == 'Default' && ($posts = get_posts(['post_type' => 'kennis', 'posts_per_page' => 10]));
  $is_select = $selector == 'Select' && $select;
  $is_custom = $selector == 'Custom' &&  is_array($custom) && checkArrayForValues($custom);
  $items = $is_custom ? $custom : ($is_default ? $posts : $select);
  ?>

  <?php if ($is_default || $is_select || $is_custom ): ?>
    <section class="knowledge-slider-wrap<?= $class_pt . $class_pb ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="container">
        <div class="row">
          <div class="bg"></div>
          <div class="wrap">

            <?php if ($title): ?>
              <h2><?= $title ?></h2>
            <?php endif ?>

            <div class="swiper knowledge-slider">
              <div class="swiper-wrapper">

                <?php foreach ($items as $item): ?>
                  <div class="swiper-slide">
                    <?php get_template_part('parts/content', 'post', ['is_custom' => $is_custom, 'post_id' => $item->ID]) ?>
                  </div>
                <?php endforeach ?>

              </div>
            </div>
            <div class="bottom-pagination-knowledge">
              <div class="row d-flex flex-nowrap">
                <div class="swiper-pagination knowledge-pagination"></div>
                <div class="dots d-flex flex-nowrap">

                  <?php foreach ($items as $item): ?>
                    <div class="dot"></div>
                  <?php endforeach ?>

                </div>
              </div>
            </div>

            <?php if ($button): ?>
              <div class="link-wrap link-wrap-full">
                <a href="<?= $button['url'] ?>"<?php if($button['target']) echo ' target="_blank"' ?>><?= html_entity_decode($button['title']) ?><i class="fa-light fa-arrow-right"></i></a>
              </div>
            <?php endif ?>

          </div>
        </div>
      </div>
    </section>
  <?php endif ?>

  <?php include __DIR__ . '/../../inc/red_block.php' ?>

  <?php endif; ?>