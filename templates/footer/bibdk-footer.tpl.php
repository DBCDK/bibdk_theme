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
  <div class="footer-tab-bar-2 row">
    <div class="footer-tab-bar-columns">
      <section class="footer-logo left hide-for-medium-down">
        <a href="<?php print $home_path; ?>"><img src="<?php print $footerlogo_path; ?>"/></a>
      </section>
      <section class="footer-social-links">
        <!-- TODO change images for twitter, facebook and youtube and http... -->
        <a href="<?php print "http://www.twitter.com"; ?>"><img src="<?php print $footerlogo_facebook_path; ?>"width="20" height="20"/></a>
        <a href="<?php print "http://www.facebook.com"; ?>"><img src="<?php print $footerlogo_twitter_path; ?>"width="20" height="20" /></a>
        <a href="<?php print "http://www.youtube.com"; ?>"><img src="<?php print $footerlogo_play_path; ?>"width="20" height="20"/></a>
      </section>
    </div>
  </div>  
</footer>
<!-- footer-bars end -->
