<?php

/**
 * @file
 * Theme implementation for bibdk_subject_hierarchy.
 */
?>

<div id="bibdk-subject-hierarchy" class="themes clearfix">
  <div class="container clearfix">
    <div class="clearfix">
      <div class="bibdk-subject-hierarchy-header">
        <?php print $header; ?>
      </div>
      <div class="bibdk-subject-hierarchy-helptext">
        <p class="helptext popover-button" title="<?php print $helptext; ?>">
          <a href="#" tabindex="0">?</a>
        </p>
        <div class="popover element-wrapper linkme-wrapper visuallyhidden">
          <p class="user-msg"><?php print $helptext; ?></p>
          <a class="close icon icon-left icon-red-x" href="#" tabindex="0"> </a>
        </div>
      </div>
      <div class="subject-hierachy-searchfield">
        <?php print drupal_render($searchfield); ?>
      </div>
    </div>
    <div id="bibdk-subject-hierarchy-content">
    <?php foreach ($rows as $row) : ?>
      <?php print $row; ?>
    <?php endforeach; ?>
    </div>
    <div id="bibdk-subject-hierarchy-searchresult">
    </div>
    </div>
</div>