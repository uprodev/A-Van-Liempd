<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php include __DIR__ . '/../../inc/paddings.php' ?>

  <section class="img-text<?php if($image_left_right == 'Right') echo ' img-text-revers'; if($is_red_title) echo ' red-title'; if($is_small_text) echo ' small-p'; ?><?= $class_pt . $class_pb ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
    <div class="container">
      <div class="row justify-content-between align-items-center">

        <?php if ($image): ?>
          <figure>
            <picture>
              <source srcset="<?= $image['url'] ?>" media="(min-width: 768px)">
                <?= wp_get_attachment_image($image['ID'], 'full') ?>
              </picture>
            </figure>
          <?php endif ?>
          
          <div class="text">

            <?php if ($title): ?>
              <h2><?= $title ?></h2>
            <?php endif ?>
            
            <?= $text ?>

            <?php if (is_array($links) && checkArrayForValues($links)): ?>
            <div class="link-wrap">

              <?php foreach ($links as $item): ?>
                <?php if ($item['link']): ?>
                  <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($item['link']['title']) ?><i class="fa-light fa-arrow-right"></i></a>
                <?php endif ?>
              <?php endforeach ?>
              
            </div>
          <?php endif ?>
          
        </div>
      </div>
    </div>
  </section>

  <?php if ($line_after_section): ?>
    <section class="after-img">
      <div class="container">
        <div class="row ">
          <figure>
            <img src="<?= get_stylesheet_directory_uri() ?>/img/icon-4.svg" alt="">
          </figure>
        </div>
      </div>
    </section>
  <?php endif ?>

  <?php endif; ?>