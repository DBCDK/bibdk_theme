<?php if (isset($variables['elements']['#secondary'])) : ?>
  <div id="sidebar">
    <nav class="sidebar-header">
      <ul>
        <?php print ( isset($variables['elements']['#bibdk_mypage_tab']) ) ? drupal_render($variables['elements']['#bibdk_mypage_tab']) : '<li>' . t('My page') . '</li>'; ?>
      </ul>
    </nav>
    <nav class="sidebar-nav">
      <ul>
        <?php print drupal_render($variables['elements']['#primary']); ?>
        <?php print drupal_render($variables['elements']['#secondary']); ?>
      </ul>
    </nav>
  </div>
<?php endif; ?>