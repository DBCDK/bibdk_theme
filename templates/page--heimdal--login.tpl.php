<?php
/**
 * @file
 * Page template file used when heimdal login form is displayed - remove search fields
 *
 * @parameters:
 * - $page: Array with content to be rendered. See below description of array
 *          keys for further info.
 */
?>

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

  <a name="content"></a> <!-- used for scrolling -->
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
      <div class="large-18 columns">
        <?php print render($page['content']); ?>
      </div>
    <?php else: ?>
      <div class="large-24 columns">
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
