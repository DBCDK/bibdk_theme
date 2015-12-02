<!DOCTYPE html>
<html xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?> xmlns="http://www.w3.org/1999/html">
  <head>
    <!-- Windows phone hack - IE 11 do not all ways work on click on dropdownbox -->
    <meta http-equiv="X-UA-Compatible" content="IE=10,chrome=1">
    <meta name="viewport" content="initial-scale=1">
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <?php print $styles; ?>
    <?php print $scripts; ?>
  </head>

  <body class="<?php print $classes; ?>" <?php print $attributes; ?> >
    <?php print $page_top; ?>

    <!-- FOUNDATION OFFCANVAS MENU WRAPPER -->
    <div id="mainwrapper" aria-hidden="false">
      <div class="off-canvas-wrap" data-offcanvas>
        <div class="inner-wrap">
          <?php print $page_topbar; ?>
          <?php print $page; ?>
          <?php print $page_footer; ?>
        </div>
        <a class="exit-off-canvas"></a>
      </div>
    </div>
    <!-- FOUNDATION OFFCANVAS MENU WRAPPER -->

    <div id="bibdk-modal" class="reveal-modal" data-reveal aria-hidden="true" role="dialog"></div>
    <?php print $page_bottom; ?>
  </body>
</html>
