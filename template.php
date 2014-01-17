<?php

/**
 * Implements hook_css_alter().
 *
 * Unset Drupal CSS files we want to override
 * See: sass/drupal
 */
function bibdk_theme_css_alter(&$css) {
  unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.messages.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
  unset($css[drupal_get_path('module', 'user') . '/user.css']);
  unset($css[drupal_get_path('module', 'ding_facetbrowser') . '/css/facetbrowser.css']);
  unset($css['misc/vertical-tabs.css']);
}

/**
 * Implements hook_theme().
 */
function bibdk_theme_theme() {
  $path = drupal_get_path('theme', 'bibdk_theme') . '/templates/';
  return array(
    'bibdk_theme_work_info_tabs' => array(
      'path' => $path . '/views',
      'variables' => array('tabs' => ''),
      'template' => 'bibdk_theme_work_info_tabs',
      'render element' => 'elements',
    ),
    'bibdk_search_controls-select' => array(
      'path' => $path . '/blocks',
      'template' => 'bibdk_search_controls-select',
      'render element' => 'form',
    ),
    'bibdk_user_pass_reset' => array(
      'path' => $path . '/blocks',
      'template' => 'bibdk_user_pass_reset',
      'render element' => 'form',
    ),
    'bibdk_search_element' => array(
      'path' => $path . '/blocks',
      'template' => 'bibdk_custom_search-search-element-form',
      'render element' => 'form',
    ),
    'bibdk_openuserstatus_help_icon' => array(
      'path' => $path . '/blocks',
      'template' => 'bibdk_openuserstatus_help_icon',
      'render element' => 'form',
    ),
    'user_alert' => array(
      'path' => $path . '/blocks',
      'variables' => array('node' => NULL),
      'template' => 'user-alert',
      'render element' => 'elements',
    ),
  );
}

/**
 * Implements hook_page_alter().
 */
function bibdk_theme_page_alter(&$page) {
  // Remove search form rendered in content region by search module
  // Logged in
  if (!empty($page['content']['system_main']['content']['search_form'])) {
    unset($page['content']['system_main']['content']['search_form']);
  }
  // Not logged in
  if (!empty($page['content']['system_main']['search_form'])) {
    unset($page['content']['system_main']['search_form']);
  }
}

/**
 * Implements template_preprocess_html().
 */
function bibdk_theme_preprocess_html(&$variables) {

  switch (arg(0)) {
    case 'search':
    case 'user':
    case 'vejviser':
      $variables['classes_array'][] = 'lift-columns';
      break;

    case 'email':
      $variables['classes_array'][] = 'page-overlay';
      break;
  }
  if (arg(0) == 'wayf') {
    $variables['classes_array'][] = 'lift-columns';
  }

}

/**
 * Implements template_preprocess_page().
 */
function bibdk_theme_preprocess_page(&$variables) {

  // Add $logo and $logo_small to page.tpl
  $variables['logo'] = array(
    '#theme' => 'image',
    '#path' => drupal_get_path('theme', 'bibdk_theme') . '/img/dbc-logo-header.png',
    '#alt' => t('Bibliotek.dk - loan of books, music, and films'),
  );
  $variables['logo_small'] = array(
    '#theme' => 'image',
    '#path' => drupal_get_path('theme', 'bibdk_theme') . '/img/dbc-logo-footer.png',
    '#alt' => t('Bibliotek.dk - loan of books, music, and films'),
  );

  switch (arg(0)) {
    case 'reservation':
    case 'email':
      $variables['theme_hook_suggestions'][] = 'page__overlay';
      break;

    case 'vejviser':
      $variables['page']['content']['#prefix'] = '<div class="element-wrapper"><div class="element">';
      $variables['page']['content']['#suffix'] = '</div></div>';
      drupal_alter('vejviser_page_content', $variables['page']['content']);
      break;
  }

  // Create span# class for the content region
  if (!empty($variables['page']['sidebar'])) {
    $variables['content_span'] = "span19";
  }
  else {
    $variables['content_span'] = "span24";
  }
}

/**
 * Implements template_process_field
 */
function bibdk_theme_process_field(&$variables) {
  //Make field labels translatable the right way!
  $variables['label'] = isset($variables['label']) ? t($variables['label']) : NULL;
}

/**
 * Implements template_process_page().
 */
function bibdk_theme_process_page(&$variables) {
  if (arg(0) == 'search') {
    unset($variables['title']);
  }
  if (arg(0) == 'bibdk_frontpage') {
    unset($variables['title']);
  }
  if (arg(0) == 'node' && arg(1) == '') {
    unset($variables['title']);
  }
}

