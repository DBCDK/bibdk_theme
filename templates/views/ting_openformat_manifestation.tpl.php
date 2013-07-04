<article class="manifestation clearfix">
  <div class="actions">
    <div class="primary-actions">
      <?php print drupal_render($actions); ?>
    </div>
    <div class="secondary-actions">
      <ul>
        <?php print drupal_render($secondary_actions); ?>
      </ul>
    </div>
  </div>
  <!-- .actions -->
  <div class="manifestation-data text">
    <?php print drupal_render($fields); ?>
  </div>
</article>
