<!-- work tabs -->
<div class="bibdk-tabs bibdk-tabs-light">
  <!-- tabs-nav -->
  <div class="tabs-nav clearfix">
    <?php foreach ($tabs as $type => $tab) : ?>
      <a href="#<?php print $type . $pid; ?>" id='<?php print $type; ?>' class="<?php print $type; ?> <?php print $tab['class']; ?>"><?php print $tab['title']; ?></a>
    <?php endforeach; ?>
  </div>
  <!-- tabs-nav -->
  <div class="tabs-sections">
    <div class="tabs-sections-wrapper">
      <?php foreach ($tabs as $type => $tab) : ?>
        <div id="<?php print $type . $pid; ?>" class="tabs-section <?php print $tab['active']; ?>">
          <div class="text clearfix">
            <?php print $tab['content']; ?>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- tabs-section -->
    </div>
  </div>
  <!-- tabs-sections -->
</div>
<!-- work tabs -->
