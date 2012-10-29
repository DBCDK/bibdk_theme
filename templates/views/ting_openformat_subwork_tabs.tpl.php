<div class="tabs-nav clearfix">
  <?php $counter = 0; ?>
  <?php foreach ($variables['subWorks'] as $type => $subWork) : $counter++ ?>
    <?php $materialCounter = 0; ?>
    <?php foreach ($subWork as $subtype => $manifestation) : ?>
      <?php $subMaterialCounter = count($manifestation['manifest']['manifestations']); ?>
      <?php $typesarray[$type][] = array($subtype, $manifestation['translation']['subtype'], $subMaterialCounter); ?>
      <?php $materialCounter += $subMaterialCounter; ?>
    <?php endforeach; ?>
    <a href="#<?php print $type; ?>" class="<?php print ($counter == 1) ? "active" : ""  ?>"><?php print $type; ?> (<?php print $materialCounter; ?>)</a>
  <?php endforeach; ?>
</div>

<div class="tabs-nav-sub clearfix">
  <?php $counter = 0; ?>
  <?php foreach ($typesarray as $type => $subtypes) : $counter++ ?>
    <div id="<?php print $type ?>" class="<?php print ($counter != 1) ? "visuallyhidden" : ""  ?>">
      <?php foreach ($subtypes as $subtype) : ?>
        <a href="#<?php print $subtype[0]; ?>"><?php print $subtype[1]; ?> (<?php print $subtype[2]; ?>)</a>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>
