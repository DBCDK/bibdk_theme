<?php include 'template.php' ?>

<!doctype html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width">

  <title>BIBLIOTEK.DK</title>
  <meta name="description" content="">

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/960_24_col.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/extra.css">
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="js/selectivizr-min.js"></script>
  <script src="js/jquery.noisy.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>


</head>
<body>
  <?php include 'templates/region-topbar.php'; ?>
  <?php include 'templates/region-header.php'; ?>
  <?php include 'templates/region-search.php'; ?>
  <?php include 'templates/region-subjects.php'; ?>


  <div id="region-content">
    
    <div class="container_24">
      <?php include 'templates/section-news.php'; ?>
      <?php include 'templates/section-books.php'; ?>
      <?php include 'templates/section-movies.php'; ?>
      <?php include 'templates/section-music.php'; ?>
      <?php include 'templates/section-games.php'; ?>
    </div>

  </div>
  <!-- #region-content -->

  <?php include 'templates/region-footer.php'; ?>

</body>
</html>