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
 * - $links: Links that should be showed left of the offcanvas menu (burger
 *   icon)
 * - $overlay: flag that indicates whether we're on a overlay or not
 *
 */
?>

  <nav class="topbar">

    <div class="topbar-logo">
      <a href="<?php print $home_path; ?>" title="<?php print $logo_title ?>">
        <svg class="svg-logo-header">
          <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-logo"></use>
        </svg>
      </a>
    </div>

    <?php if (!$overlay): ?>
      <div class="topbar-links">
        <?php print $links; ?>
      </div>
    <?php endif; ?>

  </nav>

<?php if (!$overlay): ?>
  <aside class="right-off-canvas-menu">
    <?php print $menu; ?>
    <?php print $footer_menu; ?>

    <div class="social-links">
      <span>
        <a href="https://twitter.com/bibliotekdk" title="<?php t('Bibliotek.dk på Twitter'); ?>" target="_blank">
          <svg class="svg-social-twitter">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-social-twitter"></use>
          </svg>
        </a>
      </span>
      <span>
        <a href="https://www.facebook.com/bibliotek.dk" title="<?php t('Bibliotek.dk på Facebook'); ?>" target="_blank">
          <svg class="svg-social-facebook">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-social-facebook"></use>
          </svg>
        </a>
      </span>
      <span>
        <a href="https://www.youtube.com/user/bibliotekdk" title="<?php t('Bibliotek.dk på YouTube'); ?>" target="_blank">
          <svg class="svg-social-youtube">
            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-social-youtube"></use>
          </svg>
        </a>
      </span>
    </div>
  </aside>
<?php endif; ?>
