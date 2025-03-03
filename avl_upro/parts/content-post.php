<?php $post_type = get_post_type($args['post_id']) ?>

<?php 
$background_image_id = $args['is_custom'] ? $args['item']['image']['ID'] : get_post_thumbnail_id($args['post_id']);
$background_image_url = $args['is_custom'] ? $args['item']['image']['url'] : get_the_post_thumbnail_url($args['post_id'], 'full');
?>

<?php if ($background_image_id): ?>
  <figure>
    <picture><source srcset="<?= $background_image_url ?>" media="(min-width: 768px)">
      <?= wp_get_attachment_image($background_image_id, 'full') ?>
    </picture>
  </figure>
<?php endif ?>

<div class="text">

  <?php if ($subtitle = $args['is_custom'] ? $args['item']['subtitle'] : (($terms = wp_get_object_terms($args['post_id'], $post_type . '_cat')) ? $terms[0]->name : '')): ?>
    <h6 class="label"><?= $subtitle ?></h6>
  <?php endif ?>

  <?php if ($title = $args['is_custom'] ? $args['item']['title'] : get_the_title($args['post_id'])): ?>
    <h3 class="title"><?= $title ?></h3>
  <?php endif ?>

  <?php 
  $link_url = $args['is_custom'] ? $args['item']['link']['url'] : get_the_permalink($args['post_id']);
  $link_title = $args['is_custom'] ? $args['item']['link']['title'] : __('Verder lezen', 'AVL');
  $link_target = $args['is_custom'] ? $args['item']['link']['target'] : '';
  ?>

  <?php if ($link_url): ?>
    <div class="link-wrap link-wrap-white">
      <a href="<?= $link_url ?>"<?php if($link_target) echo ' target="_blank"' ?>><?= $link_title ?><i class="fa-light fa-arrow-right"></i></a>
    </div>
  <?php endif ?>

</div>