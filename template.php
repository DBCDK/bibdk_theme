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
  unset($css[drupal_get_path('module', 'bibdk_help') . '/css/bibdk_help.css']);
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
      'path' => $path . 'views',
      'variables' => array('tabs' => ''),
      'template' => 'bibdk_theme_work_info_tabs',
      'render element' => 'elements',
    ),
    'bibdk_user_pass_reset' => array(
      'path' => $path . 'blocks',
      'template' => 'bibdk_user_pass_reset',
      'render element' => 'form',
    ),
    'user_alert' => array(
      'path' => $path . 'blocks',
      'variables' => array('node' => NULL),
      'template' => 'user-alert',
      'render element' => 'elements',
    ),
    'bibdk_topbar' => array(
      'path' => $path . 'topbar',
      'template' => 'bibdk-topbar',
      'variables' => array(
        'menu' => 'string',
        'footer_menu' => 'string',
        'home_path' => 'string',
        'logo_path' => 'string',
        'links' => array(),
        'overlay' => 'bool',
      ),
    ),
    'bibdk_links_list' => array(
      'path' => $path . 'topbar',
      'template' => 'bibdk-links-list',
      'variables' => array(
        'attributes' => array(),
        'items' => array(),
        'label' => NULL,
      ),
    ),
  );
}

/**
 * @param array $vars
 */
function bibdk_theme_preprocess_pager_next(&$vars) {
  $vars['text'] = t('pager_next >', array(), array('context' => 'bibdk_theme'));
}

/**
 * @param array $vars
 */
function bibdk_theme_preprocess_pager_previous(&$vars) {
  $vars['text'] = t('< pager_previous ', array(), array('context' => 'bibdk_theme'));
}

/**
 * @param array $vars
 */
