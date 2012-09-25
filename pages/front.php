<?php include '../template.php'; ?>

<!doctype html>
<?php include '_head.php'; ?>

<body class="page-frontpage">

	<?php render('global','topbar'); ?>
	<?php render('global','header'); ?>
	<?php render('global','search'); ?>
	<?php render('elements','subjects'); ?>

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

	<?php render('global','footer'); ?>

</body>
</html>