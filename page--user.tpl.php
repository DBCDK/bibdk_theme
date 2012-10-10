<?php if (!empty($page['topbar']) && !(isset($variables['node']->type) && $variables['node']->type == 'userhelp')): ?>
  <div id="topbar-wrapper">
    <div class="container">
      <div class="row">
        <nav id="service-nav">
          <?php print render($page['topbar']); ?>
        </nav>
      </div>
    </div>
  </div>
<?php endif; ?>
<!-- #topbar-wrapper -->


<div id="header-wrapper">
  <div class="container">
    <div class="row">
      <div id="header-logo">
        <a href="<?php print $base_path; ?>" title="<?php print t('Home'); ?>">
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


<?php if (!empty($page['search_panel']) && !(isset($variables['node']->type) && $variables['node']->type == 'userhelp')): ?>
  <div id="search-panel-wrapper">
    <div class="container">
      <div class="row">
        <?php print render($page['search_panel']); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<!-- #search-panel-wrapper -->


<?php if (!empty($messages)): ?>
  <div id="messages">
    <div class="container">
      <div class="row">
        <?php print $messages; ?>
      </div>
    </div>
  </div>
<?php endif; ?>


<div id="subjects-wrapper">

</div>


<!-- PANELS BELOW THIS -->
<div id="region-subjects">

</div>


<div id="page-columns">

  <div class="container_24">

    <div class="grid_5">
      <div id="region-sidebar">
        <div id="sidebar">
          <div class="sidebar-header"> <?php echo t('Min side'); ?> </div>
          <nav class="sidebar-nav">
            <?php
            if (isset($tabs['#secondary']) && isset($tabs['#primary'])) {
              unset($tabs['#primary']);
            }
            ?>
            <?php print render($tabs); ?>
          </nav>
        </div> <!-- sidebar -->
      </div> <!-- region-sidebar -->
    </div> <!--grid_5 -->

    <div class="grid_19">
      <div id="region-content">

        <div class="works-controls clearfix">
          <?php $tab_title = isset($page['content']['system_main']['#title']) ? $page['content']['system_main']['#title'] : t('Account'); ?>
          <h1><?php echo $tab_title; ?></h1>
        </div>
        <?php print render($page['content']); ?>  
      </div> <!-- region-content -->
    </div> <!-- grid_19 -->
  </div> <!-- container -->

</div>
<!-- page-columns -->

<!-- PANELS ABOVE THIS -->

<div id="footer-wrapper">
  <div class="container">
    <div class="row">
      <div id="footer-logo">
        <img src="<?php print $footer_logo; ?>" alt="<?php print t('Bibliotek.dk - loan of books, music, and films'); ?>" />
      </div>
    </div>
    <div class="text-white">
      <?php print render($page['footer']); ?>
    </div>
  </div>
</div>
<!-- #footer-wrapper -->
