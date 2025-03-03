<?php 
$fields = ['title', 'image', 'links', 'link'];
foreach ($fields as $field) {
  $$field = $red_block['contact_info'] == 'Default' ? get_field($field . '_ci', 'option') : $red_block['custom'][$field];
}
?>

<?php if ($is_red_block): ?>
  <section class="red-block">
    <div class="container">
      <div class="row">
        <div class="content">
          <div class="bg">
            <img src="<?= get_stylesheet_directory_uri() ?>/img/bg-3.png" alt="">
          </div>
          <div class="wrap d-flex flex-wrap justify-content-between">

            <?php if ($title): ?>
              <div class="title">
                <h2><?= $title ?></h2>
              </div>
            <?php endif ?>
            
            <div class="right d-flex flex-wrap justify-content-between align-items-center">

              <?php if ($image): ?>
                <figure>
                  <?= wp_get_attachment_image($image['ID'], 'full') ?>
                </figure>
              <?php endif ?>

              <div class="text">

                <?php if (is_array($links) && checkArrayForValues($links)): ?>
                <ul>

                  <?php foreach ($links as $item): ?>
                    <?php if ($item['link']): ?>
                      <li>
                        <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>

                          <?php if ($item['icon']): ?>
                            <i class="<?= $item['icon'] ?>"></i>
                          <?php endif ?>

                          <?= html_entity_decode($item['link']['title']) ?>
                        </a>
                      </li>
                    <?php endif ?>
                  <?php endforeach ?>

                </ul>
              <?php endif ?>

              <?php if ($link): ?>
                <p>
                  <a href="<?= $link['url'] ?>"<?php if($link['target']) echo ' target="_blank"' ?>><?= html_entity_decode($link['title']) ?><i class="fa-light fa-arrow-right"></i></a>
                </p>
              <?php endif ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif ?>