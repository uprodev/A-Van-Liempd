<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php 
  $is_default = $default_or_custom == 'Default' && ($posts = get_posts(['post_type' => 'dienst', 'posts_per_page' => -1]));
  $is_custom = $default_or_custom == 'Custom' &&  is_array($custom) && checkArrayForValues($custom);
  $items = $is_default ? $posts : $custom;
  ?>

  <?php if ($is_default || $is_custom): ?>

    <?php include __DIR__ . '/../../inc/paddings.php' ?>

    <section class="card-section<?= $class_pt . $class_pb ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="container">
        <div class="row">
          <div class="content d-flex flex-wrap">

            <?php foreach ($items as $item): ?>
              <div class="item">

                <?php 
                $background_image_id = $is_default ? get_post_thumbnail_id($item->ID) : $item['image']['ID'];
                $background_image_url = $is_default ? get_the_post_thumbnail_url($item->ID, 'full') : $item['image']['url'];
                ?>

                <?php if ($background_image_id): ?>
                  <figure>
                    <picture><source srcset="<?= $background_image_url ?>" media="(min-width: 768px)">
                      <?= wp_get_attachment_image($background_image_id, 'full') ?>
                    </picture>
                  </figure>
                <?php endif ?>

                <div class="text">

                  <?php if ($subtitle = $is_default ? (($terms = wp_get_object_terms($item->ID, 'dienst_cat')) ? $terms[0]->name : '') : $item['subtitle']): ?>
                    <h6 class="label"><?= $subtitle ?></h6>
                  <?php endif ?>

                  <?php if ($title = $is_default ? get_the_title($item->ID) : $item['title']): ?>
                    <h3 class="title"><?= $title ?></h3>
                  <?php endif ?>

                  <?php 
                  $link_url = $is_default ? get_the_permalink($item->ID) : $item['link']['url'];
                  $link_title = $is_default ? __('Verder lezen', 'AVL') : $item['link']['title'];
                  $link_target = $is_default ? '' : $item['link']['target'];
                  ?>

                  <?php if ($link_url): ?>
                    <div class="link-wrap link-wrap-white">
                      <a href="<?= $link_url ?>"<?php if($link_target) echo ' target="_blank"' ?>><?= $link_title ?><i class="fa-light fa-arrow-right"></i></a>
                    </div>
                  <?php endif ?>

                </div>
              </div>
            <?php endforeach ?>

          </div>
        </div>
      </div>
    </section>
  <?php endif ?>

  <?php include __DIR__ . '/../../inc/red_block.php' ?>

  <?php endif; ?>