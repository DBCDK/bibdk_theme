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
    <a class="right-off-canvas-toggle menu-icon"><span></span></a>
  </section>
</nav>

<aside class="right-off-canvas-menu">
  <?php print $menu; ?>
  <!--
  <ul class="off-canvas-list">
    <li><label>Users</label></li>
    <li><a href="#">Hari Seldon</a></li>
    <li><a href="#">...</a></li>
  </ul>
  -->
</aside>