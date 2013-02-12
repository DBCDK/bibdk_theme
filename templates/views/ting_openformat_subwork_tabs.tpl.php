<div class="tabs-nav clearfix">
  <?php $counter = 0; ?>
  <?php foreach ($variables['subWorks'] as $type => $subWork) : $counter++ ?>
  <?php $materialCounter = 0; ?>
  <?php foreach ($subWork as $subtype => $manifestation) : ?>
    <?php $subMaterialCounter = count($manifestation['manifest']['manifestations']); ?>
    <?php $typesarray[$type][] = array($subtype, $manifestation['translation']['subtype'], $subMaterialCounter); ?>
    <?php $materialCounter += $subMaterialCounter; ?>
    <?php endforeach; ?>
  <?php if ($type) : //if statement should be removed when openFormat is in production. If-statement temporarily included to avoid printing "polluted" data from OpenFormat?>
        <a href="#<?php print $type; ?><?php print $ding_id; ?>"
           class="<?php print ($counter == 1) ? "active" : ""  ?>"><?php print $type; ?>
            (<?php print $materialCounter; ?>)</a>
    <?php endif; ?>
  <?php endforeach; ?>
</div>

<div class="tabs-nav-sub clearfix">
  <?php $outercounter = 0; ?>
  <?php foreach ($typesarray as $type => $subtypes) : $outercounter++ ?>
  <?php $innercounter = 0; ?>
    <div id="<?php print $type ?><?php print $ding_id; ?>"
         class="<?php print ($outercounter != 1) ? "visuallyhidden" : ""  ?>">
      <?php foreach ($subtypes as $subtype) : $innercounter++ ?>
        <a href="#<?php print $subtype[0]; ?><?php print $ding_id; ?>"
           class="<?php print ($innercounter == 1) ? "active" : ""  ?>"><?php print $subtype[1]; ?>
            (<?php print $subtype[2]; ?>)</a>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>
