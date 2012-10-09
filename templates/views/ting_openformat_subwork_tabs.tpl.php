<div class="tabs-nav clearfix">
  <?php foreach ($variables['subWorks'] as $type => $subWork) : ?>
    <a href="#<?php print $subWork['type']; ?>"><?php echo $subWork['type']; ?></a>
  <?php endforeach; ?>
</div>