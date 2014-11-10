<?php
/**
 * @file
 * Bibdk_theme topbar
 *
 * Available variables:
 * - $menu: Rendered menu
 * - $footer_menu: Rendered footer menu - displayed below main items
 * - $home_path: Frontpage path
 * - $logo_path: Path to logo image file
 * - $links: Links that should be showed left of the offcanvas menu (burger icon)
 *
 */
?>

<nav class="tab-bar">
  <section class="topbar-logo left"><a href="<?php print $home_path; ?>"><img src="<?php print $logo_path; ?>" /> </a></section>

  <section class="topbar-links right devicesize_small_hidden">
    <?php foreach($links as $link): ?>
      <?php print $link; ?>
    <?php endforeach; ?>
  </section>

  <section class="right-small">
    <a class="right-off-canvas-toggle menu-icon">
      <span> </span>
      <span class="menu-text">Menu</span>
    </a>
  </section>
</nav>

<aside class="right-off-canvas-menu">
  <?php print $menu; ?>
  <?php print $footer_menu; ?>

  <div class="social-links">
    <span>Twitter</span>
    <span>Fjæsen</span>
    <span>Youtbue</span>
  </div>
</aside>