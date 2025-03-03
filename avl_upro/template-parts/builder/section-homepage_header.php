<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="home-banner<?php if(!$background_video) echo ' no-video' ?>">
    <div class="bg">
      <?= wp_get_attachment_image($background_image['ID'], 'full') ?>

      <?php if ($background_video): ?>
        <iframe src="<?= $background_video ?>?background=1&autoplay=1&loop=1&muted=1" frameborder="0" allow="autoplay; fullscreen" allowfullscreen>
        </iframe>
      <?php endif ?>
      
    </div>
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <div class="text">

          <?php if ($title): ?>
            <h1><?= $title ?></h1>
          <?php endif ?>

          <?= $text ?>

          <?php if ($primary_button): ?>
            <div class="btn-wrap">
              <a href="<?= $primary_button['url'] ?>" class="btn-default btn-play"<?php if($primary_button['target']) echo ' target="_blank"' ?>>
                <span class="btn-text"><?= html_entity_decode($primary_button['title']) ?></span>
                <span class="btn-img"><img src="<?= get_stylesheet_directory_uri() ?>/img/icon-1.svg" alt=""></span>
              </a>
            </div>
          <?php endif ?>

        </div>

        <?php if ($image_right): ?>
          <figure>

            <?php if (pathinfo($image_right['url'])['extension'] == 'svg'): ?>
              <img src="<?= $image_right['url'] ?>" alt="<?= $image_right['alt'] ?>">
            <?php else: ?>
              <?= wp_get_attachment_image($image_right['ID'], 'full') ?>
            <?php endif ?>

          </figure>
        <?php endif ?>
        
      </div>
    </div>
  </section>

  <?php endif; ?>