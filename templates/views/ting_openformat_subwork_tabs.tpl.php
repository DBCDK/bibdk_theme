<div class="tabs-nav clearfix">
  <?php $counter = 0; ?>
  <?php foreach ($variables['subWorks'] as $type => $subWork) : $counter++ ?>
    <a href="#<?php print $type; ?>" class="<?php print ($counter == 1) ? "active" : ""  ?>"><?php print $type; ?></a>
    <?php foreach ($subWork as $subtype => $manifestation) : $innerCount++; ?>
      <?php $typesarray[$type][] = array($subtype, $manifestation['translation']['subtype']); ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
</div>

<div class="tabs-nav clearfix">
  <?php $counter = 0; ?>
  <?php foreach ($typesarray as $type => $subtypes) : $counter++ ?>
    <div id="<?php print $type ?>" class="<?php print ($counter != 1) ? "visuallyhidden" : ""  ?>">
      <?php foreach ($subtypes as $subtype) : ?>
        <a href="#<?php print $subtype[0]; ?>" class="tabs-sub-nav" ><?php print $subtype[1]; ?></a>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>