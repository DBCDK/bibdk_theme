<?php
/**
 * @file
 * Template for a 2 column panel layout.
 */
?>

<div class="panel-display panel-2col container_24 clearfix" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <div class="panel-panel panel-col-first grid_5">
    <div class="inside"><?php print $content['left']; ?></div>
  </div>

  <div class="panel-panel panel-col-last grid_19">
    <div class="inside"><?php print $content['middle']; ?></div>
  </div>

</div>
