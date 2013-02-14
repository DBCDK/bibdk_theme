<article
        class="element-section manifestation clearfix cart-item-id-<?php print $pid; ?>">
    <div class="actions">

        <div class="primary-actions">
            <div class="btn-wrapper">
              <?php print drupal_render($fields['bibdk_mani_reservation_button']); ?>
            </div>
        </div>
        <div class="secondary-actions">
            <ul>
              <?php print $cart_btn; ?>
            </ul>
        </div>
    </div>
    <!-- .actions -->
    <div class="manifestation-data text">
      <?php if (!empty($title)) : ?>
        <h4><?php print $title; ?></h4>
      <?php endif; ?>

      <?php if (!empty($author)) : ?>
        <h6><?php print $author; ?></h6>
      <?php endif; ?>

      <?php if (!empty($several_editions)) : ?>
        <h6><?php print $several_editions; ?></h6>
      <?php endif; ?>
    </div>
</article>
