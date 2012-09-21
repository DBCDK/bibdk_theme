<body class="">

<?php include '../template.php' ?>
<?php render('_head'); ?>


<?php render('region-topbar'); ?>
<?php render('region-header'); ?>
<?php render('region-search'); ?>

<div id="region-subjects">
  
</div>

<div id="region-content">
  
  <div class="container_24">

    <div class="grid_5">
      sidebar

    </div>
    

    <div class="grid_19">
      

    	<?php print render('reserveringer'); ?>
    	<?php print render('bestillinger'); ?>

    </div>
    <!-- grid -->

  </div>
  <!-- container -->

</div>
<!-- #region-content -->

<?php render('_footer'); ?>