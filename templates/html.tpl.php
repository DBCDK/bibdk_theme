<!DOCTYPE html>
<html xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?> xmlns="http://www.w3.org/1999/html">
  <head>
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
        </div>
        <a class="exit-off-canvas"></a>
      </div>
    </div>
    <!-- FOUNDATION OFFCANVAS MENU WRAPPER -->

    <div id="bibdk-modal" class="reveal-modal" data-reveal>
    </div>
    <?php print $page_bottom; ?>
  </body>
</html>
