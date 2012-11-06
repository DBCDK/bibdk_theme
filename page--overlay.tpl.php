<div id="popup">

  <div class="element-wrapper">

    <div class="element">
      <h1 class="padded"><?php print $title; ?></h1>


      <?php if (!empty($messages)): ?>
        <div id="messages">
          <?php print $messages; ?>
        </div>
      <?php endif; ?>

      <?php print render($page['content']); ?>

    </div>

  </div>

</div>
<!-- #popup -->
