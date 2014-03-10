<!-- topbar start -->
<nav id="topbar" data-role="navigation">
  <div class="row">
    <div class="small-24 columns">
      <?php print render($page['topbar']); ?>
    </div>
  </div>
</nav>
<!-- topbar end -->


<!-- header end -->
<header id="header">
  <div class="row">
    <div class="small-24 columns">
      <div class="logo"><?php print render($logo_header_link); ?></div>
      <?php print render($page['header_actions']); ?>
    </div>
  </div>
</header>
<!-- header end -->


<!-- search-panel start -->
<nav id="search-panel" data-role="search">
  <div class="row">
    <div class="small-24 columns">
      <?php print render($page['search_panel']); ?>
    </div>
  </div>
</nav>
<!-- search-panel end -->


<?php if (!empty($messages)): ?>
  <!-- messages start -->
  <section id="messages" data-role="alert">
    <div class="row">
      <div class="small-24 columns">
        <?php print $messages; ?>
      </div>
    </div>
  </section>
  <!-- messages end -->
<?php endif; ?>


<?php if (!empty($page['user_alerts']) && $is_front): ?>
  <!-- user alerts start -->
  <section id="user-alerts">
    <div class="row">
      <div class="small-24 columns">
        <?php print render($page['content']['user_alert_user_alert']); ?>
      </div>
    </div>
  </section>
  <!-- user alerts end -->
<?php endif; ?>


<?php if (!empty($page['carousel']) && $is_front): ?>
  <!-- carousel start -->
  <section id="carousel">
    <div class="row">
      <div class="small-24 columns">
        <?php print render($page['carousel']); ?>
      </div>
    </div>
  </section>
  <!-- carousel end -->
<?php endif; ?>


<?php if ($language->language == 'da' && $is_front): ?>
  <!-- subjects start -->
  <section id="subjectshierarchy">
    <div class="row">
      <div class="small-24 columns">
        <?php print render($page['subjects']); ?>
      </div>
    </div>
  </section>
  <!-- subjects end -->
<?php endif; ?>


<!-- columns start -->
<section id="columns">

  <a name="content"></a> <!-- used for scrolling -->

  <?php if (!empty($title)): ?>
    <div class="row">
      <div class="small-18 columns">
        <h1 id="title"><?php print $title; ?></h1>
      </div>
    </div>
  <?php endif; ?>


  <div class="row">

    <?php if (!empty($page['sidebar'])): ?>
      <div class="small-6 columns">
        <?php print render($page['sidebar']); ?>
      </div>
      <div class="small-18 columns">
        <?php print render($page['content']); ?>
      </div>
    <?php else: ?>
      <div class="small-24 columns">
        <?php print render($page['content']); ?>
      </div>
    <?php endif; ?>

  </div>

</section>
<!-- columns end -->


<?php if (!empty($page['banner'])): ?>
  <!-- banner start -->
  <section id="banner">
    <div class="row">
      <div class="small-24 columns">
        <?php print render($page['banner']); ?>
      </div>
    </div>
  </section>
  <!-- banner end -->
<?php endif; ?>


<!-- footer start -->
<footer id="footer">
  <div class="row">
    <div class="small-24 columns">
      <div class="logo"><?php print render($logo_footer_link); ?></div>
      <?php print render($page['footer']); ?>
    </div>
  </div>
</footer>
<!-- footer end -->
