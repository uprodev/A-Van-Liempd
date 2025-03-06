<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="block-404 align-items-center d-flex">
    <div class="container">
      <div class="row ">
        <div class="content text-center">

          <?php if ($subtitle): ?>
            <p class="label"><?= $subtitle ?></p>
          <?php endif ?>

          <?php if ($title): ?>
            <h1><?= $title ?></h1>
          <?php endif ?>

          <?= $text ?>

          <?php if ($link): ?>
            <div class="btn-wrap d-flex justify-content-center">
              <a href="<?= $link['url'] ?>" class="btn-default btn-arrow"<?php if($link['target']) echo ' target="_blank"' ?>><span class="btn-text"><?= html_entity_decode($link['title']) ?><i class="fa-light fa-arrow-right"></i></span></a>
            </div>
          <?php endif ?>

        </div>
      </div>
    </div>
  </section>

  <?php endif; ?>