/**
 * Implements hook_form_alter().
 * One hook_form_alter() to rule them all:
 */
function bibdk_theme_form_alter(&$form, &$form_state, $form_id) {
  switch ($form_id) {
    case 'user_login':
      drupal_set_title(t('Log in'));
      _alter_user_login($form, $form_state, $form_id);
      _wrap_in_element($form);
      break;
    case 'user_pass':
      drupal_set_title(t('Request new password'));
      _alter_user_login($form, $form_state, $form_id);
      _wrap_in_element($form);
      break;
    case 'user_pass_reset':
      _alter_user_pass_reset($form, $form_state, $form_id);
      break;
    case 'user_profile_form':
      if (!in_array($form['#user_category'], array('bibdk_cart_list', 'bibdk_search_history', 'bibdk_openuserstatus'))) {
        _wrap_in_element($form);
      }
      break;
    case 'search_block_form':
      _alter_search_block_form($form, $form_state, $form_id);
      break;
    case 'bibdk_vejviser_form':
      _alter_bibdk_vejviser_form($form, $form_state, $form_id);
      break;
    case 'bibdk_help_search_form':
      _alter_bibdk_help_search_form($form, $form_state, $form_id);
      break;
    case 'ding_wayf_accept_form':
      _wrap_in_element($form);
      break;
    case 'bibdk_cart_get_form':
      _alter_bibdk_cart_form($form);
      break;
    case 'bibdk_openuserstatus_form':
      _alter_openuserstatus_tables($form);
      break;
    case 'bibdk_favourite_user_form_fields':
      _alter_bibdk_favourite_user_form_fields($form);
      break;
  }
}

function _alter_bibdk_favourite_user_form_fields(&$form) {
  $submit = $form['wrapper']['submit'];
  unset($form['wrapper']['submit']);
  $form['wrapper']['buttons'] = array(
    '#type'         => 'fieldset',
    '#tree'         => TRUE,
  );
  $form['wrapper']['buttons']['submit'] = $submit;
  $form['wrapper']['buttons']['button_close_popup_link']['#type'] = 'markup';
  $form['wrapper']['buttons']['button_close_popup_link']['#markup'] = l(
    t('label_close_popup', array(), array('context' => 'bibdk_favorite')),
    '#',
    $options = array(
      'attributes' => array(
        'class'=>array('button-close-popup'),
        'title'=> t('label_close_popup', array(), array('context' => 'bibdk_favorite')),
      ),
    )
  );
  $form['wrapper']['buttons']['button_close_popup_link']['#prefix'] = '<div class="close-link-wrapper btn btn-blue">';
  $form['wrapper']['buttons']['button_close_popup_link']['#suffix'] = '</div>';
}

function _alter_openuserstatus_tables(&$form) {
  $keys = array('loans', 'readyforpickup', 'reservations', 'fiscal');
  foreach ($keys as $key) {
    $form[$key]['#prefix'] = '<section><div class="element-wrapper"><div class="element"><div class="element-section"><div class="table"><a name="'.$key.'"></a>';
    $form[$key]['#suffix'] = '</div></div></div></div></section>';
  }

  $form['#prefix'] = '<div class="openuserstatus">';
  $form['#suffix'] = '</div>';
}

function _wrap_in_element(&$form) {
  $form['#prefix'] = '<div class="element-wrapper"><div class="element">';
  $form['#suffix'] = '</div></div>';
}

function _alter_user_login(&$form, &$form_state, $form_id) {
  unset($form['inputs']['name']['#description']);
  unset($form['inputs']['pass']['#description']);

  // move persistent login checkbox to actions
  if (isset($form['persistent_login'])) {
    // show checkbox BEFORE submit button
    $form['persistent_login']['#weight'] = -1;
    $form['actions']['remember_me'] = $form['persistent_login'];
    unset($form['persistent_login']);
  }
}

function _alter_user_pass_reset(&$form, &$form_state, $form_id) {
  $form['#theme'] = 'bibdk_user_pass_reset';
  // dpm(menu_build_tree('user-menu'));
  // http://api.drupal.org/api/drupal/includes!menu.inc/group/menu/7
}


