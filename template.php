<?php

// Format array of tags as links
function format_tags($tags) {

  $elements = array();

  foreach ($tags as $tag) {
    $elements[] = '<a href="#">' . $tag . '</a>';
  }

  $output = implode('&nbsp;/&nbsp;', $elements);

  return $output;
}

function bibdk_theme_form_search_block_form_alter(&$form, &$form_alter) {
  $form['search_block_form']['#attributes']['class'] = array('clearfix');
  $form['actions']['submit']['#attributes']['class'] = array('btn', 'btn-blue', 'btn-fixed-size');
  $form['actions']['#weight'] = -10;
  $form['search_block_form']['#weight'] = - 12;
}

function bibdk_theme_page_alter(&$page){
  //removing search form rendered in content region by search module
  // Logged in
  if (!empty($page['content']['system_main']['content']['search_form'])) {
    unset($page['content']['system_main']['content']['search_form']);
  }
  // Not logged in
  if (!empty($page['content']['system_main']['search_form'])) {
    unset($page['content']['system_main']['search_form']);
  }
}

function bibdk_theme_menu_tree__menu_global_login_menu(&$variables) {
  return "<ul class='horizontal-nav clearfix'>" . $variables['tree'] . "</ul>";
}

function bibdk_theme_form_user_login_alter(&$form) {
  $form['name']['#description'] = '';
  $form['pass']['#description'] = '';
}

function bibdk_theme_preprocess_page(&$variables) {
  $footer_logo = theme_get_setting('bibdk_theme_footer_logo');
  if (!empty($footer_logo)) {
    $variables['footer_logo'] = file_create_url(drupal_get_path('theme', 'bibdk_theme') . '/' . $footer_logo);
  }
}

function bibdk_theme_preprocess_bibdk_reservation_button(&$variables){
  $variables['link_attributes']['class'][] = 'btn';
  $variables['link_attributes']['class'][] = (isset($variables['entity_type']) && $variables['entity_type'] == 'bibdkManifestation') ? 'btn-grey' : 'btn-blue';
  return $variables;
}

