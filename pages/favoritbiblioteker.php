<?php include '../template.php' ?>

<!doctype html>
<?php include '_head.php'; ?>

<body class="page-favoritbiblioteker">

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
	    
	    <div class="grid_19">
	    	<div id="region-content">

					<div class="works-controls clearfix">
		    		<h1>Favoritbiblioteker</h1>
		    	</div>
		      

		    	<?php print render('views', 'favbib-valgte'); ?>
		    	<?php print render('views', 'favbib-valgte'); ?>	    		

	    	</div>
	    </div>
	    <!-- grid -->

	  </div>
	  <!-- container -->

	</div>
	<!-- page-columns -->

	<?php render('global','footer'); ?>

</body>
</html>