function _alter_search_block_form(&$form, &$form_state, $form_id) {
  $form['search_block_form']['#maxlength'] = 1000;
  $form['#attributes']['class'] = array('search-form-horizontal');
  $form['search_block_form']['#weight'] = -2;
  $form['actions']['#weight'] = -1;

  // break elements into columns
  if (!$page_id = $form['page_id']['#default_value']){
    return;
  }

  switch($page_id){
    case 'bibdk_frontpage':
      _break_into_columns_expand('expand', 'sprog', 'term_language', 3, $form);
      break;
    case 'bibdk_frontpage/bog':
    case 'bibdk_frontpage/net':
    case 'bibdk_frontpage/artikel':
      _break_into_columns_expand('expand', 'sprog', 'term_language', 2, $form);
      break;
    case 'bibdk_frontpage/film':
      _break_into_columns_expand('main', 'nationalitet', 'term_nationality', 4, $form);
      _break_into_columns_expand('main', 'genre, type', 'term_genre', 5, $form);
      //_break_into_columns_expand('expand', 'materialetype', 'term_type', 2, $form);
      break;
    case 'bibdk_frontpage/spil':
      _break_into_columns_expand('main', 'platform', 'term_type', 2, $form);
      _break_into_columns_expand('main', 'spilgenre, type', 'dkcclphrase_lem', 3, $form);
      break;
    case 'bibdk_frontpage/musik':
      _break_into_columns_expand('main', 'musikgenre', 'term_genre', 4, $form);
      _break_into_columns_expand('expand', 'materiale', 'n/amateriale', 2, $form);
      break;
  }
}


function _break_into_columns($group, $parent_id, $id, $cnum, &$form) {
  if (!$cnum) {
    return false;
  }
  if (!empty($form['advanced']['bibdk_custom_search_element_' . $parent_id][$id])) {
    $slice = $form['advanced']['bibdk_custom_search_element_' . $parent_id][$id];
    /*if (isset($slice['#tree'])) {
      unset($slice['#tree']);
    }*/
    unset($form['advanced']['bibdk_custom_search_element_' . $parent_id][$id]);

    $len = round((sizeof($slice)) / $cnum); // $slice includes a #tree key
    if (!$len) {
      return false;
    }
    $n = $colkey = 0;
    foreach ($slice as $key => $val) {
      $snippets[$colkey][$key] = $val;
      $n++;
      if (floor($n / $len) == ($n / $len)) {
        $colkey++;
      }
    }
    if (sizeof($snippets) > $cnum) {
      $snippets[$colkey - 1] = $snippets[$colkey - 1] + $snippets[$colkey];
      unset($snippets[$colkey]);
    }
    foreach ($snippets as $key => $snippet) {
      $snippet['#type'] = 'container';
      $snippet['#attributes']['class'] = array('column column' . $key);
      $form['advanced']['bibdk_custom_search_element_' . $parent_id]['id']['column' . $key] = $snippet;
    }
  }
}

function _break_into_columns_expand($region, $group, $type, $cnum, &$form) {

  if (!$cnum) {
    return false;
  }

  if (isset($form['advanced'][$region][$group]) && is_array($form['advanced'][$region][$group])) {
    $parent_id = key($form['advanced'][$region][$group]);
    if (!empty($form['advanced'][$region][$group][$parent_id][$type])){
      $elements = &$form['advanced'][$region][$group][$parent_id][$type];
    } else {
      return false;
    }
  } else {
    return false;
  }
    $container = array();
    foreach ($elements as $key => $val) {
      if (preg_match('@container@', $key)){
        $container[$key] = $val;
        unset($elements[$key]);
      }
      if (preg_match('@#@', $key)){
        unset($elements[$key]);
      }
    }
    $len = round((sizeof($elements)) / $cnum); // $slice includes a #tree key
    if (!$len) {
      return false;
    }
    $n = $colkey = 0;

    foreach ($elements as $key => $val) {
        $snippets[$colkey][$key] = $val;
        $n++;
        if (floor($n / $len) == ($n / $len)) {
          $colkey++;
        }
    }
    if (sizeof($snippets) > $cnum) {
      $snippets[$colkey - 1] = $snippets[$colkey - 1] + $snippets[$colkey];
      unset($snippets[$colkey]);
    }
    $snippets[0] += $container;
    unset($elements);
    foreach ($snippets as $key => $snippet) {
      $snippet['#type'] = 'container';
      $snippet['#attributes']['class'] = array('column column' . $key);
      $elements['column' . $key] = $snippet;
    }
    $form['advanced'][$region][$group][$parent_id][$type] = $elements;
}

function _alter_bibdk_vejviser_form(&$form, &$form_state, $form_id) {
  $form['#attributes']['class'] = array('visuallyhidden', 'search-form-horizontal');
}

