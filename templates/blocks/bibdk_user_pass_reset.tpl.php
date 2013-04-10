<?php
/**
 * @file
 * Theme implementation for bibliotek.dk reset password form.
 */
?>

<div class="element-wrapper">

  <div class="element clearfix">

    <div class="user-pass-reset-message">
      <?php print render($form['message']); ?>
      <?php print render($form['help']); ?>
    </div>

    <div class="user-pass-reset-action">
      <?php print drupal_render_children($form); ?>
    </div>

  </div>

</div>