function bibdk_theme_preprocess_pager_first(&$vars) {
  $vars['text'] = t('pager_first', array(), array('context' => 'bibdk_theme'));
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
 * - Removing the default search form
 * - Adds static JS to the footer
 */
function bibdk_theme_page_alter(&$page) {
  global $base_url;
  // Remove search form rendered in content region by search module
  // Logged in
  if (!empty($page['content']['system_main']['content']['search_form'])) {
    unset($page['content']['system_main']['content']['search_form']);
  }
  // Not logged in
  if (!empty($page['content']['system_main']['search_form'])) {
    unset($page['content']['system_main']['search_form']);
  }

  $footer = $base_url . '/' . drupal_get_path('theme', 'bibdk_theme') . '/build/js/footer.js';
  drupal_add_js($footer, array(
    'scope' => 'footer',
    'weight' => 0,
    'cache' => TRUE,
    'every_page' => TRUE
  ));
}

/**
 * Implements template_preprocess_html().
 */
function bibdk_theme_preprocess_html(&$vars) {
  global $base_url;
  $overlay = FALSE;

  switch (arg(0)) {
    case 'overlay':
    case 'reservation':
    case 'email':
    case 'adhl':
      $vars['classes_array'][] = 'page-overlay';
      $overlay = TRUE;
      break;
  }

  //add the topbar
  $vars['page_topbar'] = drupal_render(_bibdk_theme_get_bibdk_topbar($overlay));

  // Provide path to theme
  $vars['bibdk_theme_path'] = $base_url . '/' . drupal_get_path('theme', 'bibdk_theme');
}

/**
 * Rendering of the bibdk topbar including the offcanvas menu.
 *
 * @param bool $overlay Flag that indicated whether we're on a overlay page.
 *
 * @return string rendered HTML based on the bibdk-topbar.tpl.php
 * @see bibdk-topbar.tpl.php
 */
function _bibdk_theme_get_bibdk_topbar($overlay) {
  global $user, $language, $base_url;
  $menu_links = array();
  if ($user->uid) {
    $menu_links += _bibdk_theme_get_my_page_menu_links();
  }

  $menu_name = ($language->prefix == 'eng') ? 'menu-offcanvas-menu-eng' : 'menu-offcanvas-menu-da';
  $menu_links += menu_navigation_links($menu_name);
  $label = NULL;

  if ($user->uid) {
    $label = t('My page', array(), array('context' => 'bibdk_frontend'));
  }

  $menu = _bibdk_theme_get_offcanvas_menu_list($menu_links, array('class' => array('off-canvas-list')), $label);

  $footer_menu = _bibdk_theme_get_footer_menu_for_offcanvas();

  $home_path = url('<front>');
  $logo_path = $base_url . '/' . drupal_get_path('theme', 'bibdk_theme') . '/img/dbc-logo-header-nopayoff.png';

  $links = _bibdk_theme_get_topbar_links();

  $topbar = array(
    '#theme' => 'bibdk_topbar',
    '#menu' => drupal_render($menu),
    '#footer_menu' => drupal_render($footer_menu),
    '#home_path' => $home_path,
    '#logo_path' => $logo_path,
    '#links' => $links,
    '#overlay' => $overlay,
  );

  return $topbar;
}

/**
 * @return mixed
 */
function _bibdk_theme_get_my_page_menu_links() {
  global $user;
  $common = array(
    'class' => array('offcanvas-my-page-link')
  );

  $links = array();
  $links['my_page'] = array(
    'title' => t('My page', array(), array('context' => 'bibdk_frontend')),
    'href' => "user/$user->uid",
    'attributes' => $common
  );

  $mypage_links = module_invoke_all('mypage_link');
  uasort($mypage_links, 'drupal_sort_weight');

  foreach ($mypage_links as $path => $item) {
    $path = str_replace('%user', $user->uid, $path);
    $links[$path] = array(
      'title' => $item['title'],
      'href' => $path,
      'attributes' => $common
    );
  }

  $links['logout'] = array(
    'title' => t('Logout'),
    'href' => "user/logout",
    'attributes' => $common
  );

  return $links;
}

/**
 * Returns static topbar menu links. Depending on if the user is logged or not
 * a log in link or 'my page' link will be shown.
 *
 * @return array
 */
function _bibdk_theme_get_topbar_links() {
  global $user;
  $links = array();
  $links[] = l(t('Spørg Biblioteksvagten'), 'overlay/helpdesk', array(
    'attributes' => array(
      'class' => array('bibdk-popup-link'),
      'data-rel' => array('helpdesk'),
    )
  ));

  if ($user->uid) {
    $links[] = l(t('My page'), 'user', array(
      'attributes' => array(
        'id' => array('topbar-my-page-link'),
      ),
    ), array(
      'context' => 'bibdk_frontend'
    ));
  }
  else {
    $links[] = l(t('Log ind'), 'user/login');
  }

  return $links;
}

/**
 * Returns the footer menu styled in a un-ordered list ready for display within
 * the offcanvas menu
 *
 * @return string
 */
function _bibdk_theme_get_footer_menu_for_offcanvas() {
  global $language;

  $footer_menu_name = ($language->prefix == 'eng') ? 'menu-footer-menu-eng' : 'menu-footer-menu-da';
  $footer_menu_links = menu_navigation_links($footer_menu_name);
  $footer_menu_links = _bibdk_theme_preprocess_footer_menu_language_links($footer_menu_links);
  return _bibdk_theme_get_offcanvas_menu_list($footer_menu_links, array('class' => array('off-canvas-footer-menu')));
}

/**
 * Rewrite the links to point to an actual langugage.
 *
 * @param array $links
 * @return array mixed
 */
function _bibdk_theme_preprocess_footer_menu_language_links($links) {
  global $base_url;
  foreach ($links as &$link) {
    if ($link['title'] == 'English') {
      $link['href'] = $base_url . '/eng';
    }
    if ($link['title'] == 'Dansk') {
      $link['href'] = $base_url . '/da';
    }
  }
  return $links;
}

/**
 * Render an unordered list with menu items. The list will be based on the
 * bibdk-links-list.tpl.
 *
 * @param array $links array with the links that should be printed in the
 * offcanvas menu.
 * @param array $ul_attributes attributes for the containing <ul> element.
 * @param bool|string $label
 *
 * @return string rendered output
 * @see bibdk-links-list.tpl.php
 */
function _bibdk_theme_get_offcanvas_menu_list($links, $ul_attributes = array(), $label = FALSE) {
  global $base_url;
  $items = array();

  foreach ($links as $key => $link) {
    if (strpos($link['href'], 'overlay') !== FALSE) {
      $link['attributes']['class'][] = 'bibdk-popup-link';
    }

    if (strpos($link['href'], 'login') !== FALSE) {
      $link['attributes']['class'][] = 'offcanvas-login';
    }

    if (strpos($link['href'], 'http', 0) !== FALSE && strpos($link['href'], $base_url, 0) === FALSE) {
      $link['attributes']['target'][] = '_blank';
    }

    $link['attributes']['title'] = $link['title'];
    $item['link'] = l($link['title'], $link['href'], array('attributes' => $link['attributes']));
    $item['li_attributes'] = _bibdk_theme_offcanvas_set_li_attributes($link);
    $items[] = $item;
  }

  return array(
    '#theme' => 'bibdk_links_list',
    '#attributes' => $ul_attributes,
    '#items' => $items,
    '#label' => $label,
  );
}

/**
 * Set attributes on a list item (<li>) that contains a link.
 *
 * @param $link
 * @return array
 */
function _bibdk_theme_offcanvas_set_li_attributes($link) {
  $attributes = array();
  $devicetypes = isset($link['devicetypes']) ? $link['devicetypes'] : array();

  if (!empty($devicetypes)) {
    foreach ($devicetypes as $type => $value) {
      if ($value === 0) {
        $type = str_replace('devicesize_', '', $type);
        $attributes['class'][] = "hide-for-$type-only";
      }
    }
  }

  return $attributes;
}

/**
 * Implements template_preprocess_page().
 */
function bibdk_theme_preprocess_page(&$vars) {

  $front = bibdk_usersettings_user_settings_get('bibdk_custom_search_start_page', null);

  if (!$front) {
    $front = '<front>';
  }

  global $language;
  $language_default = language_default();
  $lang_obj = $language;

  // Remove language prefix on logo link if default language
  if ($language_default->language == $language->language) {
    $lang_obj = $language_default;
    unset($lang_obj->prefix);
  }

  if (!$vars['is_front'] && !empty($vars['page']['content']['user_alert_user_alert'])) {
    unset($vars['page']['content']['user_alert_user_alert']);
  }

  $vars['bibdk_theme_path'] = drupal_get_path('theme', 'bibdk_theme');

  $vars['logo_footer'] = array(
    '#theme' => 'image',
    '#path' => $vars['bibdk_theme_path'] . '/img/dbc-logo-footer.png',
    '#alt' => t('Bibliotek.dk - loan of books, music, and films'),
  );

  $vars['logo_footer_link'] = array(
    '#theme' => 'link',
    '#text' => drupal_render($vars['logo_footer']),
    '#path' => $front,
    '#options' => array(
      'attributes' => array(
        'title' => t('Home'),
      ),
      'language' => $lang_obj,
      'html' => TRUE,
    ),
  );

  switch (arg(0)) {
    case 'overlay':
    case 'reservation':
    case 'email':
    case 'adhl':
      $vars['theme_hook_suggestions'][] = 'page__overlay';
    case 'vejviser':
      $vars['page']['content']['#prefix'] = '<div class="vejviser-search-result">';
      $vars['page']['content']['#suffix'] = '</div>';
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
      if (!in_array($form['#user_category'], array(
        'bibdk_cart_list',
        'bibdk_search_history',
        'bibdk_openuserstatus'
      ))
      ) {
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
      //_wrap_in_element($form);
      break;
    case 'bibdk_favourite_get_favourites_form':
      drupal_set_title(t('Favourites'));
      break;
    case 'bibdk_mypage_form':
      drupal_set_title(t('My page'));
      break;

  }
}

/**
 * hook_form_alter() callback
 *
 * @param array $form
 * @see bibdk_theme_form_alter()
 */
function _alter_bibdk_favourite_user_form_fields(&$form) {
  $submit = $form['wrapper']['submit'];
  unset($form['wrapper']['submit']);
  $form['wrapper']['buttons'] = array(
    '#type' => 'fieldset',
    '#tree' => TRUE,
  );
  $form['wrapper']['buttons']['submit'] = $submit;
}

/**
 * hook_form_alter() callback
 *
 * @param array $form
 * @see bibdk_theme_form_alter()
 */
function _alter_openuserstatus_tables(&$form) {
  $keys = array('loans', 'readyforpickup', 'reservations', 'fiscal');
  foreach ($keys as $key) {
    $form[$key]['#prefix'] = '<section><div class="element-wrapper"><div class="element"><div class="element-section"><div class="table"><a name="' . $key . '"></a>';
    $form[$key]['#suffix'] = '</div></div></div></div></section>';
  }

  $form['#prefix'] = '<div class="openuserstatus">';
  $form['#suffix'] = '</div>';
}

/**
 * hook_form_alter() callback
 *
 * @param array $form
 * @see bibdk_theme_form_alter()
 */
function _wrap_in_element(&$form) {
  $form['#prefix'] = '<div class="element-wrapper"><div class="element">';
  $form['#suffix'] = '</div></div>';
}

/**
 * hook_form_alter() callback
 *
 * @param array $form
 * @param array $form_state
 * @param string $form_id
 * @see bibdk_theme_form_alter()
 */
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

/**
 * hook_form_alter() callback
 *
 * @param array $form
 * @param array $form_state
 * @param string $form_id
 * @see bibdk_theme_form_alter()
 */
function _alter_user_pass_reset(&$form, &$form_state, $form_id) {
  $form['#theme'] = 'bibdk_user_pass_reset';
}

/**
 * hook_form_alter() callback
 *
 * @param array $form
 * @param array $form_state
 * @param array $form_id
 * @see bibdk_theme_form_alter()
 */
function _alter_search_block_form(&$form, &$form_state, $form_id) {

  $form['search_block_form']['#maxlength'] = 1000;
  $form['#attributes']['class'] = array('search-form-horizontal');
  $form['search_block_form']['#weight'] = -2;
  $form['actions']['#weight'] = -1;

  // search result ranking contron on front page
  $path = current_path();
  $form_state['build_info']['args'] = array('sort');
  if (strpos($path, 'bibdk_frontpage') === 0) {
    $form['search_controls_sort'] = array(
      'fieldset' => array(
        '#type' => 'fieldset',
        '#attributes' => array(
          'id' => drupal_html_id('edit-search-controls-sort'),
          'class' => array('bibdk-search-controls-form bibdk-search-controls-sort-front'),
          'data-control-name' => 'controls_search_sort',
          'data-control-path' => $path,
        ),
        'sort_form' => drupal_retrieve_form('bibdk_search_controls_form', $form_state),
      ),
    );
  }

  // break elements into columns
  if (empty($form['page_id']['#value']) || !$page_id = $form['page_id']['#value']) {
    return;
  }

  switch ($page_id) {
    case 'bibdk_frontpage':
      _break_into_columns_expand('expand', 'sprog', 'n/asprog', 3, $form);
      break;
    case 'bibdk_frontpage/bog':
    case 'bibdk_frontpage/net':
    case 'bibdk_frontpage/artikel':
      _break_into_columns_expand('expand', 'sprog', 'n/asprog', 2, $form);
      break;
    case 'bibdk_frontpage/film':
      _break_into_columns_expand('main', 'nationalitet', 'term_nationality', 4, $form);
      _break_into_columns_expand('main', 'genre, type', 'term_genre', 5, $form);
      break;
    case 'bibdk_frontpage/spil':
      _break_into_columns_expand('main', 'platform', 'term_type', 2, $form);
      _break_into_columns_expand('main', 'spilgenre, type', 'dkcclterm_em', 3, $form);
      break;
    case 'bibdk_frontpage/musik':
      _break_into_columns_expand('main', 'musikgenre', 'term_genre', 4, $form);
      _break_into_columns_expand('expand', 'materiale', 'n/amateriale', 2, $form);
      break;
  }

}

/**
 * @param $group
 * @param $parent_id
 * @param $id
 * @param $cnum
 * @param $form
 * @return bool
 */
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

/**
 * @param $region
 * @param $group
 * @param $type
 * @param $cnum
 * @param $form
 * @return bool
 */
function _break_into_columns_expand($region, $group, $type, $cnum, &$form) {

  if (!$cnum) {
    return false;
  }

  if (isset($form['advanced'][$region][$group]) && is_array($form['advanced'][$region][$group])) {
    $parent_id = key($form['advanced'][$region][$group]);
    if (!empty($form['advanced'][$region][$group][$parent_id][$type])) {
      $elements = &$form['advanced'][$region][$group][$parent_id][$type];
    }
    else {
      return false;
    }
  }
  else {
    return false;
  }
  $container = array();
  foreach ($elements as $key => $val) {
    if (preg_match('@container@', $key)) {
      $container[$key] = $val;
      unset($elements[$key]);
    }
    if (preg_match('@#@', $key)) {
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
  $form['#attributes']['class'] = array('hidden', 'search-form-horizontal');
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

/**
 * Theme links given from agency
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
  else {
    $linkText = $element['#title'];
  }

  $output = l($linkText, $element['#href'], $options = $element['#localized_options']);

  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Implements theme_links__locale_block().
 * Remove active language from language switcher
 *
 * @param array $vars
 * @return string
 */
function bibdk_theme_links__locale_block($vars) {
  global $language;
  unset($vars['links'][$language->language]);
  unset($vars['theme_hook_suggestion']);
  return theme('links', $vars);
}

/**
 * Implements hook_preprocess_HOOK().
 *
 * @param array $variables
 * @return mixed
 */
function bibdk_theme_preprocess_bibdk_reservation_button(&$variables) {
  $variables['link_attributes']['class'][] = 'btn';
  $variables['link_attributes']['class'][] = (isset($variables['entity_type']) && $variables['entity_type'] == 'bibdkManifestation') ? 'btn-grey' : 'btn-blue';
}

/**
 * Implements hook_preprocess_HOOK().
 *
 * @param array $vars
 */
function bibdk_theme_preprocess_ting_openformat_manifestation(&$vars) {

  $vars['secondary_actions'] = array();
  if ($actions = $vars['actions']) {
    foreach ($actions as $key => $action) {
      switch ($key) {
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
 * Implements hook_preprocess_HOOK().
 *
 * @param array $links
 */
function bibdk_theme_preprocess_links(&$links) {
  if ($links['heading'] == t('export links')) {
    $links['heading'] = '';
    foreach ($links['links'] as $key => $link) {
      $link['title'] = '<span class="icon icon-left icon-lightgrey-rightarrow">▼</span>' . $link['title'];
      $link['attributes']['class'] = array('text-small', 'text-darkgrey');
      $links['links'][$key] = $link;
    }
  }
}

/**
 * Implements hook_preprocess_HOOK().
 *
 * @param $links
 */
function bibdk_theme_preprocess_link(&$links) {
  if ($links['text'] == t('litteratursiden_link', array(), array('context' => 'bibdk_reviews'))) {
    $links['text'] = '<span class="icon icon-left icon-darkgrey-infomedia">&nbsp;</span>' . t('litteratursiden_link', array(), array('context' => 'bibdk_reviews'));
  }
}

/**
 * Override theme function for a CAPTCHA element.
 *
 * @param array $vars
 * @return string
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

/**
 * theme_status_messages().
 *
 * @param array $vars
 * @return string HTML for status messages.
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
