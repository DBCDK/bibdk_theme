<div class="tabs-nav clearfix">
  <?php $outerCount = 0; ?>
  <?php foreach ($variables['subWorks'] as $type => $subWork) : $outerCount++?>
    <a href="#<?php print $type; ?>" class="<?php print ($outerCount == 1) ? "active" : "" ?>"><?php  print $type; ?></a>
  <?php endforeach; ?>
</div>

<div class="tabs-nav clearfix">
  <?php $innerCount = 0; ?>
  <?php foreach ($variables['subWorks'] as $type => $subWork) : ?>
    <?php foreach ($subWork as $subtype => $manifestation) : $innerCount++; ?>
      <a href="#<?php print $subtype; ?>" class="<?php print ($innerCount == 1) ? "active" : "" ?>"><?php print $manifestation['translation']['subtype']; ?></a>
    <?php endforeach;?>
  <?php endforeach; ?>
</div>