function _alter_bibdk_help_search_form(&$form, &$form_state, $form_id) {
  $form['#attributes']['class'] = array('search-form-horizontal');
}

/**
 * Adding prefix and suffix to bibdk_cart_view form
 *
 * @param $form
 */
function _alter_bibdk_cart_form(&$form) {
  if (isset($form['cart_table_secondary_actions']['actions'])) {
    $items = $form['cart_table_secondary_actions']['actions'];
    $new_items = array();

    foreach ($items as $key => $item) {
      $item['#prefix'] = '<div>';
      $item['#suffix'] = '</div>';
      $new_items[$key] = $item;
    }

    $form['cart_table_secondary_actions']['actions'] = $new_items;
  }
}

/* HOOK_FORM_ALTER END */


/** \brief Theme links given from agency
 *
 * @param array $variables
 * @return string (html unordered list)
 */
function bibdk_theme_ting_agency_tools($variables) {
  $branch = $variables['branch'];
  if (empty($branch)) {
    return;
  }
  $links = $branch->getActionLinks();
  $items = array();
  if (!empty($links)) {
    foreach ($links as $name => $link) {
      $item['data'] = l($name, $link, array('attributes' => array('target' => '_blank')));
      $items[] = $item;
    }
    return theme('item_list', array('items' => $items));
  }
}


/**
 * Overrides them_menu_link in order to add counter span to the cart menu item
 *
 * @param array $variables
 * @return string
 */
function bibdk_theme_menu_link(array$variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  if ($element['#original_link']['menu_name'] == 'menu-global-login-menu' && ($element['#title'] == t('items in cart', array(), array('context' => 'bibdk_frontend'))) && module_exists('bibdk_cart')) {
    $count = count(BibdkCart::getAll());
    $linkText = '<span class="cartcount">'.format_plural($count, '1 item in cart', '@count items in cart').'</span>';
    $element['#localized_options']['html'] = TRUE;
  }
  else {
    $linkText = $element['#title'];
  }

  $output = l($linkText, $element['#href'], $options = $element['#localized_options']);

  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function bibdk_theme_preprocess_links(&$links){

  if ($links['heading'] == t('export links')){
    $links['heading'] = '';
    foreach($links['links'] as $key => $link){
      $link['title'] = '<span class="icon icon-left icon-lightgrey-rightarrow">▼</span>' . $link['title'];
      $link['attributes']['class'] = array('text-small', 'text-darkgrey');
      $links['links'][$key] = $link;
    }
  }
}

function bibdk_theme_preprocess_bibdk_reservation_button(&$variables) {
  $variables['link_attributes']['class'][] = 'btn';
  $variables['link_attributes']['class'][] = (isset($variables['entity_type']) && $variables['entity_type'] == 'bibdkManifestation') ? 'btn-grey' : 'btn-blue';
  return $variables;
}

function bibdk_theme_preprocess_ting_openformat_manifestation(&$variables) {

  $variables['secondary_actions'] = array();
  if ($actions = $variables['actions']){
    foreach($actions as $key => $action){
      switch ($key){
        case 'reservation' :
          $actions[$key]['#prefix'] = '<div class="btn-wrapper">';
          $actions[$key]['#suffix'] = '</div>';
          break;
        case 'linkme' :
          $variables['secondary_actions'][$key] = $action;
          unset($actions[$key]);
          break;
        }
      }

  $variables['actions'] = $actions;
  }
}

/**
 * Override theme function for a CAPTCHA element.
 */
function bibdk_theme_captcha($variables) {
  $element = $variables['element'];
  if (!empty($element['#description']) && isset($element['captcha_widgets'])) {
    $element['captcha_widgets']['captcha_response']['#description'] = FALSE;
    $fieldset = array(
      '#type' => 'fieldset',
      '#title' => FALSE,
      '#description' => $element['#description'],
      '#children' => drupal_render_children($element),
      '#attributes' => array('class' => array('captcha')),
    );
    return theme('fieldset', array('element' => $fieldset));
  }
  else {
    return '<div class="captcha">' . drupal_render_children($element) . '</div>';
  }
}

function bibdk_theme_preprocess_link(&$links){
  if($links['text'] == t('litteratursiden_link', array(), array('context' => 'bibdk_reviews'))){
    $links['text'] = '<span class="icon icon-left icon-darkgrey-infomedia">&nbsp;</span>' . t('litteratursiden_link', array(), array('context' => 'bibdk_reviews'));
  }

}
