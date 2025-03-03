<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <?php if (is_array($content) && !empty($content)): ?>

  <?php include __DIR__ . '/../../inc/paddings.php' ?>

  <section class="default-text<?= $class_pt . $class_pb ?>"<?php if($id) echo ' id="' . $id . '"' ?>>
    <div class="container">
      <div class="row">
        <div class="content col-lg-8 col-12 m-auto">

          <?php 
          foreach ($content as $item):

            switch ($item['acf_fc_layout']) {

              case 'summary_block':
              ?>

              <div class="h6<?php if($item['spacing_top'] == 'No padding') echo ' pt-0'; if($item['spacing_bottom'] == 'No padding') echo ' pb-0'; ?>">

                <?= $item['text'] ?>

              </div>

              <?php 
              break;

              case 'text_block':
              ?>

              <div class="<?php if($item['spacing_top'] == 'No padding') echo ' pt-0'; if($item['spacing_bottom'] == 'No padding') echo ' pb-0'; ?>">

                <?= $item['text'] ?>

              </div>

              <?php 
              break;

              case 'quick_links':
              ?>

              <?php if (is_array($item['items']) && checkArrayForValues($item['items'])): ?>
              <div class="<?php if($item['spacing_top'] == 'No padding') echo ' pt-0'; if($item['spacing_bottom'] == 'No padding') echo ' pb-0'; ?>">

                <?php if ($item['title']): ?>
                  <h4><?= $item['title'] ?></h4>
                <?php endif ?>

                <div class="quick-links">

                  <?php foreach ($item['items'] as $item): ?>
                    <?php if ($item['link']): ?>

                      <a href="<?= $item['link']['url'] ?>"<?php if($item['link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($item['link']['title']) ?></a>
                    <?php endif ?>
                  <?php endforeach ?>

                </div>

                <?php if ($button): ?>
                  <div class="btn-wrap">
                    <a href="<?= $button['url'] ?>" class="btn-default btn-arrow"<?php if($button['target']) echo ' target="_blank"' ?>><span class="btn-text"><?= html_entity_decode($button['title']) ?></span></a>
                  </div>
                <?php endif ?>

              </div>
            <?php endif ?>

            <?php 
            break;

            case 'quote_block':
            ?>

            <div class="blockquote<?php if($item['spacing_top'] == 'No padding') echo ' pt-0'; if($item['spacing_bottom'] == 'No padding') echo ' pb-0'; ?>">

              <?php if ($item['quote']): ?>
                <blockquote><?= $item['quote'] ?></blockquote>
              <?php endif ?>

              <?php if ($item['name']): ?>
                <p class="name"><?= $item['name'] ?></p>
              <?php endif ?>

              <?php if ($item['function']): ?>
                <p><?= $item['function'] ?></p>
              <?php endif ?>

            </div>

            <?php 
            break;

            case 'social_share':
            ?>

            <div class="bottom-links d-flex justify-content-between align-items-center flex-wrap<?php if($item['spacing_top'] == 'No padding') echo ' pt-0'; if($item['spacing_bottom'] == 'No padding') echo ' pb-0'; ?>">

              <?php 
              $fields = ['back_to_previous_page_text_ss', 'text_before_icons_ss', 'email_ss', 'items_ss'];
              foreach ($fields as $field) $$field = get_field($field, 'option');
              ?>

              <?php if ($back_to_previous_page_text_ss): ?>
                <div class="left link-wrap">
                  <a href="#" onclick="window.history.back();"><?= $back_to_previous_page_text_ss ?><i class="fa-light fa-arrow-right"></i></a>
                </div>
              <?php endif ?>
              
              <?php if (is_array($items_ss) && checkArrayForValues($items_ss)): ?>
              <div class="right">
                <ul class="soc d-flex align-items-center m-0">

                  <?php if ($text_before_icons_ss): ?>
                    <li><?= $text_before_icons_ss ?></li>
                  <?php endif ?>

                  <?php foreach ($items_ss as $items_2): ?>
                    
                  <?php endforeach ?>

                  <li><a href="#"><i class="fa-regular fa-link"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                </ul>
              </div>
            <?php endif ?>
            
          </div>

          <?php 
          break;

          case 'video_image_block':
          ?>

          <?php if (is_array($item['items']) && checkArrayForValues($item['items'])): ?>
          <div class="<?php if($item['spacing_top'] == 'No padding') echo ' pt-0'; if($item['spacing_bottom'] == 'No padding') echo ' pb-0'; ?>">
            <div class="swiper slider-img">
              <div class="swiper-wrapper">

                <?php foreach ($item['items'] as $item_2): ?>

                  <div class="swiper-slide">

                    <?php if ($item_2['type'] == 'Video' && $item_2['video']): ?>
                      <a data-fancybox="gallery" href="<?= $item_2['video'] ?>&amp;autoplay=1&amp;rel=0&amp;controls=0&amp;showinfo=0" class="video-link">

                        <?php if ($item_2['image']): ?>
                          <picture><source srcset="<?= $item_2['image']['url'] ?>" media="(min-width: 768px)">
                            <?= wp_get_attachment_image($item_2['image']['ID'], 'full') ?>
                          </picture>
                        <?php endif ?>

                        <span class="icon-wrap">
                          <img src="<?= get_stylesheet_directory_uri() ?>/img/play.svg" alt="">

                          <?php if ($item_2['play_button_text']): ?>
                            <span class="text"><?= $item_2['play_button_text'] ?></span>
                          <?php endif ?>

                        </span>
                      </a>
                    <?php endif ?>

                    <?php if ($item_2['type'] == 'Image' && $item_2['image']): ?>
                      <a href="<?= $item_2['image']['url'] ?>" data-fancybox="gallery">
                        <picture><source srcset="<?= $item_2['image']['url'] ?>" media="(min-width: 768px)">
                          <?= wp_get_attachment_image($item_2['image']['ID'], 'full') ?>
                        </picture>
                      </a>
                    <?php endif ?>


                  </div>

                <?php endforeach ?>

              </div>
            </div>

            <?php if (count($item['items']) > 1): ?>
              <div class="bottom-slider">
                <div class="swiper-pagination img-pagination"></div>
                <div class="dots d-flex flex-nowrap">

                  <?php foreach ($item['items'] as $item_2): ?>
                    <div class="dot"></div>
                  <?php endforeach ?>

                </div>
              </div>
            <?php endif ?>

          </div>
        <?php endif ?>

        <?php 
        break;

      }

    endforeach ?>           

  </div>
</div>
</div>
</section>
<?php endif ?>

<?php endif; ?>