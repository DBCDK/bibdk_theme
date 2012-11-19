<div id="popup">

  <div class="element-wrapper">
    <div class="element">

      <?php if (!empty($title)): ?>
        <h1 id="title"><?php print $title; ?></h1>
      <?php endif; ?>

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
