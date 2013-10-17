<?php
  $attributes['id'][] = 'any_edtion_order_' . $class;
  $attributes['data-rel'] = 'reservation';
  $attributes['class'][] = 'bibdk-popup-order-work';
  $attributes['class'][] = 'bibdk-popup-link-' . $class;
  $attributes['class'][] = 'use-ajax';
  if ( $orderedOnce ) {
    $attributes['class'][] = 'orderedOnceWork';
  }
  $text .= ' <form style="float:right"><input type="checkbox" /></form>';
?>

<div class="bibdk-reservation-item">
  <?php
    $link = l('__FOOBAR__', $path . $query, array('attributes' => $attributes));
    print str_replace('__FOOBAR__', $text, $link);
  ?>
</div>
