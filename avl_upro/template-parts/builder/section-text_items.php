<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if (is_array($items) && checkArrayForValues($items)): ?>

  <?php include __DIR__ . '/../../inc/paddings.php' ?>

  <section class="text-item-check bg-grey<?= $class_pt . $class_pb ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
    <div class="container">

      <?php if ($title): ?>
        <h3><?= $title ?></h3>
      <?php endif ?>

      <div class="row">

        <?php foreach ($items as $item): ?>
          <div class="item">

            <?php if ($item['icon']): ?>
              <div class="icon-wrap">
                <i class="<?= $item['icon'] ?>"></i>
              </div>
            <?php endif ?>
            
            <?php if ($item['title']): ?>
              <h3><?= $item['title'] ?></h3>
            <?php endif ?>

            <?= $item['text'] ?>

            <?php if ($item['button']): ?>
              <div class="link-wrap">
                <a href="<?= $item['button']['url'] ?>"<?php if($item['button']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($item['button']['title']) ?><i class="fa-light fa-arrow-right"></i></a>
              </div>
            <?php endif ?>

          </div>
        <?php endforeach ?>

      </div>
    </div>
  </section>
<?php endif ?>

<?php endif; ?>