<?php if (!empty($messages)): ?>
  <div id="messages">
    <div class="container">
      <div class="row">
          <?php print $messages; ?>
      </div>
    </div>
  </div>
<?php endif; ?>

<section id="columns-wrapper">

  <div class="container">
    <div class="row">
      <div class="span24">

        <div id="columns">
          <?php print render($tabs); ?>
          <?php print render($page['content']); ?>
        </div>
        <!-- #columns -->

      </div>
    </div>
  </div>

</section>
<!-- #columns-wrapper -->