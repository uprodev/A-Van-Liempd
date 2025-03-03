<!doctype html>
<html <?php language_attributes() ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header>
    <div class="top-line">
      <div class="container">
        <div class="row justify-content-between">
          <nav class="top-menu d-flex justify-content-between align-items-center">

            <?php if (($items = get_field('left_menu_h', 'option')) && is_array($items) && checkArrayForValues($items)): ?>
            <div class="left d-flex ">
              <ul class="d-flex align-items-center menu">

                <?php foreach ($items as $item): ?>
                  <?php if ($item['link']): ?>

                    <?php $is_submenu = is_array($item['submenu']) && checkArrayForValues($item['submenu']) ?>

                    <li<?php if($is_submenu) echo ' class="sub-menu-item"' ?>>
                      <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($item['link']['title']) ?></a>

                      <?php if ($is_submenu): ?>
                        <ul class="sub-menu">

                          <?php foreach ($item['submenu'] as $item_2): ?>
                            <?php if ($item_2['link']): ?>
                              <li>
                                <a href="<?= $item_2['link']['url'] ?>"<?php if($item_2['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($item_2['link']['title']) ?></a>
                              </li>
                            <?php endif ?>
                          <?php endforeach ?>

                        </ul>
                      <?php endif ?>

                    </li>
                  <?php endif ?>
                <?php endforeach ?>

              </ul>
            </div>
          <?php endif ?>

          <?php 
          $logo_1 = get_field('logo_1_h', 'option');
          $logo_2 = get_field('logo_2_h', 'option');
          ?>

          <?php if ($logo_1 || $logo_2): ?>
            <div class="logo-wrap ">
              <a href="<?= get_home_url() ?>">

                <?php if ($logo_1): ?>
                  <?php if (pathinfo($logo_1['url'])['extension'] == 'svg'): ?>
                    <img src="<?= $logo_1['url'] ?>" alt="<?= $logo_1['alt'] ?>">
                  <?php else: ?>
                    <?= wp_get_attachment_image($logo_1['ID'], 'full') ?>
                  <?php endif ?>
                <?php endif ?>

                <?php if ($logo_2): ?>
                  <span>
                    <?php if (pathinfo($logo_2['url'])['extension'] == 'svg'): ?>
                      <img src="<?= $logo_2['url'] ?>" alt="<?= $logo_2['alt'] ?>">
                    <?php else: ?>
                      <?= wp_get_attachment_image($logo_2['ID'], 'full') ?>
                    <?php endif ?>
                  </span>
                <?php endif ?>

              </a>
            </div>
          <?php endif ?>

          <div class="right d-flex justify-content-end">

            <?php if (($items = get_field('right_menu_h', 'option')) && is_array($items) && checkArrayForValues($items)): ?>
            <ul class="d-flex align-items-center menu menu-2">

              <?php foreach ($items as $index => $item): ?>
                <?php if ($item['link']): ?>

                  <?php $is_submenu = is_array($item['submenu']) && checkArrayForValues($item['submenu']) ?>

                  <li<?php if($is_submenu) echo ' class="sub-menu-item"' ?>>
                    <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>>
                      <?= html_entity_decode($item['link']['title']) ?>

                      <?php if ($index == count($items) - 1): ?>
                        <i class="fa-light fa-arrow-right"></i>
                      <?php endif ?>

                    </a>

                    <?php if ($is_submenu): ?>
                      <ul class="sub-menu">

                        <?php foreach ($item['submenu'] as $item_2): ?>
                          <?php if ($item_2['link']): ?>
                            <li>
                              <a href="<?= $item_2['link']['url'] ?>"<?php if($item_2['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($item_2['link']['title']) ?></a>
                            </li>
                          <?php endif ?>
                        <?php endforeach ?>

                      </ul>
                    <?php endif ?>

                  </li>
                <?php endif ?>
              <?php endforeach ?>

            </ul>
          <?php endif ?>

          <div class="open-menu d-flex justify-content-end d-xl-none">
            <a href="#">
              <span></span>
              <span></span>
              <span></span>
            </a>
          </div>
        </div>
      </nav>

    </div>
  </div>
</div>
</header>

<div class="menu-responsive" id="menu-responsive" style="display: none">
  <div class="top">
    <div class="close-menu">
      <a href="#"><i class="fal fa-times"></i></a>
    </div>
  </div>
  <div class="wrap">

    <?php if ($logo_1): ?>
      <div class="logo-wrap ">
        <a href="<?= get_home_url() ?>">

          <?php if (pathinfo($logo_1['url'])['extension'] == 'svg'): ?>
            <img src="<?= $logo_1['url'] ?>" alt="<?= $logo_1['alt'] ?>">
          <?php else: ?>
            <?= wp_get_attachment_image($logo_1['ID'], 'full') ?>
          <?php endif ?>

        </a>
      </div>
    <?php endif ?>

    <nav class="mob-menu-wrap">
      <ul class="mob-menu p-0">

        <?php if (($items = get_field('left_menu_h', 'option')) && is_array($items) && checkArrayForValues($items)): ?>

        <?php foreach ($items as $item): ?>
          <?php if ($item['link']): ?>

            <?php $is_submenu = is_array($item['submenu']) && checkArrayForValues($item['submenu']) ?>

            <li<?php if($is_submenu) echo ' class="menu-item-has-children"' ?>>
              <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($item['link']['title']) ?></a>

              <?php if ($is_submenu): ?>
                <i class="fa-solid fa-chevron-down"></i>
                <ul class="sub-menu">

                  <?php foreach ($item['submenu'] as $item_2): ?>
                    <?php if ($item_2['link']): ?>
                      <li>
                        <a href="<?= $item_2['link']['url'] ?>"<?php if($item_2['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($item_2['link']['title']) ?></a>
                      </li>
                    <?php endif ?>
                  <?php endforeach ?>

                </ul>
              <?php endif ?>

            </li>
          <?php endif ?>
        <?php endforeach ?>

      <?php endif ?>

      <?php if (($items = get_field('right_menu_h', 'option')) && is_array($items) && checkArrayForValues($items)): ?>

      <?php foreach ($items as $item): ?>
        <?php if ($item['link']): ?>

          <?php $is_submenu = is_array($item['submenu']) && checkArrayForValues($item['submenu']) ?>

          <li<?php if($is_submenu) echo ' class="menu-item-has-children"' ?>>
            <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($item['link']['title']) ?></a>

            <?php if ($is_submenu): ?>
              <i class="fa-solid fa-chevron-down"></i>
              <ul class="sub-menu">

                <?php foreach ($item['submenu'] as $item_2): ?>
                  <?php if ($item_2['link']): ?>
                    <li>
                      <a href="<?= $item_2['link']['url'] ?>"<?php if($item_2['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($item_2['link']['title']) ?></a>
                    </li>
                  <?php endif ?>
                <?php endforeach ?>

              </ul>
            <?php endif ?>

          </li>
        <?php endif ?>
      <?php endforeach ?>

    <?php endif ?>


  </ul>

  <?php 
  $button_1 = get_field('button_1_h', 'option');
  $button_2 = get_field('button_2_h', 'option');
  ?>

  <?php if ($button_1 || $button_2): ?>
    <div class="btn-wrap ">

      <?php if ($button_1): ?>
        <a href="<?= $button_1['url'] ?>" class="btn-default btn-border btn-border-dark"<?php if($button_1['target']) echo ' target="_blank"' ?>><?= html_entity_decode($button_1['title']) ?></a>
      <?php endif ?>

      <?php if ($button_2): ?>
        <a href="<?= $button_2['url'] ?>" class="btn-default"<?php if($button_2['target']) echo ' target="_blank"' ?>><?= html_entity_decode($button_2['title']) ?></a>
      <?php endif ?>

    </div>
  <?php endif ?>
  
</nav>
</div>
</div>

<main>