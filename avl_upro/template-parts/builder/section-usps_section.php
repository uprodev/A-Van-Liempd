<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if (is_array($items) && checkArrayForValues($items)): ?>

  <?php include __DIR__ . '/../../inc/paddings.php' ?>

  <section class="usps<?= $class_pt . $class_pb ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
    <div class="container">
      <div class="row justify-content-center align-items-center">

        <?php foreach ($items as $item): ?>
          <div class="item">

            <?php 
            $is_icon = $item['icon_type'] = 'Icon' && $item['icon'];
            $is_image = $item['icon_type'] = 'Image' && $item['image'];
            ?>

            <?php if ($is_icon || $is_image): ?>
              <figure>

                <?php if ($is_icon): ?>
                  <i class="<?= $item['icon'] ?>"></i>
                <?php endif ?>

                <?php if ($is_image): ?>
                  <?php if (pathinfo($item['image']['url'])['extension'] == 'svg'): ?>
                    <img src="<?= $item['image']['url'] ?>" alt="<?= $item['image']['alt'] ?>">
                  <?php else: ?>
                    <?= wp_get_attachment_image($item['image']['ID'], 'full') ?>
                  <?php endif ?>
                <?php endif ?>

              </figure>
            <?php endif ?>
            
            <?php if ($item['title']): ?>
              <h6><?= $item['title'] ?></h6>
            <?php endif ?>
            
            <?php if ($item['link']): ?>
              <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($item['link']['title']) ?><i class="fa-light fa-arrow-right"></i></a>
            <?php endif ?>
            

          </div>
        <?php endforeach ?>

      </div>
    </div>
  </section>
<?php endif ?>

<?php endif; ?>