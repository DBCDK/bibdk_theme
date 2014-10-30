<?php
/**
 * @file
 * HEST!
 * - $attributes:
 * - $items:
 *  - $item:
 */
?>

<ul<?php print drupal_attributes($attributes);?>>
  <?php foreach($items as $item): ?>
    <li<?php print drupal_attributes($item['li_attributes']); ?>><?php print $item['link']; ?></li>
  <?php endforeach; ?>
</ul>