<!-- cover -->
  <?php print drupal_render($fields['ting_cover_work']); ?>
<!-- cover -->

<div class="wrapper">
  <?php print drupal_render($fields); ?>
  <div class="bibdk-tabs bibdk-tabs-light">
    <div class="tabs-nav clearfix">
      <a href="#" class="active">Find mere om</a>
      <a href="#">Anmeldelser</a>
    </div>
    <!-- tabs-nav -->
    <div class="tabs-sections">
      <div class="tabs-section">
        <div class="padded text clearfix">
          <ul>
            <li><a href="#">Se anmeldelse hos Infomedia</a></li>
            <li><a href="#">Se materialevurdering</a></li>
            <li><a href="#">Læs brugeranmeldelser og ratings</a></li>
          </ul>
        </div>
      </div>
      <!-- tabs-section -->
    </div>
    <!-- tabs-sections -->
  </div>
  <!-- tabs -->
</div>
<!-- wrapper -->
</div>
<!-- work-share-data -->

<div class="bibdk-tabs bibdk-tabs-heavy">
  <?php print $tabs; ?>
  <!-- tabs-nav -->
  <div class="tabs-sections">
    <?php foreach ($subWorks as $type => $subwork) : $count++; ?> 
    
    <div id="<?php print $type; ?>" class="tabs-section <?php print ($count != 1) ? "visuallyhidden" : "" ?>">
      <div class="padded text clearfix">
        <div class="actions">
          <div class="primary-actions">
            <div class="btn-wrapper">
              <?php echo drupal_render($subwork['fields']); ?>
              <!--<a class="btn btn-blue" href="#">Bestil <strong>bog</strong> uanset udgave</a>-->
            </div>
            <a class="text-small link-add-basket" href="#">
              <span class="icon icon-left icon-blue-addbasket">▼</span>Tilføj indkøbskurv
            </a>
          </div>
        </div>
        <a href="#" class="text-small text-lightgrey">
          <span class="icon icon-left icon-lightgrey-list">▼</span>Hvilke biblioteker har materialet?
        </a>
      </div>
      <!-- tabs-content -->
      <div class="manifestations zebra-wrapper">
        <div class="zebra-content">
          <?php $count_manifestation = 0; ?>
          <?php foreach ($subwork['manifestations'] as $manifestation) : $count_manifestation++; ?> 
            <div class="manifestation zebra <?php print ($count_manifestation > 2) ? "visuallyhidden toggle" : "" ?>">
            <?php print $manifestation; ?>
            </div>  
          <?php endforeach; ?>

        </div>
        <!-- end zebra-content -->  
        <?php if(count($subwork['manifestations']) > 2) : ?>
        <div class="zebra-toggle">
          <a href="#<?php print $type; ?>">
            <span class="icon icon-left icon-blue-down">▼</span>
              <span class="toggle-text"><?php print t("show all (@count)", array('@count' => count($subwork['manifestations']))); ?></span>
              <span class="toggle-text hidden"><?php print t("hide"); ?></span>
          </a>
        </div>
        <?php endif; ?>
      </div>
      <!-- manifestations -->
    </div>
    <?php endforeach; ?>
    <!-- tabs-section -->
  </div>
  <!-- tabs-sections -->

</div>
<!-- tabs -->