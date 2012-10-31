<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
//dpm($variables);
//dpm($branch);
?>
<div class="element-section padded visuallyhidden">
  <div class="library-details text clearfix">
    <div class="library-details-column-1">
      <strong><?php print t('bibdk_favourite_address'); ?></strong>
      <br/>
      <?php print $address; ?>
      <br/>
      <strong><?php print t('bibdk_favourite_contact'); ?></strong>
      <br/>
      <?php print $contact; ?>
    </div> <!-- column-1 -->

    <div class="library-details-column-2">
      <address>
        <strong><?php print t('bibdk_favourite_opening_hours'); ?></strong>
        <br/>
        <?php print $openingHours; ?>
        <br/>
        <br/>
        <strong><?php print t('bibdk_favourite_tools'); ?></strong>
        <br/>
        <?php print $tools; ?>
      </address>  
    </div>
  </div>
</div>
