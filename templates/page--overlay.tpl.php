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
    <button type="button" class="btn btn-blue"><?php print t("Close"); ?></button>
  </div>

</div>
<!-- #popup -->

