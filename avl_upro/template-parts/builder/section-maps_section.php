<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="page-banner">

    <?php if ($background_image): ?>
      <div class="bg">
        <picture><source srcset="<?= $background_image['url'] ?>" media="(min-width: 768px)">
          <?= wp_get_attachment_image($background_image['ID'], 'full') ?>
        </div>
      <?php endif ?>

      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="text d-flex flex-column justify-content-end">

            <?php if ($title): ?>
              <h1><?= $title ?></h1>
            <?php endif ?>

            <?= $text ?>

            <?php if ($button): ?>
              <div class="btn-wrap">
                <a href="<?= $button['url'] ?>" class="btn-default btn-arrow"<?php if($button['target']) echo ' target="_blank"' ?>><span class="btn-text"><?= html_entity_decode($button['title']) ?></span></a>
              </div>
            <?php endif ?>

          </div>
        </div>
      </div>
    </section>

    <?php endif; ?>