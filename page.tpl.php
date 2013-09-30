<nav id="topbar-wrapper" data-role="navigation">
  <div class="container">
    <div class="row">
      <div class="span24">
        <div id="topbar">
          <?php print render($page['topbar']); ?>
        </div>
        <!-- #topbar -->
      </div>
    </div>
  </div>
</nav>
<!-- #topbar-wrapper -->


<header id="header-wrapper">
  <div class="container">
    <div class="row">
      <div class="span24">
        <div id="header">
          <div id="header-logo">
            <a href="<?php print $base_path; ?>" title="<?php print t('Home'); ?>">
              <?php print render($logo); ?>
            </a>
            <span id="seasonal"></span>
          </div>
          <?php print render($page['header_actions']); ?>
        </div>
        <!-- #header -->
      </div>
    </div>
  </div>
</header>
<!-- #header-wrapper -->


<nav id="search-panel-wrapper" data-role="search">
  <div class="container">
    <div class="row">
      <div class="span24">
        <div id="search-panel">
          <?php print render($page['search_panel']); ?>
        </div>
        <!-- #search-panel -->
      </div>
    </div>
  </div>
</nav>
<!-- #search-panel-wrapper -->


<section id="messages-wrapper" data-role="alert">
  <div class="container">
    <div class="row">
      <div class="span24">
        <a name="messages"></a>
        <div id="messages">
          <?php print $messages; ?>
        </div>
        <!-- #messages -->
      </div>
    </div>
  </div>
</section>
<!-- #messages-wrapper -->


<section id="carousel-wrapper">
  <div class="container">
    <div class="row">
      <div class="span24">
        <div id="carousel">
          <?php
            if ( $variables['is_front'] == TRUE ) {
              print render($page['carousel']);
            } else {
              unset($page['carousel']);
            }
          ?>
        </div>
        <!-- #carousel -->
      </div>
    </div>
  </div>
</section>
<!-- #carousel-wrapper -->


<section id="subjects-wrapper">
  <div class="container">
    <div class="row">
      <div class="span24">
        <div id="subjects">
          <?php print render($page['subjects']); ?>
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


<footer id="footer-wrapper">
  <div class="container">
    <div class="row">
      <div class="span24">
        <div id="footer">
          <div id="footer-logo">
            <?php print render($logo_small); ?>
          </div>
          <?php print render($page['footer']); ?>
        </div>
        <!-- #footer -->
      </div>
    </div>
  </div>
</footer>
<!-- #footer-wrapper -->
