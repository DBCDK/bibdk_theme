<article class="manifestation clearfix">
  <div class="actions">
    <div class="primary-actions">
      <div class="btn-wrapper">
        <?php print drupal_render($fields['bibdk_reservation_button_default']); ?>
      </div>
      <?php print drupal_render($fields['bibdk_cart_link_default']); ?>
    </div>
    <div class="secondary-actions">
      <ul>
        <?php print drupal_render($fields['bibdk_linkme_permalink_default']); ?>
        <?php print drupal_render($fields['bibdk_holdingstatus_favourite_default']); ?>
      </ul>
    </div>
  </div>
  <!-- .actions -->
  <div class="manifestation-data text">
    <table>
      <tbody>
      <?php foreach ($fields['ting_openformat_default_formatter'] as $field) : ?>
        <tr>
          <th><?php print $field['#title']; ?></th>
          <td><?php print $field[0]['#markup']; ?></td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</article>
