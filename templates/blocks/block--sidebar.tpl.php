<?php if (isset($variables['elements']['#secondary'])) : ?>
  <div id="sidebar">
    <div class="sidebar-header">
      <?php print t('Min side'); ?> 
    </div>
    <nav class="sidebar-nav">    
      <ul>
        <?php print drupal_render($variables['elements']['#primary']); ?>
        <?php print drupal_render($variables['elements']['#secondary']); ?>
      </ul> 
    </nav>  
  </div>
<?php endif; ?>