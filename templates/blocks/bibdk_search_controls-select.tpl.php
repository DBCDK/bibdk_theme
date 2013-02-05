<?php
/**
 * @file
 * Theme implementation for bibliotek.dk search controls: Select.
 */
$selected = $selected_label = '';
$options = array();
foreach ( $variables['form'] as $name => $elem ) {
  if ( !empty($elem['#options']) && $elem['#type'] == 'select' ) {
    $selected = ( !empty($elem['#default_value']) ) ? $elem['#default_value'] : '';
    $options  = $elem['#options'];
    $selected_label = ( !empty($options[$selected]) ) ? $options[$selected] : '';
  }
}
?>

<a class="works-control works-sort dropdown-toggle" href="#">
  <span class="selected-text"><?php print t($selected_label); ?></span>
  <span class="icon icon-right icon-blue-down">?</span>
</a>

<ul class="dropdown-menu dropdown-leftalign visuallyhidden">
<?php foreach ( $options as $value => $label ) { ?>
  <li>
    <a class="<?php print ( $value == $selected ) ? 'current' : ''; ?>" href="#" data="<?php print $value; ?>"><?php print $label; ?></a>
  </li>
<?php } ?>
</ul>
