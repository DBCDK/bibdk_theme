<?php include '../template.php' ?>
<?php render('_head'); ?>

<body class="page-favoritbiblioteker">

	<?php render('region-topbar'); ?>
	<?php render('region-header'); ?>
	<?php render('region-search'); ?>

	<div id="region-subjects">
	  
	</div>

	<div id="region-content">
	  
	  <div class="container_24">

	    <div class="grid_5">
	      
	      <?php print render('sidebar-navigation'); ?>

	    </div>
	    

	    <div class="grid_19">

	    	<div class="works-controls clearfix">
	    		<h1>Favoritbiblioteker</h1>
	    	</div>
	      

	    	<?php print render('valgte-favoritbiblioteker'); ?>
	    	<?php print render('valgte-favoritbiblioteker'); ?>

	    </div>
	    <!-- grid -->

	  </div>
	  <!-- container -->

	</div>
	<!-- #region-content -->

	<?php render('_footer'); ?>