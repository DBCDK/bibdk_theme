<?php #print drupal_render($variables['fields']); ?>
<!-- cover -->
<div class="work-shared-data clearfix">
  <div class="work-cover">
    <div class="work-cover-image">
      <a href="#"><img src="../img/cover-front-large.gif"></a>
      <a href="#" class="visuallyhidden"><img src="../img/cover-back-large.gif"></a>
    </div>
    <div class="work-cover-selector clearfix">
      <a href="#" class="work-cover-front active"></a>
      <a href="#" class="work-cover-back"></a>
    </div>

  </div>
  <!-- cover -->


  <div class="wrapper">
    <?php print drupal_render($fields); ?>
    <div class="field-tags">
      <a href="#">Krimi</a>&nbsp;/&nbsp;<a href="#">romaner</a>&nbsp;/&nbsp;<a href="#">hævn</a>&nbsp;/&nbsp;<a href="#">Oslo</a>&nbsp;/&nbsp;<a href="#">Norge</a>&nbsp;/&nbsp;<a href="#">2000-2009</a></div>
    <div class="tabs tabs-light">
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

<div class="tabs tabs-heavy">
  <?php print $variables['tabs']; ?>
  <!-- tabs-nav -->
  <div class="tabs-sections">
    <div class="tabs-section">
      <div class="padded text clearfix">
        <div class="actions">
          <div class="primary-actions">
            <div class="btn-wrapper">
              <a class="btn btn-blue" href="#">Bestil <strong>bog</strong> uanset udgave</a>
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
        <div class="zebra-toggle">
          <a href="#">
            <span class="icon icon-left icon-blue-down">▼</span>Skjul alle <strong>4 bøger</strong>
          </a>
        </div>
        <div class="zebra-content">
          <?php $subwork = current($variables['subWorks']); ?>
          <?php foreach ($subwork['manifestations'] as $manifestation) : ?> 
            <?php print $manifestation; ?>
          <?php endforeach; ?>

        </div>
        <!-- end zebra-content -->  

        <div class="zebra-toggle">
          <a href="#">
            <span class="icon icon-left icon-blue-down">▼</span>Skjul alle <strong>4 bøger</strong>
          </a>
        </div>

      </div>
      <!-- manifestations -->
    </div>
    <!-- tabs-section -->
  </div>
  <!-- tabs-sections -->

</div>
<!-- tabs -->