<article class="clearfix cart-item-id-<?php print $pid; ?>">
  <div class="manifestation-data text">

    <?php if (!empty($fields['bibdk_mani_title'])) : ?>
      <h6>
        <?php print $fields['bibdk_mani_title'][0]['#markup']; ?>
        <span class="italic normal"> - <?php print $type_translated; ?> <?php print $several_editions; ?></span>
      </h6>

      <?php hide($fields['bibdk_mani_title']); ?>
      <?php hide($fields['bibdk_mani_type']); ?>
    <?php endif; ?>
    <?php print drupal_render($fields); ?>
  </div>
</article>
