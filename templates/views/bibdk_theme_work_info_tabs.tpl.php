<div class="bibdk-tabs bibdk-tabs-light">
  <div class="tabs-nav clearfix">
    <?php foreach ($tabs as $type => $tab) : ?>
      <a href="#<?php print $type . $id; ?>" class="<?php print $tab['class']; ?>"><?php print $tab['title']; ?></a>
    <?php endforeach; ?>
  </div>

  <!-- tabs-nav -->
  <div class="tabs-sections">
    <?php foreach ($tabs as $type => $tab) : ?>
    <div id="<?php print $type . $id; ?>" class="tabs-section <?php print $tab['active']; ?>">
      <div class="padded text clearfix">
        <?php print $tab['content']; ?>
      </div>
    </div>
    <?php endforeach; ?>
    <!-- tabs-section -->
  </div>
  <!-- tabs-sections -->
</div>
