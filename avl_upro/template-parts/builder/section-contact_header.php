<?php 
if($args['row']):
	foreach($args['row'] as $key=>$arg) $$key = $arg; ?>

  <section class="contact-banner" >

    <?php if ($image): ?>
      <div class="bg">
        <?= wp_get_attachment_image($image['ID'], 'full') ?>
      </div>
    <?php endif ?>

    <div class="container">
      <div class="row">

        <div class="content-contact d-flex justify-content-between flex-wrap p-0">
          <div class="text col-12 col-lg-6">

            <?php if ($title): ?>
              <h1><?= $title ?></h1>
            <?php endif ?>

            <?php if ($subtitle): ?>
              <h6 class="sub-title"><?= $subtitle ?></h6>
            <?php endif ?>

            <?= $text ?>

            <div class="d-flex justify-content-between flex-wrap wrap-item">

              <?php if (is_array($contact_info) && checkArrayForValues($contact_info)): ?>
              <div class="item item-1">
                <ul>

                  <?php foreach ($contact_info as $item): ?>
                    <li>
                      <?= $item['left'] ?>
                      <?= $item['right'] ?>
                    </li>
                  <?php endforeach ?>

                </ul>
              </div>
            <?php endif ?>


            <?php if (is_array($column_groups) && checkArrayForValues($column_groups)): ?>
            <?php foreach ($column_groups as $index => $item): ?>
              <div class="item item-<?= $index + 2 ?>">

                <?php if ($item['title']): ?>
                  <h6><?= $item['title'] ?></h6>
                <?php endif ?>

                <?php if (is_array($item['info']) && checkArrayForValues($item['info'])): ?>
                <ul>

                  <?php foreach ($item['info'] as $item_2): ?>
                    <li>
                      <?= $item_2['left'] ?>
                      <?= $item_2['right'] ?>
                    </li>
                  <?php endforeach ?>

                  <?php if ($item['last_item']): ?>
                    <li>
                      <?= add_class_content($item['last_item'], 'full') ?>
                    </li>
                  <?php endif ?>

                </ul>
              <?php endif ?>
              
            </div>
          <?php endforeach ?>
        <?php endif ?>

      </div>
    </div>

    <?php if ($contact_form): ?>
      <div class="form-wrap col-12 col-lg-6 d-flex justify-content-lg-end justify-content-center">
        <?= do_shortcode('[contact-form-7 id="' . $contact_form . '" html_class="form-default"]') ?>
      </div>
    <?php endif ?>
    
  </div>
</div>
</div>
</section>

<?php endif; ?>