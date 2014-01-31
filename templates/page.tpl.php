<!-- topbar start -->
<nav class="topbar__wrapper" data-role="navigation">
  <div class="topbar">
    <?php print render($page['topbar']); ?>
  </div>
</nav>
<!-- topbar end -->


<!-- header end -->
<header class="header__wrapper">
  <div class="header">
    <div class="logo"><?php print render($logo_header_link); ?></div>
    <?php print render($page['header_actions']); ?>
  </div>
</header>
<!-- header end -->


<!-- search-panel start -->
<nav id="search-panel-wrapper" data-role="search" class="container__wrapper">
  <div id="search-panel" class="container">
    <?php print render($page['search_panel']); ?>
  </div>
</nav>
<!-- search-panel end -->


<!-- messages start -->
<?php if (!empty($messages)): ?>
  <section class="messages__wrapper" data-role="alert">
    <div class="messages">
      <?php print $messages; ?>
    </div>
  </section>
<?php endif; ?>
<!-- messages end -->


<!-- user alerts start -->
<?php if (!empty($page['user_alerts']) && $is_front): ?>
  <section class="user-alerts__wrapper">
    <div class="user-alerts">
      <?php print render($page['content']['user_alert_user_alert']); ?>
    </div>
  </section>
<?php endif; ?>
<!-- user alerts end -->


<!-- carousel start -->
<section id="carousel-wrapper" class="container__wrapper">
  <div id="carousel" class="container">
    <?php
      if ($is_front) {
        print render($page['carousel']);
      } else {
        unset($page['carousel']);
      }
    ?>
  </div>
</section>
<!-- carousel end -->


<section id="subjects-wrapper">
  <div class="container">
    <div class="row">
      <div class="span24 clearfix">
        <div id="subjects">
          <?php
            if ( $variables['is_front'] == TRUE && $variables['language']->language == 'da' ) {
              print render($page['subjects']);
            } else {
              unset($page['subjects']);
            }
          ?>
        </div>
        <!-- #subjects -->
      </div>
    </div>
  </div>
</section>
<!-- #subjects-wrapper -->


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


<section id="banner-wrapper">
  <div class="container">
    <div class="row">
      <div class="span24">
        <?php
          print render($page['banner']);
        ?>
        <!-- #banners -->
      </div>
    </div>
  </div>
</section>
<!-- #banner-wrapper -->


<!-- footer start -->
<footer class="footer__wrapper">
  <div class="footer">
    <div class="logo"><?php print render($logo_footer_link); ?></div>
    <?php print render($page['footer']); ?>
  </div>
</footer>
<!-- footer end -->
