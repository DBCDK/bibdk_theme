<?php
/**
 * @file
 * Template for a 1 column panel layout.
 */
?>

<div class="panel-display panel-2col clearfix" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <div class="panel-panel panel-col-first">
    <div class="inside"><?php print $content['middle']; ?></div>
  </div>
</div>
