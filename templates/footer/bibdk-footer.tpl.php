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
  <div class="footer-tab-color">  
    <nav class="footer-tab-bar1 row">      
      <div class="footer-tab-bar-columns center">
        <section class="footer-bar-links">
          <?php print $footer_menu_links; ?>
        </section>
      </div>
    </nav>
  </div>  
  <div class="footer-tab-bar2 row">
    <div class="footer-tab-bar-columns">
      <section class="footer-logo left">
        <a href="<?php print $home_path; ?>"><img src="<?php print $footerlogo_path; ?>"/></a>
      </section>
      <section class="footer-social-links right">
        <!-- TODO links and images -->
        <a href="<?php print $home_path; ?>"><img src="<?php print $footerlogo_twitter_path2; ?>"width="20" height="20" alt="xxx" /></a>
        <a href="<?php print $home_path; ?>"><img src="<?php print $footerlogo_facebook_path2; ?>"width="20" height="20"/></a>
        <a href="<?php print $home_path; ?>"><img src="<?php print $footerlogo_play_path2; ?>"width="20" height="20"/></a>
      </section>
    </div>
  </div>  
</footer-top>
<!-- footer-bars end -->
