<?php include '../template.php' ?>

<!doctype html>
<?php include '_head.php'; ?>

<body class="page-laanerstatus">

	<?php render('global','topbar'); ?>
	<?php render('global','header'); ?>
	<?php render('global','search'); ?>

	<div id="region-subjects">
	  
	</div>


	<div id="page-columns">
	  
	  <div class="container_24">

	    <div class="grid_5">
	    	<div id="region-sidebar">
	    		<?php print render('elements', 'sidebar-navigation'); ?>
	    	</div> 
	    </div>
	    <!-- grid -->


	    <div class="grid_19">
	    	<div id="region-content">
	    		
		    	<div class="works-controls clearfix">
		    		<h1>Lånerstatus</h1>
		    	</div>
		    	<?php print render('views', 'status-laan'); ?>
		    	<?php print render('views', 'status-reserveringer'); ?>
		    	<?php print render('views', 'status-bestillinger'); ?>


	    	</div>
	    	<!-- region content -->
	    </div>
	    <!-- grid -->

	  </div>
	  <!-- container -->

	</div>
	<!-- page-columns-->


	<?php render('global','footer'); ?>

</body>
</html>