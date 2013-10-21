<?php
  $attributes['id'][] = 'any_edtion_order_' . $class;
  $attributes['data-rel'] = 'reservation';
  $attributes['class'][] = 'bibdk-popup-link-' . $class;
  $attributes['class'][] = 'use-ajax';
  if ( $orderedOnce ) {
    $attributes['class'][] = 'orderedOnceWork';
  }
  $form = '<form class="bibdk-popup-order-checkbox"><input type="checkbox" /></form> ';
?>

<div class="bibdk-reservation-item bibdk-popup-order-work">
  <?php
    print $form . l($text, $path . $query, array('attributes' => $attributes)) ;
  ?>
</div>
