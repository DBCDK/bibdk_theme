<div id="search-advanced-toggle" class="clearfix<?php ($form['#visuallyhidden']) ? print ' toggled' : print ''; ?>">
  <a class="text-darkgrey" href="#"><span class="icon icon-left icon-blue-minus">&nbsp;</span><?php print t('Expand search options'); ?></a>
</div>
<div id="search-advanced" class="clearfix">
  <div id="search-advanced-panel" class="clearfix">
    <!-- ADVANCED SEARCH-->
    <?php print drupal_render_children($form); ?>
    <?php print drupal_render($form['#custom_submit']); ?>
    <!-- END ADVANCED SEARCH-->
  </div>
</div>
