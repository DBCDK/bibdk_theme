<?php
/**
 * @file
 *
 * Template for rendereing a span with a svg icon
 *
 * Available variables:
 *   - $content: Render array
 *   - $attributes: Array of attributes
 *   - $svg: id of the svg-icon that should be displayed. This value will also
 *           be used as the class for the svg element so one should enusre that
 *           class is matched in the CSS.
 *
 * @see drupal_attributes()
 */
?>


<span <?php print drupal_attributes($attributes); ?> >
<?php if ($svg): ?>
  <svg class="svg-icon <?php print $svg; ?>">
    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#<?php print $svg; ?>"></use>
    <title><?php print $title;?></title>
  </svg>
<?php endif; ?>
  <?php print drupal_render($content); ?>
</span>
