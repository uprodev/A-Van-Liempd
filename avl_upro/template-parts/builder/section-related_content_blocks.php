<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php include __DIR__ . '/../../inc/paddings.php'; ?>

  <?php if (is_array($items) && checkArrayForValues($items)): ?>
  <section class="knowledge-slider-wrap top-bg knowledge-item text-bree<?= $class_pt . $class_pb ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
    <div class="container">
      <div class="row">
        <div class="bg"></div>
        <div class="wrap">

          <?php if ($title): ?>
            <h2><?= $title ?></h2>
          <?php endif ?>

          <?= $text ?>

          <div class="content d-flex flex-wrap" id="ajax_related">

            <?php foreach ($items as $index => $item): ?>
              <?php if ($index < 3): ?>
                <?php get_template_part('parts/content', 'related', ['item' => $item]) ?>
              <?php endif ?>
            <?php endforeach ?>

          </div>

          <?php if (count($items) > 3): ?>
            <div class="link-wrap link-wrap-full" id="more_related">
              <a href="#" data-page_id="<?= get_the_ID() ?>" data-count="<?= count($items) ?>"><?= $load_more_button_text ?><i class="fa-light fa-arrow-right"></i></a>
            </div>
          <?php endif ?>
          
        </div>
      </div>
    </div>
  </section>

<?php endif ?>

<?php include __DIR__ . '/../../inc/red_block.php' ?>

<?php endif; ?>