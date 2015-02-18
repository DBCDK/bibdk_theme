<?php
/**
 * @file
 *
 * Template for rendereing a link with a svg icon
 *
 * Available variables:
 *   - $text: Link text
 *   - $path: The path the link should point to
 *   - $options: Array of attributes
 *   - $svg: id of the svg-icon that should be displayed. This value will also
 *           be used as the class for the svg element so one should enusre that
 *           class is matched in the CSS.
 * @see drupal_attributes()
 */

$options['html']       = isset($options['html'])       ? $options['html']       : FALSE;
$options['attributes'] = isset($options['attributes']) ? $options['attributes'] : array();
$text                  = is_array($text)               ? drupal_render($text)   : $text;

?>

<a href="<?php print check_plain(url($path, $options)) ?>" <?php print drupal_attributes($options['attributes']) ?>>

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

  <?php if ($text) { ?>
    <span><?php print ($options['html'] ? $text : check_plain($text)) ?> </span>
  <?php }  ?>

</a>
