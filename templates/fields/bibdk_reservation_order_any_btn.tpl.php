<?php #dpm($variables); ?>
<div class="actions">
  <div class="primary-actions">
    <div class="dropdown-wrapper">
      <a class="btn btn-blue dropdown-toggle" href="#"><?php print t('Order any edition', array(), array('context' => 'bibdk_reservation')); ?>
        <span class="icon icon-right icon-white-down">&nbsp;</span></a>

      <div class="dropdown-menu visuallyhidden">
        <!--                <div class="order-any">-->
        <div class="col1">
          <?php foreach ($types as $type => $action) : ?>
            <?php if (isset($action['order'])): ?>
              <div class="it"><?php print $action['order']; ?></div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <!--                </div>-->

        <div class="col2">
          <?php foreach ($types as $type => $action) : ?>
            <?php if (isset($action['order'])): ?>
              <?php print '<a><input type="checkbox" name="vehicle" value="Bike"></a>'; ?>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>