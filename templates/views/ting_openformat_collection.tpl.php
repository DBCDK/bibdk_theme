<div class="work element-wrapper <?php print $work_type; ?>">
  <div class="element">
    <div class="work-header element-section">
      <?php print drupal_render($actions); ?>
      <!-- actions -->
      <?php print $types; ?>

      <div class="element-title">
        <div>
          <h2><?php print $title; ?></h2>

          <h3><?php print $author; ?></h3>
          <?php if (isset($partOf)) : ?>
            <span>I: <?php print $partOf; ?></span>
          <?php endif; ?>
        </div>
      </div>
      <div class="msg-<?php print $uid; ?> collection-msg"></div>
      <div class="toggle-work">
        <a href="#work_<?php print $uid; ?>" class="works-control work-toggle-element">
          <span class="icon icon-left icon-blue-down">&nbsp;</span>
          <span class="toggle-text" id="selid_<?php print $uid; ?>"><?php echo t('More info'); ?></span>
          <span class="toggle-text hidden"><?php echo t('Less info'); ?></span>
        </a>
        <?php print $showinfo; ?>
      </div>
    </div>
    <!-- element-section (work-header) -->
    <div class="work-body work-body-has-cover element-section visuallyhidden">
      <div id="ajax_placeholder_<?php print $uid; ?>"></div>
    </div>
    <!-- element-section -->
  </div>
  <!-- element -->
</div>
