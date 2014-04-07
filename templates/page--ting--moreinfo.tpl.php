<header id="header">
  <div class="logo"><?php print render($logo_header); ?></div>
</header>

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
