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
      <?php print render('search-facets'); ?>

    </div>
    

    <div class="grid_19">
      <?php print render('works'); ?>
    </div>


  </div>

</div>
<!-- #region-content -->

<?php render('_footer'); ?>