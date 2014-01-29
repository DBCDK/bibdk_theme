<!DOCTYPE html>
<html xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>

<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <style type="text/css">
    @font-face {
        font-family: "Dosis";
        font-style: normal;
        font-weight: 400;
        src: local("Dosis Regular"), local("Dosis-Regular"), url("<?php echo file_create_url(drupal_get_path('theme', 'bibdk_theme')); ?>/dosis.woff") format("woff");
    }
  </style>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