function bibdk_theme_pager_link($variables) {
  $text = $variables['text'];
  $page_new = $variables['page_new'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $attributes = $variables['attributes'];

  $page = isset($_GET['page']) ? $_GET['page'] : '';
  if ($new_page = implode(',', pager_load_array($page_new[$element], $element, explode(',', $page)))) {
    $parameters['page'] = $new_page;
  }

  $query = array();
  if (count($parameters)) {
    $query = drupal_get_query_parameters($parameters, array());
  }
  if ($query_pager = pager_get_query_parameters()) {
    $query = array_merge($query, $query_pager);
  }

  // Set each pager link title
  if (!isset($attributes['title'])) {
    static $titles = NULL;
    if (!isset($titles)) {
      $titles = array(
        t('<< first') => t('Go to first page'), 
        t('< previous') => t('Go to previous page'), 
        t('next >') => t('Go to next page'), 
        t('last >>') => t('Go to last page'),
      );
    }
    if (isset($titles[$text])) {
      $attributes['title'] = $titles[$text];
    }
    elseif (is_numeric($text)) {
      $attributes['title'] = t('Go to page @number', array('@number' => $text));
    }
  }

  // @todo l() cannot be used here, since it adds an 'active' class based on the
  //   path only (which is always the current path for pager links). Apparently,
  //   none of the pager links is active at any time - but it should still be
  //   possible to use l() here.
  // @see http://drupal.org/node/1410574
  $attributes['href'] = url($_GET['q'], array('query' => $query));
  if ( in_array('works-pager-back',$attributes['class']) ) {
    return '<a' . drupal_attributes($attributes) . '>' . check_plain($text) . '<span class="icon icon-blue-left">&or;</span></a>';
  }

  if ( in_array('works-pager-forward',$attributes['class']) ) {
    return '<a' . drupal_attributes($attributes) . '>' . check_plain($text) . '<span class="icon icon-blue-right">&or;</span></a>';
  }

  if ( in_array('works-pager-select',$attributes['class']) ) {
    return '<a' . drupal_attributes($attributes) . '>' . check_plain($text) . '<span class="icon icon-right icon-blue-down">&or;</span></a>';
  }

  return '<a' . drupal_attributes($attributes) . '>' . check_plain($text) . '</a>';

}

function bibdk_theme_pager_first($variables) {
  $text = $variables['text'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $attributes = array(
    'class' => array('works-control','works-pager-select','dropdown-toggle'),
  );
  if ( isset($parameters['previous']) ) {
    $attributes = $parameters['previous'];
    unset($parameters['previous']);
  }
  global $pager_page_array;

  $output = '';

  // If we are anywhere but the first page
  if ($pager_page_array[$element] > 0) {
    $output = theme('pager_link', array('text' => $text, 'page_new' => pager_load_array(0, $element, $pager_page_array), 'element' => $element, 'parameters' => $parameters, 'attributes' => $attributes));
  }

  return $output;
}

function  bibdk_theme_pager_previous($variables) {
  $text = $variables['text'];
  $element = $variables['element'];
  $interval = $variables['interval'];
  $parameters = $variables['parameters'];
  global $pager_page_array;
  $output = '';
  $attributes = array(
    'class' => array('works-control','works-pager-back'),
  );
  $parameters['previous'] = array(
    'class' => array('works-control','works-pager-back'),
  );

  // If we are anywhere but the first page
  if ($pager_page_array[$element] > 0) {
    $page_new = pager_load_array($pager_page_array[$element] - $interval, $element, $pager_page_array);

    // If the previous page is the first page, mark the link as such.
    if ($page_new[$element] == 0) {
      $output = theme('pager_first', array('text' => $text, 'element' => $element, 'parameters' => $parameters, 'attributes' => $attributes));
    }
    // The previous page is not the first page.
    else {
      unset($parameters['previous']);
      $output = theme('pager_link', array('text' => $text, 'page_new' => $page_new, 'element' => $element, 'parameters' => $parameters, 'attributes' => $attributes));
    }
  }

  return $output;
}

function bibdk_theme_pager_next($variables) {
  $text = $variables['text'];
  $element = $variables['element'];
  $interval = $variables['interval'];
  $parameters = $variables['parameters'];
  $attributes = array(
    'class' => array('works-control','works-pager-forward'),
  );

  global $pager_page_array, $pager_total;
  $output = '';

  // If we are anywhere but the last page
  if ($pager_page_array[$element] < ($pager_total[$element] - 1)) {
    $page_new = pager_load_array($pager_page_array[$element] + $interval, $element, $pager_page_array);
    // If the next page is the last page, mark the link as such.
    if ($page_new[$element] == ($pager_total[$element] - 1)) {
      $output = theme('pager_last', array('text' => $text, 'element' => $element, 'parameters' => $parameters, 'attributes' => $attributes));
    }
    // The next page is not the last page.
    else {
      $output = theme('pager_link', array('text' => $text, 'page_new' => $page_new, 'element' => $element, 'parameters' => $parameters, 'attributes' => $attributes));
    }
  }

  return $output;
}

function bibdk_theme_pager_last($variables) {
  $text = $variables['text'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $attributes = array(
    'class' => array('works-control','works-pager-back'),
  );

  global $pager_page_array, $pager_total;
  $output = '';

  // If we are anywhere but the last page
  if ($pager_page_array[$element] < ($pager_total[$element] - 1)) {
    $output = theme('pager_link', array('text' => $text, 'page_new' => pager_load_array($pager_total[$element] - 1, $element, $pager_page_array), 'element' => $element, 'parameters' => $parameters, 'attributes' => $attributes));
  }

  return $output;
}

function bibdk_theme_item_list($variables) {
  $items = $variables['items'];
  $title = $variables['title'];
  $type = $variables['type'];
  $attributes = $variables['attributes'];

  $output = '';
  // Only output the list container and title, if there are any list items.
  // Check to see whether the block title exists before adding a header.
  // Empty headers are not semantic and present accessibility challenges.
  if (isset($title) && $title !== '') {
    $output .= '<h3>' . $title . '</h3>';
  }

  if (!empty($items)) {
    $output .= "<$type" . drupal_attributes($attributes) . '>';
    $num_items = count($items);
    foreach ($items as $i => $item) {
      $attributes = array();
      $children = array();
      $data = '';
      if (is_array($item)) {
        foreach ($item as $key => $value) {
          if ($key == 'data') {
            $data = $value;
          }
          elseif ($key == 'children') {
            $children = $value;
          }
          else {
            $attributes[$key] = $value;
          }
        }
      }
      else {
        $data = $item;
      }
      if (count($children) > 0) {
        // Render nested list.
        $data .= theme_item_list(array('items' => $children, 'title' => NULL, 'type' => $type, 'attributes' => $attributes));
      }
      if ($i == 0) {
        $attributes['class'][] = 'first';
      }
      if ($i == $num_items - 1) {
        $attributes['class'][] = 'last';
      }
      $output .= '<li' . drupal_attributes($attributes) . '>' . $data . "</li>\n";
    }
    $output .= "</$type>";
  }
  return $output;
}