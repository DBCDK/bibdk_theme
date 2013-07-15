<div id="search-advanced">
  <div id="search-advanced-toggle">
    <a class="text-darkgrey<?php ($form['#visuallyhidden']) ? print '' : print ' toggled'; ?>" href="#"><span class="icon icon-left icon-blue-plus">&nbsp;</span><?php print t('Expand search options'); ?>
    </a>
  </div>
  <div id="search-advanced-panel" class="<?php ($form['#visuallyhidden']) ? print 'visuallyhidden' : print ''; ?>">
    <!-- ADVANCED SEARCH-->
    <?php print drupal_render_children($form); ?>
    <?php print drupal_render($form['#custom_submit']); ?>
    <!-- END ADVANCED SEARCH-->
  </div>
</div>
