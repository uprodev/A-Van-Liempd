<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php include __DIR__ . '/../../inc/paddings.php' ?>

  <section class="text-two<?php if($background_color == 'Grey') echo ' bg-grey'; if($columns == '1') echo ' column-1'; ?><?= $class_pt . $class_pb ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-12 mx-auto">

          <?php if ($title): ?>
            <h3><?= $title ?></h3>
          <?php endif ?>

          <?php if ($description): ?>
            <div class="content "><?= $description ?></div>
          <?php endif ?>

          <?php if ($button): ?>
            <div class="link-wrap link-wrap-full">
              <a href="<?= $button['url'] ?>"<?php if($button['target']) echo ' target="_blank"' ?>><?= html_entity_decode($button['title']) ?><i class="fa-light fa-arrow-right"></i></a>
            </div>
          <?php endif ?>

        </div>
      </div>
    </div>
  </section>

  <?php endif; ?>