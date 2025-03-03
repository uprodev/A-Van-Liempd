<div class="item">

  <?php if ($args['item']['image']): ?>
    <figure>
      <picture><source srcset="<?= $args['item']['image']['url'] ?>" media="(min-width: 768px)">
        <?= wp_get_attachment_image($args['item']['image']['ID'], 'full') ?>
      </picture>
    </figure>
  <?php endif ?>

  <div class="text">

    <?php if ($args['item']['subtitle']): ?>
      <h6 class="label"><?= $args['item']['subtitle'] ?></h6>
    <?php endif ?>

    <?php if ($args['item']['title']): ?>
      <h3 class="title"><?= $args['item']['title'] ?></h3>
    <?php endif ?>

    <?php if ($args['item']['link']): ?>
      <div class="link-wrap link-wrap-white">
        <a href="<?= $args['item']['link']['url'] ?>"<?php if($args['item']['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($args['item']['link']['title']) ?><i class="fa-light fa-arrow-right"></i></a>
      </div>
    <?php endif ?>

  </div>
</div>