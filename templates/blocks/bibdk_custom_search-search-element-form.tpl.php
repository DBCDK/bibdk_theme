<?php
/**
 * @file
 * Theme implementation for bib.dk custom search elements.
 */
?>
<div class='fieldset-legend'><?php print $title; ?></div>
<div class="fieldset-description"><?php print $description;?></div>
<p class="helptext popover-button" title="<?php print $help; ?>">?</p>
<div class="popover element-wrapper linkme-wrapper visuallyhidden">
  <p class="user-msg">
    <?php print $help; ?>
  </p>
  <p class="close icon icon-left icon-red-x"> </p>
</div>
<div class="bibdk-custom-search-element clearfix">
  <?php print drupal_render_children($form); ?>
</div>
