<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//dpm($variables);
?>
<div class="element-wrapper">
  <div class="element">
    <div class="element-section padded">
      <div class="actions">
        <?php print $actions; ?>
      </div>
      <hgroup>
        <h3><?php print $branchName; ?></h3>
      </hgroup>
      <div class="toggle-next-section">
        <a href="#">
          <strong><?php print t('bibdk_favourite_more_info'); ?></strong>
        </a>
      </div>
    </div>
    <?php print $moreinfo; ?>
  </div>
</div>
