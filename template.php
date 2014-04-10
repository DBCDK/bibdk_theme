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
  unset($css[drupal_get_path('module', 'ting_search_carousel') . '/css/ting_search_carousel.css']);
  unset($css[drupal_get_path('module', 'user_alert') . '/css/user-alert.css']);
  unset($css[drupal_get_path('module', 'ctools') . '/css/modal.css']);
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
 * Implements hook_preprocess_block().
 */
function bibdk_theme_preprocess_block(&$vars) {
  // Save module and delta as $block_id (unique identifier)
  $block_id = $vars['elements']['#block']->module . '-' . $vars['elements']['#block']->delta;
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
function bibdk_theme_preprocess_html(&$vars) {

  switch (arg(0)) {
    case 'email':
      $vars['classes_array'][] = 'page-overlay';
      break;
  }

}

/**
 * Implements template_preprocess_page().
 */
function bibdk_theme_preprocess_page(&$vars) {

  $vars['bibdk_theme_path'] = drupal_get_path('theme', 'bibdk_theme');

  $vars['logo_header'] = array(
    '#theme' => 'image',
    '#path' => $vars['bibdk_theme_path'] . '/img/dbc-logo-header.png',
    '#alt' => t('Bibliotek.dk - loan of books, music, and films'),
  );

  $vars['logo_header_link'] = array(
    '#theme' => 'link',
    '#text' => drupal_render($vars['logo_header']),
    '#path' => '<front>',
    '#options' => array(
      'attributes' => array(
        'title' => t('Home'),
      ),
      'html' => TRUE,
    ),
  );

  $vars['logo_footer'] = array(
    '#theme' => 'image',
    '#path' => $vars['bibdk_theme_path'] . '/img/dbc-logo-footer.png',
    '#alt' => t('Bibliotek.dk - loan of books, music, and films'),
  );

  $vars['logo_footer_link'] = array(
    '#theme' => 'link',
    '#text' => drupal_render($vars['logo_footer']),
    '#path' => '<front>',
    '#options' => array(
      'attributes' => array(
        'title' => t('Home'),
      ),
      'html' => TRUE,
    ),
  );


  switch (arg(0)) {
    case 'reservation':
    case 'email':
      $vars['theme_hook_suggestions'][] = 'page__overlay';
      break;

    case 'vejviser':
      $vars['page']['content']['#prefix'] = '<div class="element-wrapper"><div class="element">';
      $vars['page']['content']['#suffix'] = '</div></div>';
      drupal_alter('vejviser_page_content', $vars['page']['content']);
      break;
  }

}


/**
 * Implements template_process_field
 */
function bibdk_theme_process_field(&$vars) {
  //Make field labels translatable the right way!
  $vars['label'] = isset($vars['label']) ? t($vars['label']) : NULL;
}


/**
 * Implements template_process_page().
 */
function bibdk_theme_process_page(&$vars) {
  if (arg(0) == 'search') {
    unset($vars['title']);
  }
  if (arg(0) == 'bibdk_frontpage') {
    unset($vars['title']);
  }
  if (arg(0) == 'node' && arg(1) == '') {
    unset($vars['title']);
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
    case 'user_register_form':
      _wrap_in_element($form);
      break;
    case 'bibdk_cart_get_form':
      _alter_bibdk_cart_form($form);
      break;
    case 'bibdk_openuserstatus_form':
      drupal_set_title(t('Userstatus'));
      _alter_openuserstatus_tables($form);
      break;
    case 'bibdk_favourite_user_form_fields':
      _alter_bibdk_favourite_user_form_fields($form);
      break;
    case 'bibdk_usersettings_user_settings_form':
      drupal_set_title(t('Settings'));
      _wrap_in_element($form);
      break;
    case 'bibdk_favourite_get_favourites_form':
      drupal_set_title(t('Favourites'));
      break;
    case 'bibdk_mypage_form':
      drupal_set_title(t('My page'));
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
/* bug16981: missing popup close button - put in template instead
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
*/
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
  // Add placeholders
  $form['name']['#attributes']['placeholder'] = t('Username');
  $form['pass']['#attributes']['placeholder'] = t('Password');

  // Remove descriptions
  unset($form['name']['#description']);
  unset($form['pass']['#description']);

  // move persistent login checkbox to actions
  if (isset($form['persistent_login'])) {
    // show checkbox BEFORE submit button
    $form['persistent_login']['#weight'] = -1;
    $form['actions']['persistent_login'] = $form['persistent_login'];
    unset($form['persistent_login']);
  }
}

function _alter_user_pass_reset(&$form, &$form_state, $form_id) {
  $form['#theme'] = 'bibdk_user_pass_reset';
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
      _break_into_columns_expand('expand', 'sprog', 'n/asprog', 3, $form);
      break;
    case 'bibdk_frontpage/bog':
    case 'bibdk_frontpage/net':
    case 'bibdk_frontpage/artikel':
      _break_into_columns_expand('expand', 'sprog', 'term_language', 2, $form);
      break;
    case 'bibdk_frontpage/film':
      _break_into_columns_expand('main', 'nationalitet', 'term_nationality', 4, $form);
      _break_into_columns_expand('main', 'genre, type', 'term_genre', 5, $form);
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
 * @param array $vars
 * @return string (html unordered list)
 */
function bibdk_theme_ting_agency_tools($vars) {
  $branch = $vars['branch'];
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
 * @param array $vars
 * @return string
 */
function bibdk_theme_menu_link(array$vars) {
  $element = $vars['element'];
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

/**
 * Implements theme_links__locale_block().
 *
 * Remove active language from language switcher
 */
function bibdk_theme_links__locale_block($vars) {
  global $language;
  unset($vars['links'][$language->language]);
  unset($vars['theme_hook_suggestion']);
  return theme('links', $vars);
}

function bibdk_theme_preprocess_bibdk_reservation_button(&$variables) {
  $variables['link_attributes']['class'][] = 'btn';
  $variables['link_attributes']['class'][] = (isset($variables['entity_type']) && $variables['entity_type'] == 'bibdkManifestation') ? 'btn-grey' : 'btn-blue';
  return $variables;
}

function bibdk_theme_preprocess_ting_openformat_manifestation(&$vars) {

  $vars['secondary_actions'] = array();
  if ($actions = $vars['actions']){
    foreach($actions as $key => $action){
      switch ($key){
        case 'reservation' :
          $actions[$key]['#prefix'] = '<div class="btn-wrapper">';
          $actions[$key]['#suffix'] = '</div>';
          break;
        case 'linkme' :
          $vars['secondary_actions'][$key] = $action;
          unset($actions[$key]);
          break;
        }
      }

  $vars['actions'] = $actions;
  }
}

/**
 * Override theme function for a CAPTCHA element.
 */
function bibdk_theme_captcha($vars) {
  $element = $vars['element'];
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



/**
 * theme_status_messages().
 *
 * Return HTML for status messages.
 */
function bibdk_theme_status_messages($vars) {
  $display = $vars['display'];
  $output = '';

  foreach (drupal_get_messages($display) as $type => $messages) {
    foreach ($messages as $message) {
      $output .= "<div class=\"message message--$type\">";
      $output .= $message;
      $output .= "</div>";
    }
  }

  return $output;
}
