<?php
/**
 * @file
 * Bibdk_theme footer bars
 *
 * Available variables:
 *
 */
?>

<!-- footer-bars start -->
<footer id="footer-bars">
  <div class="footer-tab-wrapper">
    <nav class="footer-tab-bar-1 row">
      <div class="footer-tab-bar-columns center">
        <section class="footer-bar-links">
          <?php print $footer_menu_links; ?>
        </section>
      </div>
    </nav>
  </div>
  <div class="footer-tab-bar-2">
    <div class="row">
      <div class="footer-tab-bar-columns">
        <section class="footer-logo left hide-for-medium-down">
          <a href="<?php print $home_path; ?>"><img src="<?php print $footerlogo_path; ?>" alt="footer logo"/></a>
        </section>
        <section class="footer-social-links">
          <div class="social-links">
            <span>
              <a href="https://twitter.com/bibliotekdk" title="<?php t('Bibliotek.dk på Twitter'); ?>" target="_blank">
                <svg class="svg-social-twitter">
                  <title>Twitter</title>
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-social-twitter"></use>
                </svg>
              </a>
            </span>
            <span>
              <a href="https://www.facebook.com/bibliotek.dk" title="<?php t('Bibliotek.dk på Facebook'); ?>" target="_blank">
                <svg class="svg-social-facebook">
                  <title>Facebook</title>
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-social-facebook"></use>
                </svg>
              </a>
            </span>
            <span>
              <a href="https://www.youtube.com/user/bibliotekdk" title="<?php t('Bibliotek.dk på YouTube'); ?>" target="_blank">
                <svg class="svg-social-youtube">
                  <title>YouTube</title>
                  <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-social-youtube"></use>
                </svg>
              </a>
            </span>
          </div>
        </section>
      </div>
    </div>
  </div>
</footer>
<!-- footer-bars end -->
