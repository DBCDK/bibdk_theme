<?php if (!empty($messages)): ?>
  <div id="messages">
    <div class="container">
      <div class="row">
          <?php print $messages; ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if (!empty($page['content'])): ?>        
  <?php print render($page['content']); ?>
<?php endif; ?>