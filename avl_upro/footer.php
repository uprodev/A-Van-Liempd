</main>

<?php 
$is_red_block = false;
$sections = get_field('content');
if (is_array($sections) && !empty($sections)) {
  foreach ($sections as $index => $section) {
    if(($index == count($sections) - 1) && $section['is_red_block']) $is_red_block = true;
  }
}
?>

<footer<?php if(!$is_red_block) echo ' class="pt-50"' ?>>
  <div class="bg"></div>
  <div class="container">
    <div class="row">
      <div class="content d-flex flex-wrap justify-content-between">

        <?php if (($field = get_field('column_1_f', 'option')) && is_array($field) && checkArrayForValues($field)): ?>
        <div class="left">

          <?php if ($field['logo']): ?>
            <div class="logo-wrap">
              <a href="<?= get_home_url() ?>">

                <?php if (pathinfo($field['logo']['url'])['extension'] == 'svg'): ?>
                  <img src="<?= $field['logo']['url'] ?>" alt="<?= $field['logo']['alt'] ?>">
                <?php else: ?>
                  <?= wp_get_attachment_image($field['logo']['ID'], 'full') ?>
                <?php endif ?>

              </a>
            </div>
          <?php endif ?>
          
          <?php if ($field['address']): ?>
            <div class="text"><?= $field['address'] ?></div>
          <?php endif ?>
          
          <?php if (is_array($field['links']) && checkArrayForValues($field['links'])): ?>
          <div class="address">

            <?php foreach ($field['links'] as $item): ?>
              <?php if ($item['link']): ?>
                <p>
                  <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>

                    <?php if ($item['icon']): ?>
                      <i class="<?= $item['icon'] ?>"></i>
                    <?php endif ?>
                    
                    <?= html_entity_decode($item['link']['title']) ?>
                  </a>
                </p>
              <?php endif ?>
            <?php endforeach ?>
            
          </div>
        <?php endif ?>

        <?php if (is_array($field['social_links']) && checkArrayForValues($field['social_links'])): ?>
        <ul class="soc d-flex align-items-center">

          <?php if ($field['text_before_socials']): ?>
            <li><?= $field['text_before_socials'] ?></li>
          <?php endif ?>

          <?php foreach ($field['social_links'] as $item): ?>
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

    </div>
  <?php endif ?>

  <?php if (($items = get_field('main_columns_f', 'option')) && is_array($items) && checkArrayForValues($items)): ?>
  <div class="right d-flex flex-wrap">

    <?php foreach ($items as $item): ?>
      <?php if (is_array($item['links']) && checkArrayForValues($item['links'])): ?>
      <div class="item">

        <?php if ($item['title']): ?>
          <h6><?= $item['title'] ?><span></span></h6>
        <?php endif ?>

        <ul>

          <?php foreach ($item['links'] as $item_2): ?>
            <?php if ($item_2['link']): ?>
              <li>
                <a href="<?= $item_2['link']['url'] ?>"<?php if($item_2['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($item_2['link']['title']) ?></a>
              </li>
            <?php endif ?>
          <?php endforeach ?>

        </ul>
      </div>
    <?php endif ?>
  <?php endforeach ?>

</div>
<?php endif ?>

<div class="bottom d-flex flex-wrap justify-content-between">
  <div class="bottom-left">
    <p><?= date('Y') ?> <?= get_field('footer_bottom_bar_f', 'option')['text'] ?></p>
  </div>
  <div class="bottom-right d-flex justify-content-end align-items-center">

    <?php if (($items = get_field('footer_bottom_bar_f', 'option')['links']) && is_array($items) && checkArrayForValues($items)): ?>
    <ul class="d-flex flex-wrap">

      <?php foreach ($items as $item): ?>
        <?php if ($item['link']): ?>
          <li>
            <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($item['link']['title']) ?></a>
          </li>
        <?php endif ?>
      <?php endforeach ?>

    </ul>
  <?php endif ?>

  <p><?php _e('Website door', 'AVL') ?> <a href="#"><?php _e('The DISTRIKT', 'AVL') ?></a></p>
</div>
</div>
</div>
</div>
</div>
</footer>

<?php if (!isset($_COOKIE['is_popup_closed'])): ?>
  <div class="fix-block">
    <a href="#" class="close-fix"><i class="fal fa-times-circle"></i></a>
    <div class="fix-content">

      <?php if ($field = get_field('image_cp', 'option')): ?>
        <figure>
          <?= wp_get_attachment_image($field['ID'], 'full', false, array('class' => 'bg-img')) ?>
        </figure>
      <?php endif ?>
      
      <div class="text">

        <?php if ($field = get_field('title_cp', 'option')): ?>
          <p><?= $field ?></p>
        <?php endif ?>

        <?php if ($field = get_field('link_cp', 'option')): ?>
          <div class="btn-wrap">
            <a href="<?= $field['url'] ?>"<?php if($field['target']) echo ' target="_blank"' ?>><?= html_entity_decode($field['title']) ?> <i class="fa-light fa-arrow-right"></i></a>
          </div>
        <?php endif ?>

      </div>
    </div>
  </div>
<?php endif ?>

<?php wp_footer() ?>
</body>
</html>