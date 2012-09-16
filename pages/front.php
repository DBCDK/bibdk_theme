<?php include '../template.php' ?>
<?php render('_head'); ?>


<?php render('region-topbar'); ?>
<?php render('region-header'); ?>
<?php render('region-search'); ?>
<?php render('region-subjects'); ?>


<div id="region-content">
  
  <div class="container_24">
    <?php render('section-news'); ?>
    <?php render('section-books'); ?>
    <?php render('section-movies'); ?>
    <?php render('section-music'); ?>
    <?php render('section-games'); ?>
  </div>

</div>
<!-- #region-content -->

<?php render('_footer'); ?>

