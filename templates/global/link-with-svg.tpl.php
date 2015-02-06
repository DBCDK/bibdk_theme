<?php
/**
 * @file
 *
 * Template for rendereing a link with a svg icon
 *
 * Available variables:
 *   - $title: Title of the link
 *   - $href: The path the link should point to
 *   - $attributes: Array of attributes
 *   - $svg: id of the svg-icon that should be displayed. This value will also
 *           be used as the class for the svg element so one should enusre that
 *           class is matched in the CSS.
 * @see drupal_attributes()
 */
?>
<a href="<?php print $href; ?>" <?php print drupal_attributes($attributes); ?> >
    <?php if ($svg != 'svg-menu' && $svg != 'svg-user') { ?>
    <svg class="svg-icon <?php print $svg; ?>">
      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#<?php print $svg; ?>"></use>
    </svg>
    <?php }  ?>
    <?php if ($svg == 'svg-user') { ?>
      <?php print theme('image', array('path' => drupal_get_path('theme', 'bibdk_theme') . '/img/user.png')); ?>
    <?php }  ?>
    <?php if ($svg == 'svg-menu') { ?>
      <?php print theme('image', array('path' => drupal_get_path('theme', 'bibdk_theme') . '/img/menu.png')); ?>
    <?php }  ?>
    <span><?php print $title; ?></span>
</a>
