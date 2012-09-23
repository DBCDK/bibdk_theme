<?php include '../template.php'; ?>

<!doctype html>
<?php include '_head.php'; ?>

<body class="page-search-result">

	<?php render('global','topbar'); ?>
	<?php render('global','header'); ?>
	<?php render('global','search'); ?>


	<div id="region-subjects">
	  
	</div>

	<div id="page-columns">
	  
	  <div class="container_24">

	    <div class="grid_5">
	    	<div id="region-sidebar">
	    		<?php print render('elements', 'sidebar-facets'); ?>
	    	</div> 
	    </div>
	    

	    <div class="grid_19">
	    	<div id="region-content">
	      	<?php print render('views', 'works'); ?>
	    	</div>
	    </div>

	  </div>

	</div>
	<!-- page-columns -->

	<?php render('global','footer'); ?>

</body>
</html>