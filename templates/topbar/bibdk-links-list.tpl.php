<?php
/**
 * @file
 * Renders a unordered list of links. Otherwise Drupal's standard list it is
 * possible to set attributes on all elements in the list.
 *
 * @parameters:
 * - $attributes: array with attributes that should be attached the outer list
 *   element (<ul>).
 * - $items: array with items. Each item will represent a link i the list.
 *  - $item: a link that will be wrapped in a <li>.
 *
 * @see _bibdk_theme_get_offcanvas_menu_list() in template.php for example of
 *   usage.
 */
?>

<ul<?php print drupal_attributes($attributes); ?>>
  <?php foreach ($items as $item): ?>
    <li<?php print drupal_attributes($item['li_attributes']); ?>><?php print $item['link']; ?></li>
  <?php endforeach; ?>
</ul>