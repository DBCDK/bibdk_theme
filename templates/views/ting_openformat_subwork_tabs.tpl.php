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
    <ul id="<?php print $type ?>" class="<?php print ($counter != 1) ? "visuallyhidden" : ""  ?>">
      <?php foreach ($subtypes as $subtype) : ?>
        <li><a href="#<?php print $subtype[0]; ?>"><?php print $subtype[1]; ?></a></li>
      <?php endforeach; ?>
    </ul>
  <?php endforeach; ?>
</div>