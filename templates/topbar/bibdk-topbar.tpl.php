<?php
//TODO mmj logo should be added here -- and removed from bibdk_theme_preprocess_page() in template.php
/**
 * @file
 * Bibdk topbar including offcanvas menu
 *
 * Available variables:
 * - $menu: rendered menu
 *
 */
?>

<nav class="tab-bar">
  <section class="right-small">
    <a class="right-off-canvas-toggle menu-icon">
      <span></span>
      <span class="menu-text">Menu</span>
    </a>
  </section>
</nav>

<aside class="right-off-canvas-menu">
  <?php print $menu; ?>
</aside>