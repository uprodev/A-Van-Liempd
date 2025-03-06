<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="vacancies-form-wrap">
    <div class="container">
      <div class="row">
        <?php 
        $fields = ['title', 'image', 'name', 'function', 'content_right'];
        foreach ($fields as $field) {
          $$field = $red_block['contact_info'] == 'Default' ? get_field($field . '_ci2', 'option') : $red_block['custom'][$field];
        }
        ?>

        <?php if ($is_red_block_): ?>
          <div class="red-block">
            <div class="content">
              <div class="bg">
                <img src="<?= get_stylesheet_directory_uri() ?>/img/bg-3.png" alt="">
              </div>
              <div class="wrap d-flex flex-wrap justify-content-between">
                <div class="title">

                  <?php if ($title): ?>
                    <h2><?= $title ?></h2>
                  <?php endif ?>

                  <div class="user d-flex align-items-center">

                    <?php if ($image): ?>
                      <figure>
                        <?= wp_get_attachment_image($image['ID'], 'full') ?>
                      </figure>
                    <?php endif ?>

                    <div class="user-text">

                      <?php if ($name): ?>
                        <p class="name"><?= $name ?></p>
                      <?php endif ?>

                      <?php if ($function): ?>
                        <p><?= $function ?></p>
                      <?php endif ?>

                    </div>
                  </div>
                </div>

                <?php if (!empty($content_right) && checkArrayForValues($content_right)): ?>
                <div class="right">

                  <?php if ($content_right['title']): ?>
                    <h3><?= $content_right['title'] ?></h3>
                  <?php endif ?>
                  
                  <?= $content_right['text'] ?>

                </div>
              <?php endif ?>

            </div>
          </div>
        </div>
      <?php endif ?>

      <?php if (!empty($grey_block) && checkArrayForValues($grey_block)): ?>
      <div class="black-block">
        <div class="bg-black"></div>
        <div class="black-content d-flex justify-content-between flex-wrap">
          <div class="left-black">

            <?php if ($grey_block['title']): ?>
              <h2><?= $grey_block['title'] ?></h2>
            <?php endif ?>
            
            <?= $grey_block['text'] ?>

            <div class="user-black d-flex align-items-center">

              <?php if ($grey_block['image']): ?>
                <figure>
                  <?= wp_get_attachment_image($grey_block['image']['ID'], 'full') ?>
                </figure>
              <?php endif ?>

              <div class="text">

                <?php if (!empty($grey_block['contact_info']) && checkArrayForValues($grey_block['contact_info'])): ?>
                <ul>

                  <?php foreach ($grey_block['contact_info'] as $item): ?>
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

              <?php if ($grey_block['text_link']): ?>
                <p>
                  <a href="<?= $grey_block['text_link']['url'] ?>"<?php if($grey_block['text_link']['target']) echo ' target="_blank"' ?>><?= html_entity_decode($grey_block['text_link']['title']) ?><i class="fa-light fa-arrow-right"></i></a>
                </p>
              <?php endif ?>
              
            </div>
          </div>
        </div>

        <?php if ($grey_block['contact_form']): ?>
          <div class="right-black">
            <?= do_shortcode('[contact-form-7 id="' . $grey_block['contact_form'] . '" html_class="form-default"]') ?>
          </div>
        <?php endif ?>
        
      </div>
    </div>
  <?php endif ?>

</div>
</div>
</section>

<?php endif; ?>