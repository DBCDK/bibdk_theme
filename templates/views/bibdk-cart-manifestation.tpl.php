<article class="clearfix cart-item-id-<?php print $pid; ?>">
  <div class="manifestation-data text">

    <?php if (!empty($fields['bibdk_mani_title_specific'])) : ?>
      <h6>
        <?php print $fields['bibdk_mani_title_specific'][0]['#markup']; ?>
        <span class="italic normal"> - <?php print $type_translated['type']; ?> <?php print $several_editions; ?></span>
      </h6>

      <?php hide($fields['bibdk_manbibdk_mani_title_specifici_title']); ?>
      <?php hide($fields['bibdk_mani_title_specific']); ?>
    <?php endif; ?>
    <?php print drupal_render($fields); ?>
  </div>
</article>
