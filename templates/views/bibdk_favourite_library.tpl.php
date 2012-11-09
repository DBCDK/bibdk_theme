<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//dpm($variables);
?>

<article class="library favourite_<?php print $branchid;?>">
  <div class="element-section clearfix">
    <div class="actions">
      <?php print $actions; ?>
    </div>
    <hgroup>
      <h3><?php print $branchName; ?></h3>
    </hgroup>
    <div class="toggle-next-section">
      <a href="#" class="show-more">
        <strong><?php print t('bibdk_favourite_more_info'); ?></strong>
      </a>
      <a href="#" class="show-less visuallyhidden">
        <strong><?php print t('bibdk_favourite_less_info'); ?></strong>
      </a>
    </div>
  </div>
  <?php print $moreinfo; ?>
</article>
