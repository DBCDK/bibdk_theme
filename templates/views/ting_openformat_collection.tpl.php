<?php
/**
 * @file
 * theme implementation for brief display of a collection
 *
 * Variables:
 * $uid: work id @todo remove selid- from id, this requires seleniumtests to be upated
 * $theme_attributes: array of attributes for the wrapper div
 * $title: Title of the collection
 * $author: Author of the collection
 * $part_of: (optional) If collection is part of a series
 * $types: List of type icons
 * $actions: fields attached to the BibdkCollection object
 * $work: If in full view mode it contains a work else an ajax wrapper
 *
 */
?>
<div <?php echo drupal_attributes($theme_attributes); ?>>
    <div role='link' tabindex="0" class="work-header clearfix" data-work-toggle="<?php print $uid; ?>">
      <div class="searchresult-work-wrapper" id="selid-<?php print $uid; ?>">
        <h3 class="searchresult-work-title"><?php print $title; ?></h3>
        <div class="searchresult-work-meta">
          <h4><?php print is_array($author) ? implode(', ', $author) : $author; ?></h4>
          <span><?php print $part_of; ?></span>
        </div>
      </div>
      <div class="work-types-actions">
        <div class="work-types">
          <?php print drupal_render($types); ?>
        </div>
        <div class="work-actions">
          <?php print drupal_render($actions); ?>
        </div>
      </div>
      <!-- element-types-actions -->
    </div>
    <!-- work-header -->
    <div class="work-body work-hidden">
      <?php print drupal_render($work); ?>
    </div>
    <!-- work-body -->
</div>
