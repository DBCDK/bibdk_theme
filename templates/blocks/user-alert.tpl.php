<?php
/**
 * @file
 * Displays a user alert.
 *
 * Available variables:
 * - $alert_label: The label of the alert, as set in the User Alerts settings.
 * - $body: The user alert message.
 *
 * @ingroup themeable
 */
if ( empty($body) ) {
  $body = $node->body['und'][0]['value'];
}
?>

<div id="user-alert-<?php print $nid; ?>" class="user-alert">
<?php if ($is_closeable) : ?>
  <div class="user-alert-close"><a href="javascript:;" rel="<?php print $nid; ?>"><span class="user-alert-close-image"></span></a>
</div><?php endif; ?>
  <div class="user-alert-message">
    <?php if ($alert_label) : ?><span class="user-label"><?php print $alert_label; ?>:</span><?php endif; ?>
    <?php print $body; ?>
  </div>
</div>