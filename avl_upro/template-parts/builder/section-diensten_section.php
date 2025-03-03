<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php include __DIR__ . '/../../inc/paddings.php' ?>

  <section class="services<?= $class_pt . $class_pb ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
    <div class="bg">
      <div class="top"></div>
      <div class="bottom">
        <img src="<?= get_stylesheet_directory_uri() ?>/img/bg-2.jpg" alt="">
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-between">
        <div class="title">

          <?php if ($title): ?>
            <h2><?= $title ?></h2>
          <?php endif ?>
          
          <?php if ($image): ?>
            <figure>
              <?= wp_get_attachment_image($image['ID'], 'full') ?>
            </figure>
          <?php endif ?>
          
        </div>
        <div class="text">

          <?php if (is_array($items) && checkArrayForValues($items)): ?>
          <ul class="accordion-ul">

            <?php foreach ($items as $index => $item): ?>
              <li class="accordion-item<?php if($index == 0) echo ' is-active' ?>">
                <div class="accordion-thumb">
                  <h3><?= $item['title'] ?></h3>
                </div>
                <div class="accordion-panel">
                  <div class="wrap">

                    <?= $item['text'] ?>

                    <?php if ($item['link']): ?>
                      <div class="link-wrap link-wrap-white">
                        <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($item['link']['title']) ?><i class="fa-light fa-arrow-right"></i></a>
                      </div>
                    <?php endif ?>

                  </div>
                </div>
              </li>
            <?php endforeach ?>
            
          </ul>
        <?php endif ?>


        <?php if ($link): ?>
          <div class="btn-wrap">
            <a href="<?= $link['link']['url'] ?>" class="btn-default btn-arrow"<?php if($link['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($link['link']['title']) ?><i class="fa-light fa-arrow-right"></i></a>
          </div>
        <?php endif ?>

      </div>

      <?php if ($image): ?>
        <figure>
          <picture><source srcset="<?= $image['url'] ?>" media="(min-width: 768px)">
            <?= wp_get_attachment_image($image['ID'], 'full') ?>
          </picture>
        </figure>
      <?php endif ?>

    </div>
  </div>
</section>

<?php endif; ?>