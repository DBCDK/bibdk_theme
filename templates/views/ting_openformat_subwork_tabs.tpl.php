<div class="tabs-nav clearfix">
  <?php foreach ($variables['subWorks'] as $type => $subWork) : $count++; ?>
    <a href="#<?php print $type; ?>" class="<?php print ($count == 1) ? "active" : "" ?>"><?php echo $subWork['type']; ?></a>
  <?php endforeach; ?>
</div>