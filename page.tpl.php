<?php print render($page['topbar']); ?>
<?php print render($page['header']); ?>
<?php print render($page['search_panel']); ?>
<?php print render($page['content']); ?>
<div id="page-columns">
  
  <div class="container_24">
  	<div id="region-content">
	    <?php render('views', 'new-information'); ?>
	    <?php render('views', 'new-books'); ?>
	    <?php render('views', 'new-movies'); ?>
	    <?php render('views', 'new-music'); ?>
	    <?php render('views', 'new-games'); ?>
  	</div>
  </div>

</div>
<!-- page columns -->

<?php print render($page['footer']); ?>