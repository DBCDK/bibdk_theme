<?php

/**
 * Implements hook_css_alter().
 *
 * Unset Drupal CSS files we want to override
 * See: sass/drupal
 */
function bibdk_theme_css_alter(&$css) {
  unset($css['modules/system/system.base.css']);
  unset($css['modules/system/system.messages.css']);
  unset($css['modules/system/system.theme.css']);
  unset($css['modules/system/system.menus.css']);
  unset($css['misc/vertical-tabs.css']);
  unset($css['modules/user/user.css']);
  unset($css['profiles/bibdk/modules/ding_facetbrowser/css/facetbrowser.css']);
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
 * Implements hook_hjs_alter
 * put javascript in footer of page to avoid page blocking 
 */
function bibdk_theme_js_alter(&$javascript) {
  foreach ($javascript as $key => &$js ) {
    $js['scope'] = 'footer';
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

  _bibdk_theme_create_user_sidebar($variables);

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

  // break language up in columns : language, frontpage
  _break_into_columns_expand('a54a7813-741a-f3d4-615d-e60a322df4be', '95788824-6d40-ebd4-8912-ce2194f48d62', 3, $form);
  // language all other search pages
  _break_into_columns('a54a7813-741a-f3d4-615d-e60a322df4be', '95788824-6d40-ebd4-8912-ce2194f48d62', 3, $form);

  // language, books
  // _break_into_columns('03d3d960-f884-1fe4-2db0-52e51ac82a6e', '4ed2c5d5-656b-be14-b55f-fbc7c1aff047', 2, $form);
  _break_into_columns_expand('03d3d960-f884-1fe4-2db0-52e51ac82a6e', '4ed2c5d5-656b-be14-b55f-fbc7c1aff047', 2, $form);

  // language, articles
  _break_into_columns('553e8edb-bbb1-c6e4-5574-8182d8ed4e15', '12a1e89e-1274-a394-a12a-588d3abde6e9', 3, $form);
  #_break_into_columns_expand('553e8edb-bbb1-c6e4-5574-8182d8ed4e15', '12a1e89e-1274-a394-a12a-588d3abde6e9', 3, $form);

  // nationality, film
  _break_into_columns('26707474-294f-1c34-e50b-f7831578913d', '8e7bda97-5430-9774-e54c-4d2b0005a06b', 4, $form);
  // genre type, film
  _break_into_columns('ae797962-8b73-3044-31d3-6eebde66c95f', 'f81d0c50-5f4b-d1f4-f11f-c000c901c841', 5, $form);
  // material type, film
  // _break_into_columns_expand('1458f855-531f-b484-1df2-1c7762dc339b', 'f79c6d0f-effe-6944-7951-211d70e904d7', 2, $form);

  // material type, net
  _break_into_columns('66d1dd8d-2742-7d64-8d4c-ab7f601a7916', '819ed112-ec85-8f64-2573-a5a88f7ac3d9', 2, $form);
  // language, net
  _break_into_columns_expand('553e8edb-bbb1-c6e4-5574-8182d8ed4e15', '12a1e89e-1274-a394-a12a-588d3abde6e9', 2, $form);

  // genre, games
  _break_into_columns('7c3bfbbf-3038-9ca4-952a-85f9785337e2', 'fbeb5556-778a-ab64-2522-89eeef2793eb', 4, $form);

  // genre, music
  _break_into_columns('57308136-ba7d-8224-19af-26b0f6567f77', 'e8258795-3bbe-5e34-fda2-04a8b420d93f', 4, $form);
  // material type, music
  _break_into_columns_expand('05b8e136-f60b-65d4-edd0-56c69d20ce8d', '604357bb-a73b-65c4-11d8-cf798b7eabe1', 2, $form);

}


function _break_into_columns($parent_id, $id, $cnum, &$form) {
  if (!$cnum) {
    return false;
  }
  if (!empty($form['advanced']['bibdk_custom_search_element_' . $parent_id][$id])) {
    $slice = $form['advanced']['bibdk_custom_search_element_' . $parent_id][$id];
    if (isset($slice['#tree'])) {
      unset($slice['#tree']);
    }
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
      $form['advanced']['bibdk_custom_search_element_' . $parent_id]['column' . $key] = $snippet;
    }
  }
}

function _break_into_columns_expand($parent_id, $id, $cnum, &$form) {
  if (!$cnum) {
    return false;
  }
  if (!empty($form['advanced']['expand']['bibdk_custom_search_element_' . $parent_id][$id])) {
    $slice = $form['advanced']['expand']['bibdk_custom_search_element_' . $parent_id][$id];
    if (isset($slice['#tree'])) {
      unset($slice['#tree']);
    }
    unset($form['advanced']['expand']['bibdk_custom_search_element_' . $parent_id][$id]);
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
      $form['advanced']['expand']['bibdk_custom_search_element_' . $parent_id]['column' . $key] = $snippet;
    }
  }
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

function bibdk_theme_menu_tree__menu_global_login_menu(&$variables) {
  return "<ul class='horizontal-nav clearfix'>" . $variables['tree'] . "</ul>";
}

/** \brief set sidebar block for user pages
 *
 * @global type $user
 * @param type $variables
 */
function _bibdk_theme_create_user_sidebar(&$variables) {
  /*   * **** SIDEBAR ***** */
  // only set sidebar on user pages
  if (strpos(current_path(), 'user') !== 0) {
    unset($variables['page']['sidebar']);
  }
  else if (strpos(current_path(), 'user/reset') === 0) {
    $tree = menu_build_tree('user-menu');
    $data = array_shift($tree);
    foreach ($data['below'] as $link) {
      $item['#theme'] = 'menu_local_task';
      $item['#link'] = $link['link'];
      $user_menu[] = $item;
    }
    $variables['page']['sidebar']['bibdk_frontend_bibdk_tabs']['#primary'] = $user_menu;
  }
  else {
    global $user;
    if (!$user->uid && isset($variables['tabs']['#primary'])) {
      $variables['page']['sidebar']['bibdk_frontend_bibdk_tabs']['#primary'] = $variables['tabs']['#primary'];
    }
    else {
      if (isset($variables['page']['sidebar']['bibdk_frontend_bibdk_tabs']['#primary'])) {
        unset($variables['page']['sidebar']['bibdk_frontend_bibdk_tabs']['#primary']);
      }
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
