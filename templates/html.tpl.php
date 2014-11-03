<!DOCTYPE html>
<html xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?> xmlns="http://www.w3.org/1999/html">
  <head>
    <meta name="viewport" content="initial-scale=1">
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <?php print $styles; ?>
    <?php print $scripts; ?>

    <script type="text/javascript">
      WebFontConfig = {
        google: { families: [ 'Dosis:400,700:latin' ] }
      };
      (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
          '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
      })();
    </script>

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

    <script> //TODO mmj this should be moved elsewhere and printed in page_bottom
      $(window.document).foundation({
        offcanvas: {
          // Sets method in which offcanvas opens.
          // [ move | overlap_single | overlap ]
          open_method: 'overlap_single',
          // Should the menu close when a menu link is clicked?
          // [ true | false ]
          close_on_click: true
        }
      });
    </script>

    <!-- Load combined svg file (with symbols) into body-->
    <script>
      (function () {
        var scripts = document.getElementsByTagName('script');
        var script = scripts[scripts.length - 1];
        var xhr = new XMLHttpRequest();

        xhr.onload = function () {
          var div = document.createElement('div');
          div.innerHTML = this.responseText;
          div.style.display = 'none';
          script.parentNode.insertBefore(div, script);
        };

        xhr.open('get', '<?php print $bibdk_theme_path . "/build/img/images.svg"; ?>', true);
        xhr.send();
      })()
    </script>

    <?php print $page_bottom; ?>
  </body>
</html>
