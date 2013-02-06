<article class="manifestation clearfix">
    <div class="actions">

        <div class="primary-actions">
            <div class="btn-wrapper">
              <?php print drupal_render($fields['bibdk_reservation_button_default']); ?>
            </div>
        </div>
        <div class="secondary-actions">
            <ul>
        <?php print drupal_render($fields['bibdk_cart_link_default']); ?>
        <?php print drupal_render($fields['bibdk_linkme_permalink_default']); ?>
        <?php print drupal_render($fields['bibdk_holdingstatus_favourite_default']); ?>
      </ul>
        </div>
    </div>
    <!-- .actions -->
    <div class="manifestation-data text">
        <table>
            <tbody>
            <?php print drupal_render($fields['ting_openformat_default_formatter']); ?>
            </tbody>
        </table>
    </div>
</article>
