<div id="search-advanced">
  <div id="search-advanced-toggle">
    <a class="text-white" href="#"><span class="icon icon-left icon-darkgrey-plus">&#9660;</span><?php echo t('Expand search options'); ?></a>
  </div>
  <div id="search-advanced-panel" class="visuallyhidden">
    <!-- ADVANCED SEARCH-->
    <?php echo drupal_render_children($form); ?>
    <!-- END ADVANCED SEARCH-->
  </div>
</div>
