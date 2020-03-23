<?php
/**
 * @file
 *
 * Template for rendering a button with a svg icon
 * - takes same variables as 'theme_image_button'; plus a svg icon name.
 * - accept a render array as label.
 *
 * Available variables:
 *   - $name:
 *   - $value:
 *   - $label:
 *   - $attributes: Array of attribute values
 *   - $svg: id of the svg-icon that should be displayed. This value will also
 *           be used as the class for the svg element so one should enusre that
 *           class is matched in the CSS.
 */

$label = (is_array($label) && !empty($label)) ? drupal_render($label) : check_plain($label);

if (!empty($attributes['disabled'])) {
  $attributes['class'][] = 'form-button-disabled';
}

$element = $attributes;
$element['name'] = $name;
$element['value'] = $value;
$element['type'] = 'submit';

?>

<button <?php print drupal_attributes($element); ?>>

  <?php if ($svg) { ?>
    <svg class="svg-icon <?php print $svg; ?>">
      <title><?php print $svg;?></title>
      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#<?php print $svg; ?>"></use>
    </svg>
  <?php }  ?>

  <?php if (!empty($label)) { ?>
    <span><?php print $label; ?></span>
  <?php } ?>

</button>
