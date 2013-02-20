<article class="clearfix cart-item-id-<?php print $pid; ?>" xmlns="http://www.w3.org/1999/html">
    <div class="manifestation-data text">
      <?php if (!empty($title)) : ?>
        <h6><?php print $title; ?>
            <span class="italic normal"> - <?php print $type; ?> <?php print $several_editions; ?></span>
        </h6>
      <?php endif; ?>

      <?php if (!empty($author)) : ?>
        <p><?php print $author; ?></p>
      <?php endif; ?>
    </div>
</article>
