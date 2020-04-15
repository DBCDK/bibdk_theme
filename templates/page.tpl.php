<?php
/**
 * @file
 * Main page template file
 *
 * @parameters:
 * - $page: Array with content to be rendered. See below description of array
 *          keys for further info.
 *    - search_panel: Provides the search panel -- @see
 *                    search_block_form.tpl.php
 *
 */
?>
<?php if (!empty($page['search_panel'])): ?>
  <div id="search-panel"<?php if(isset($_GET['form_id']) && $_GET['form_id']='search_block_form'): ?> class="<?php print ($page["search_panel"]["search_form"]["advanced"]["#toggled_class"]); ?>"<?php endif; ?> data-role="search">
    <div id="search-panel-background" style="background-image: url(<?php print $page['image_url']; ?>)">
        <div class="which-library"><?php print $page['image_title']; ?></div>
    </div>
    <!-- blind user tag start -->
    <h2 class="element-invisible"><?php print t('search material by types', array(), array('context' => 'ting_openformat')); ?></h2>
    <!-- blind user tag slut -->
    <?php print render($page['search_panel']); ?>
    <!-- For now the bibliotek name is hardcoded.
     this will be changed when the background is administrated though the backend -->
  </div>
  <!-- search-panel end -->
<?php endif; ?>


<?php if (!empty($messages)): ?>
  <!-- messages start -->
  <section id="messages" data-role="alert">
    <div class="row">
      <div class="small-24 columns">
        <?php print $messages; ?>
      </div>
    </div>
  </section>
  <!-- messages end -->
<?php endif; ?>


<?php if (!empty($page['content']['user_alert_user_alert']) && $is_front): ?>
  <!-- user alerts start -->
  <section id="user-alerts">
    <div class="row">
      <div class="small-24 columns">
        <?php print render($page['content']['user_alert_user_alert']); ?>
      </div>
    </div>
  </section>
<?php else: ?>
  <?php unset($page['content']['user_alert_user_alert']); ?>
  <!-- user alerts end -->
<?php endif; ?>

<!-- columns start -->
<section id="columns">
  <?php if (!empty($title)): ?>

    <div class="row">
      <div class="small-18 columns">
        <h1 id="title"><?php print $title; ?></h1>
      </div>
    </div>
  <?php endif; ?>

  <div class="row">
    <?php if (!empty($page['sidebar'])): ?>
      <div class="large-6 columns show-for-large-up">
        <?php print render($page['sidebar']); ?>
      </div>
      <div class="large-18 columns" data-ajax-id="articles-view">
        <div id="content"></div><!-- used for scrolling -->
        <?php print render($page['content']); ?>
      </div>
    <?php else: ?>
      <div class="large-24 columns" data-ajax-id="articles-view">
        <div id="content"></div><!-- used for scrolling -->
        <?php print render($page['content']); ?>
      </div>
    <?php endif; ?>
  </div>
</section>
<!-- columns end -->

<?php if (!empty($page['banner'])): ?>
  <!-- banner start -->
  <section id="banner">
    <div class="row">
      <div class="small-24 columns">
        <?php print render($page['banner']); ?>
      </div>
    </div>
  </section>
  <!-- banner end -->
<?php endif; ?>
