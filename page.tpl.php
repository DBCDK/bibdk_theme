<?php if (!empty($page['topbar'])): ?>
  <div id="topbar-wrapper">
    <div class="container_24">
      <div class="grid_24">
        <?php print render($page['topbar']); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<!-- #topbar-wrapper -->


  <div id="header-wrapper">
    <div class="container_24">
      <div class="grid_24">
        <div id="header-logo">
          <a href="<?php print $base_path; ?>">
            <img src="<?php print $logo; ?>" alt="<?php print t('Bibliotek.dk logo'); ?>"/>
          </a>
        </div>
        <?php if (!empty($page['header'])): ?>
          <?php print render($page['header']); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
<!-- #header-wrapper -->


<?php if (!empty($page['search_panel'])): ?>
  <div id="search-panel-wrapper">
    <div class="container_24">
      <div class="grid_24">
        <?php print render($page['search_panel']); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<!-- #search-panel-wrapper -->


<?php if (!empty($messages)): ?>
  <div id="messages">
    <div class="container_24">
      <div class="grid_24">
        <?php print $messages; ?>
      </div>
    </div>
  </div>
<?php endif; ?>


<div id="subjects-wrapper">

</div>

<?php if (!empty($page['information'])): ?>
  <div id="information-wrapper">
    <div class="container_24">
        <?php print render($page['information']); ?>
    </div>
  </div>
    <!-- #information-wrapper -->
<?php endif; ?>

<?php if (!empty($page['content'])): ?>
<div id="page-columns">
  <div class="container_24">
    <div class="grid_24">
<?php print render( $tabs); ?>
      <?php print render($page['content']); ?>
    </div>
  </div>
</div>
<?php endif; ?>
<!-- #page-columns -->

<?php
$footer_logo = theme_get_setting('bibdk_theme_footer_logo');
if (!empty($footer_logo)) :
  $footer_logo = file_create_url(drupal_get_path('theme', 'bibdk_theme') . '/' . $footer_logo);
?>
<div id="footer-wrapper">
  <div class="container_24">
    <div class="grid_24">
      <div id="footer-logo">
        <img src="<?php print $footer_logo; ?>" alt="<?php print t('Bibliotek.dk - loan of books, music, and films'); ?>" />
      </div>
    </div>
  </div>
</div>
<?php endif; ?>
<!-- #footer-wrapper -->
