<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php include __DIR__ . '/../../inc/paddings.php' ?>

  <section class="small-text<?= $class_pt . $class_pb ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
    <div class="container">
      <div class="row">
        <div class="content col-lg-8 col-12 m-auto">

          <?php if ($title): ?>
            <h3 class="title"><?= $title ?></h3>
          <?php endif ?>
          
          <?= $text ?>

        </div>
      </div>
    </div>
  </section>

  <?php endif; ?>