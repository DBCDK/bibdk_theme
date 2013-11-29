<div class="work element-wrapper">
  <div class="element">
    <div class="work-header element-section">
      <div class="element-title">
        <hgroup>
          <h2><?php print $title; ?></h2>

          <h3><?php print $author; ?></h3>
          <?php if (isset($partOf)) : ?>
            <span>I: <?php print $partOf; ?></span>
          <?php endif; ?>
        </hgroup>
      </div>

    </div>
    <!-- element-section (work-header) -->
    <div class="work-body work-body-has-cover element-section ">
      <?php print $work; ?>
    </div>
    <!-- element-section -->
  </div>
  <!-- element -->
</div>
