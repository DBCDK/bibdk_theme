<?php
/**
 * @file
 *
 * Template for rendereing a link with a svg icon
 *
 * Available variables:
 *   - $title: Title of the link
 *   - $href: The path the link should point to
 *   - $attributes: Attributes that should be provided with the link
 *   - $svg: id of the svg-icon that should be displayed. This value will also
 *           be used as the class for the svg element so one should enusre that
 *           class is matched in the CSS.
 */
?>


<a href="<?php print $href; ?>" <?php print $attributes; ?> >
  <svg class="icon <?php print $svg; ?>">
    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#<?php print $svg; ?>"></use>
  </svg>
  <?php print $title; ?>
</a>