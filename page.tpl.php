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
            <img src="<?php print $logo; ?>" alt="Bibliotek.dk logo"/>
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

<div id="subjects-wrapper">

</div>


<?php if (!empty($messages)): ?>
<div id="messages">
	<?php print $messages; ?>
</div>
<?php endif; ?>



<div id="page-columns">

  <div class="container_24">
    <div class="grid_24">
      <?php print render($page['content']); ?>
    </div>
  </div>

</div>
<!-- #page-columns -->


<?php if (!empty($page['footer'])): ?>
  <div id="footer-wrapper">
    <div class="container_24">
      <div class="grid_24">
        <?php print render($page['footer']); ?>
      </div>
    </div>
  </div>
<?php endif; ?>
<!-- #footer-wrapper -->
