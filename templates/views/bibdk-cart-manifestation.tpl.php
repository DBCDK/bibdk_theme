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
        <h4><?php print $title; ?></h4>
        <h6><?php print $author; ?></h6>
    </div>
</article>
