<div id="popup">

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

  <div id="popup-button-close" class="btn-wrapper">
    <button
        type="button"
        title="<?php print t('label_close_popup', array(), array('context' => 'bibdk_popup')); ?>"
        class="btn btn-blue">
            <?php print t('label_close_popup', array(), array('context' => 'bibdk_popup')); ?>
    </button>
  </div>

</div>
<!-- #popup -->

