<?php
if ( !empty($page['content']['user_alert_user_alert']) ) {
  unset($page['content']['user_alert_user_alert']);
}
?>
<div id="moreinfo">

  <div class="element-wrapper">
    <div class="element">

      <?php if (!empty($messages)): ?>
        <div id="messages">
          <?php print $messages; ?>
        </div>
      <?php endif; ?>

      <?php print render($page['content']); ?>

    </div>
  </div>

</div>
<!-- #moreinfo -->
