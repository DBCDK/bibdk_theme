<div class="work element-wrapper">
  <div class="element">
    <div class="work-header element-section padded">
      <div class="actions">
        <div class="primary-actions">
          <div class="dropdown-wrapper">
            <a class="btn btn-blue dropdown-toggle" href="#">
              Bestil uanset udgave <span class="icon icon-right icon-white-down">▼</span>
            </a>
            <ul class="dropdown-menu visuallyhidden">
              <li><a href="#">Option 1</a></li>
              <li><a href="#">Option 2</a></li>
              <li><a href="#">Option 3</a></li>
              <li><a href="#">Option 4</a></li>
              <li><a href="#">Option 5</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- actions -->
      <div class="element-title">
        <hgroup>
          <h2><?php print $title; ?></h2>
          <h3><?php print $author; ?></h3>
        </hgroup>
      </div>

      <div class="toggle-next-section toggle-work">
        <a href="#" class="works-control works-pager-back">
          <span class="icon icon-blue-left">&or;</span>
        </a>
        <?php print $showinfo; ?>
      </div>
    </div>
    <!-- element-section (work-header) -->
    <div class="work-body work-body-has-cover element-section padded visuallyhidden">
      <div id="ajax_placeholder_<?php print $uid; ?>"></div>
    </div>
    <!-- element-section -->
  </div>
  <!-- element -->

</div>