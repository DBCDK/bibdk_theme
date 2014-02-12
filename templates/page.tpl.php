<!-- topbar start -->
<nav id="topbar__wrapper" data-role="navigation">
  <div id="topbar">
    <?php print render($page['topbar']); ?>
  </div>
</nav>
<!-- topbar end -->


<!-- header end -->
<header id="header__wrapper">
  <div id="header">
    <div class="logo"><?php print render($logo_header_link); ?></div>
    <?php print render($page['header_actions']); ?>
  </div>
</header>
<!-- header end -->


<!-- search-panel start -->
<nav id="search-panel__wrapper" data-role="search">
  <div id="search-panel">
    <?php print render($page['search_panel']); ?>
  </div>
</nav>
<!-- search-panel end -->


<?php if (!empty($messages)): ?>
  <!-- messages start -->
  <section id="messages__wrapper" data-role="alert">
    <div id="messages">
      <?php print $messages; ?>
    </div>
  </section>
  <!-- messages end -->
<?php endif; ?>


<?php if (!empty($page['user_alerts']) && $is_front): ?>
  <!-- user alerts start -->
  <section id="user-alerts__wrapper">
    <div id="user-alerts">
      <?php print render($page['content']['user_alert_user_alert']); ?>
    </div>
  </section>
  <!-- user alerts end -->
<?php endif; ?>


<?php if (!empty($page['carousel']) && $is_front): ?>
  <!-- carousel start -->
  <section id="carousel__wrapper">
    <div id="carousel">
      <?php print render($page['carousel']); ?>
    </div>
  </section>
  <!-- carousel end -->
<?php endif; ?>


<?php if ($language->language == 'da' && $is_front): ?>
  <!-- subjects start -->
  <section id="subjects__wrapper">
    <div id="subjects">
      <?php print render($page['subjects']); ?>
    </div>
  </section>
  <!-- subjects end -->
<?php endif; ?>


<section id="columns-wrapper">
  <div class="container">
    <div class="row">
      <div id="columns">
        <a name="content"></a>

        <?php if (!empty($page['sidebar'])): ?>
          <div class="span5">
            <?php print render($page['sidebar']); ?>
          </div>
        <?php endif; ?>

        <?php if (!empty($page['content'])): ?>
          <div class="<?php print $content_span; ?>">
            <?php if (!empty($title)): ?>
              <h1 id="title"><?php print $title; ?></h1>
            <?php endif; ?>
            <?php print render($page['content']); ?>
          </div>
        <?php endif; ?>

      </div>
      <!-- #columns -->
    </div>
  </div>
</section>
<!-- #columns-wrapper -->


<?php if (!empty($page['banner'])): ?>
  <!-- banner start -->
  <section id="banner__wrapper">
    <div id="banner">
        <?php print render($page['banner']); ?>
    </div>
  </section>
  <!-- banner end -->
<?php endif; ?>


<!-- footer start -->
<footer id="footer__wrapper">
  <div id="footer">
    <div class="logo"><?php print render($logo_footer_link); ?></div>
    <?php print render($page['footer']); ?>
  </div>
</footer>
<!-- footer end -->
