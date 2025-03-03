<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php 
  $is_select = $select_or_custom == 'Select' && $select;
  $is_custom = $select_or_custom == 'Custom' &&  is_array($custom) && checkArrayForValues($custom);
  $items = $is_select ? $select : $custom;
  ?>

  <?php if ($is_select || $is_custom): ?>

    <?php include __DIR__ . '/../../inc/paddings.php' ?>
    
    <section class="slider-bg-wrap text-bree<?= $class_pt . $class_pb ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
      <div class="swiper slider-bg">
        <div class="swiper-wrapper">

          <?php foreach ($items as $item): ?>
            <div class="swiper-slide">

              <?php 
              $background_image_id = $is_select ? get_post_thumbnail_id($item->ID) : $item['background_image']['ID'];
              $background_image_url = $is_select ? get_the_post_thumbnail_url($item->ID, 'full') : $item['background_image']['url'];
              ?>

              <?php if ($background_image_id): ?>
                <div class="bg">
                  <picture><source srcset="<?= $background_image_url ?>" media="(min-width: 768px)">
                    <?= wp_get_attachment_image($background_image_id, 'full') ?>
                  </picture>
                </div>
              <?php endif ?>
              
              <div class="container">
                <div class="row">
                  <div class="content d-flex">
                    <div class="wrap d-flex flex-wrap">

                      <?php if ($logo = $is_select ? get_field('logo', $item->ID) : $item['logo']): ?>
                        <div class="logo">
                          <?= wp_get_attachment_image($logo['ID'], 'full') ?>
                        </div>
                      <?php endif ?>
                      
                      <div class="text">

                        <?php if ($title = $is_select ? get_the_title($item->ID) : $item['title']): ?>
                          <h2><?= $title ?></h2>
                        <?php endif ?>

                        <ul class="link-wrap link-wrap-white d-flex flex-wrap">

                          <?php 
                          $link_url = $is_select ? get_the_permalink($item->ID) : $item['link']['url'];
                          $link_title = $is_select ? __('Lees verder', 'AVL') : $item['link']['title'];
                          $link_target = $is_select ? '' : $item['link']['target'];
                          ?>

                          <?php if ($link_url): ?>
                            <li>
                              <a href="<?= $link_url ?>"<?php if($link_target) echo ' target="_blank"' ?>><?= $link_title ?><i class="fa-light fa-arrow-right"></i></a>
                            </li>
                          <?php endif ?>

                          <?php if ($next_slide_text): ?>
                            <li class="next-btn"><a href="#"><?= $next_slide_text ?><i class="fa-light fa-arrow-right"></i></a></li>
                          <?php endif ?>
                          
                        </ul>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>

        </div>
      </div>
      <div class="container bottom-pagination">
        <div class="row d-flex flex-nowrap">
          <div class="swiper-pagination bg-pagination"></div>
          <div class="dots d-flex flex-nowrap">

            <?php foreach ($items as $item): ?>
              <div class="dot"></div>
            <?php endforeach ?>
            
          </div>
        </div>
      </div>
    </section>
  <?php endif ?>

  <?php endif; ?>