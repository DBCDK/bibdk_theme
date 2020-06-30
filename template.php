<?php

/**
 * Implements hook_css_alter().
 *
 * Unset Drupal CSS files we want to override
 * See: sass/drupal
 */
function bibdk_theme_css_alter(&$css) {
  unset($css[drupal_get_path('module', 'eu_cookie_compliance') . '/css/eu_cookie_compliance.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.base.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.messages.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.theme.css']);
  unset($css[drupal_get_path('module', 'system') . '/system.menus.css']);
  unset($css[drupal_get_path('module', 'user') . '/user.css']);
  unset($css[drupal_get_path('module', 'user_alert') . '/css/user-alert.css']);
  unset($css[drupal_get_path('module', 'bibdk_help') . '/css/bibdk_help.css']);
  unset($css[drupal_get_path('module', 'ctools') . '/css/modal.css']);
  unset($css[drupal_get_path('module', 'bibdk_search_carousel') . '/css/slick.css']);
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
        'logo_title' => 'string',
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
      ),
    ),
    'link_with_svg' => array(
      'path' => $path . 'global',
      'template' => 'link-with-svg',
      'variables' => array(
        'text' => '',
        'path' => '',
        'options' => array(),
        'svg' => '',
      ),
    ),
    'span_with_svg' => array(
      'path' => $path . 'global',
      'template' => 'span-with-svg',
      'variables' => array(
        'content' => '',
        'attributes' => array(),
        'svg' => '',
        'title' => '',
      ),
    ),
    'button_with_svg' => array(
      'path' => $path . 'global',
      'template' => 'button-with-svg',
      'variables' => array(
        'name' => '',
        'value' => '',
        'label' => '',
        'attributes' => array(),
        'svg' => '',
      ),
    ),
    'bibdk_foot_bar' => array(
      'path' => $path . 'footer',
      'template' => 'bibdk-footer',
      'variables' => array(
        'menu' => '',
        'footer_menu_links' => '',
        'home_path' => '',
        'footerlogo_path' => '',
        'logo_path' => '',
        'links' => array(),
        'overlay' => FALSE,
      ),
    ),
    'bibdk_icon' => array(
      'path' => $path . 'elements',
      'template' => 'bibdk-icon',
      'variables' => array(
        'text' => '',
        'icon' => '',
        'title' => '',
      ),
    ),
  );
}

function bibdk_theme_preprocess_bibdk_icon(&$vars) {
  $svg_list = array(
    'book' => 'media-book',
    'literature' => 'media-book',
    'online' => 'media-emat',
    'movie' => 'media-movie',
    'music' => 'media-music',
    'article' => 'media-article',
    'periodical' => 'media-periodical',
    'note' => 'media-note', // jgn: hvad er det? sheetmusic? ("node"?)
    'audiobook' => 'media-audiobook',
    'sheetmusic' => 'media-sheetmusic',
    'star' => 'star',
    'none' => 'media-none',
  );
  $icon_type = is_array($vars['icon']) ? reset($vars['icon']) : $vars['icon'];
  $icon = isset($svg_list[$icon_type]) ? $svg_list[$icon_type] : 'media-none';
  $vars['icon'] = $icon;
}

/**
 * @param array $vars
 */
function bibdk_theme_preprocess_pager_first(&$vars) {
  $vars['text'] = t('pager_first', array(), array('context' => 'bibdk_theme'));
  $vars['parameters']['icon']['markup'] = '<svg class="svg-arrow-first"><use xlink:href="#svg-arrow-first" xmlns:xlink="http://www.w3.org/1999/xlink"/></svg>';
  $vars['parameters']['icon']['position'] = 'suffix';
}

/**
 * @param array $vars
 */
function bibdk_theme_preprocess_pager_next(&$vars) {
  $vars['text'] = t('pager_next >', array(), array('context' => 'bibdk_theme'));
  $vars['parameters']['icon']['markup'] = '<svg class="svg-arrow-right"><use xlink:href="#svg-arrow-right" xmlns:xlink="http://www.w3.org/1999/xlink"/></svg>';
  $vars['parameters']['icon']['position'] = 'suffix';
}

/**
 * @param array $vars
 */
function bibdk_theme_preprocess_pager_previous(&$vars) {
  $vars['text'] = t('< pager_previous ', array(), array('context' => 'bibdk_theme'));
  $vars['parameters']['icon']['markup'] = '<svg class="svg-arrow-left"><use xlink:href="#svg-arrow-left" xmlns:xlink="http://www.w3.org/1999/xlink"/></svg>';
  $vars['parameters']['icon']['position'] = 'prefix';
}

/**
 * Override theme_pager_link()
 * @param $variables
 */
function bibdk_theme_pager_link($variables) {
  $text = $variables['text'];
  $page_new = $variables['page_new'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $attributes = $variables['attributes'];
  $icon = isset($parameters['icon']) ? $parameters['icon'] : array();
  unset($parameters['icon']);
  $prefix = $suffix = '';


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
  if (!empty($text)) {
    $attributes['title'] = strip_tags($text);
  }

  $attributes['href'] = url($_GET['q'], array('query' => $query, 'fragment'=>'content'));

  if (isset($icon['position']) && isset($icon['markup'])) {
    switch ($icon['position']) {
        case 'prefix':
            $prefix = '<a' . drupal_attributes($attributes) . ' data-pager="icon">' . $icon['markup'] . '</a>';
            break;
        case 'suffix':
            $suffix = '<a' . drupal_attributes($attributes) . ' data-pager="icon">' . $icon['markup'] . '</a>';
            break;
    }
  }

  return $prefix . '<a' . drupal_attributes($attributes) . ' data-pager="text">' . check_plain($text) . '</a>' . $suffix;
}

/**
 * Implements hook_preprocess_block().
 */
function bibdk_theme_preprocess_block(&$vars) {
  // Save module and delta as $block_id (unique identifier)
  $block_id = $vars['elements']['#block']->module . '-' . $vars['elements']['#block']->delta;
}


/**
 * Override theme_feed_icon()
 * @param $variables
 */
function bibdk_theme_feed_icon($variables) {
  $text = t('Subscribe to !feed-title', array('!feed-title' => $variables['title']));
  $rss_link = array(
    '#theme' => 'link',
    '#text' => $text,
    '#path' => $variables['url'],
    '#options' => array(
      'attributes' => array('class' => array('icon', 'feed-icon'), 'title' => $text),
      'html' => false,
    ),
  );
  return drupal_render($rss_link);
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

  drupal_add_library('system', 'jquery.form', TRUE);

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

  $topbar = _bibdk_theme_get_bibdk_topbar($overlay);
  $vars['page_topbar'] = drupal_render($topbar);

  //add the page footer
  $foot = _bibdk_theme_get_bibdk_foot_bar($overlay);
  $vars['page_footer'] = drupal_render($foot);

  // Provide path to theme
  $vars['bibdk_theme_path'] = $base_url . '/' . drupal_get_path('theme', 'bibdk_theme');
}

/**
 * Rendering of the bibdk footer
 *
 * @param bool $overlay Flag that indicated whether we're on a overlay page.
 *
 * @return string rendered HTML based on the bibdk-footer.tpl.php
 * @see bibdk-footer.tpl.php
 */
function _bibdk_theme_get_bibdk_foot_bar($overlay) {
  global $base_url;

  $home_path = url('<front>');
  $footerlogo_path = $base_url . '/' . drupal_get_path('theme', 'bibdk_theme') . '/img/dbc-logo-footer-nopayoff.png';
  $footer_menu = _bibdk_theme_get_footer_bar_menu();

  $foot_bar = array(
    '#theme' => 'bibdk_foot_bar',
    '#footer_menu_links' => drupal_render($footer_menu),
    '#home_path' => $home_path,
    '#footerlogo_path' => $footerlogo_path,
    '#overlay' => $overlay,
  );
  return $foot_bar;
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

  $main_links = array();
  $mypage_links = array();
  if ($user->uid) {
    $mypage_links += _bibdk_theme_get_my_page_menu_links();
  }

  $menu_name = ($language->prefix == 'eng') ? 'menu-offcanvas-menu-eng' : 'menu-offcanvas-menu-da';
  $main_links += menu_navigation_links($menu_name);

  $menu_links = _bibdk_theme_merge_menulinks($mypage_links, $main_links);

  $menu = _bibdk_theme_get_offcanvas_menu_list($menu_links, array('class' => array('off-canvas-list')));

  $footer_menu = _bibdk_theme_get_footer_menu_for_offcanvas();

  $home_path = rtrim(url(''), 'da');
  $logo_path = $base_url . '/' . drupal_get_path('theme', 'bibdk_theme') . '/img/dbc-logo-header-nopayoff.png';

  $links = _bibdk_theme_get_topbar_links();

  $topbar = array(
    '#theme' => 'bibdk_topbar',
    '#menu' => drupal_render($menu),
    '#footer_menu' => drupal_render($footer_menu),
    '#home_path' => $home_path,
    '#logo_path' => $logo_path,
    '#logo_title' => t('Go to frontpage'),
    '#links' => $links,
    '#overlay' => $overlay,
  );

  return $topbar;
}

/**
 * Merges the two links arrays into one array.
 * Certain manipulation of the links will happen in this method as well.
 *
 * @param array $mypage_links
 * @param array $main_links
 * @return array
 */
function _bibdk_theme_merge_menulinks($mypage_links, $main_links) {
  if (!empty($mypage_links)) {
    foreach ($main_links as $key => $link) {
      //remove the cart link as it is defined in the $mypage_menu
      if (array_search('user/cart', $link, TRUE)) {
        unset($main_links[$key]);
      }
    }
  }

  $menu_links = $mypage_links + $main_links;

  return $menu_links;
}

/**
 * @return mixed
 */
function _bibdk_theme_get_my_page_menu_links() {
  global $user;
  $common = array(
    'class' => array('offcanvas-my-page-link'),
  );

  $links = array();

  $mypage_links = module_invoke_all('mypage_link');
  $mypage_links['user/%user/edit'] = array(
    'title' => t('Account'),
    'href' => "user/$user->uid",
    'weight' => 33,
  );

  uasort($mypage_links, 'drupal_sort_weight');

  $hide_on_small = array(
    'user/%user/searchhistory',
    'user/%user/edit',
    'user/%user/settings'
  );

  // GDPR (and DDB) demands that we hide the user id.
  if (module_exists('me')) {
    $alias = me_variable_get('me_alias');
  }
  $useruid = 0;
  foreach ($mypage_links as $path => $item) {
    if (isset($alias) && $alias !== FALSE) {
      $useruid = $alias;
    }
    $mypath = str_replace('%user', $useruid, $path);
    $links[$mypath] = array(
      'title' => $item['title'],
      'href' => $mypath,
      'attributes' => $common
    );

    if (in_array($path, $hide_on_small)) {
      $links[$mypath]['attributes']['class'][] = 'show-for-medium-up';
    }
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
  global $base_url;

  $links[] = array(
    '#theme' => 'link_with_svg',
    '#text' => t('Spørg en bibliotekar'),
    // Temporarily disable popup, and use external link instead
    //'#path' => 'https://adm.biblioteksvagten.dk/embed/ask-question',
    '#path' => 'https://adm.biblioteksvagten.dk/embed/ask-question?agency_id=bibliotek.dk&agency_mail=servicedesk%40dbc.dk&require_postal_code=true&popup=n&url=https%3A%2F%2Fbibliotek.dk',
    '#options' => array(
      'attributes' => array(
        'class' => array('visible-for-large-up'),
        // Temporarily disable popup, and use external link instead, open imn new tab
        'target' => '_blank',
        'data-rel' => array('helpdesk'),
      ),
    ),
    '#prefix' => '<span class="external" >',
    '#suffix' => '</span>',
    '#svg' => 'svg-chat',
  );

  $links[] = array(
    '#theme' => 'link_with_svg',
    '#text' => t('Videnskabelige artikler'),
    '#path' => 'http://statsbiblioteket.dk/videnskabeligeartikler/',
    '#options' => array(
      'attributes' => array(
        'class' => array('visible-for-large-up'),
        'target' => array('_blank'),
        'data-rel' => array('helpdesk'),
      ),
    ),
    '#prefix' => '<span class="external" >',
    '#suffix' => '</span>',
    '#svg' => 'svg-media-article',
  );

  if ($user->uid) {
    $links[] = array(
      '#theme' => 'link_with_svg',
      '#text' => t('My page', array(), array('context' => 'bibdk_frontend')),
      '#path' => 'user',
      '#options' => array(
        'attributes' => array(
          'id' => array('topbar-my-page-link'),
          'class' => array('visible-for-large-up'),
        ),
      ),
      '#svg' => 'svg-user',
    );
  }
  else {
    $links[] = array(
      '#theme' => 'link_with_svg',
      '#text' => t('Log ind'),
      '#path' => 'user/login',
      '#svg' => 'svg-user',
      '#options' => array(
        'attributes' => array(
          'class' => array('visible-for-large-up'),
        ),
      ),
    );
  }
  $links[] = array(
    '#theme' => 'link_with_svg',
    '#text' => t('Menu'),
    '#href' => '#',
    '#svg' => 'svg-menu',
    '#options' => array(
      'attributes' => array(
        'class' => array('right-off-canvas-toggle'),
      ),
    ),
  );

  return drupal_render($links);
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
 * Returns the footer bar menu styled in a list ready for display within the
 * footer bar
 *
 * @return string
 */
function _bibdk_theme_get_footer_bar_menu() {
  global $language;

  $footer_menu_name = ($language->prefix == 'eng') ? 'menu-footer-menu-eng' : 'menu-footer-menu-da';
  $footer_menu_links = menu_navigation_links($footer_menu_name);
  $footer_menu_links = _bibdk_theme_preprocess_footer_menu_language_links($footer_menu_links);
  return _bibdk_theme_get_offcanvas_menu_list($footer_menu_links, array('class' => array('footer-tab-bars')));

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
 *
 * @return string rendered output
 * @see bibdk-links-list.tpl.php
 */
function _bibdk_theme_get_offcanvas_menu_list($links, $ul_attributes = array()) {
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
 * Implements template_ie6nomore_browser().
 */
function bibdk_theme_preprocess_ie6nomore_browser(&$vars) {
  // reset version for browser
  $vars['version'] = '';
}

/**
 * Implements template_preprocess_page().
 */
function bibdk_theme_preprocess_page(&$vars) {

  $front = NULL;

  // bibdk_usersettings may not be loaded at this point
  if (function_exists('bibdk_usersettings_user_settings_get')) {
    $front = bibdk_usersettings_user_settings_get('bibdk_custom_search_start_page', NULL);
  }

  if (!$front) {
    $front = '<front>';
  }

  // Bibliotek.dk background image and image caption
  $vars['page']['image_url'] = $vars['page']['image_title'] = NULL;
  $fid = theme_get_setting('background_image');
  if (!empty($fid)) {
    $file = file_load($fid);
    $url = file_create_url($file->uri);
    $vars['page']['image_url'] = $url;
    $vars['page']['image_title'] = theme_get_setting('background_image_title');;
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
      break;
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
    case 'bibdk_help_search_form':
      _alter_bibdk_help_search_form($form, $form_state, $form_id);
      break;
    case 'ding_wayf_accept_form':
      _wrap_in_element($form);
      break;
    case 'user_register_form':
      _alter_user_register_form($form, $form_state);
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
      _wrap_in_element($form);
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
    case 'bibdk_facetbrowser_form':
      _alter_bibdk_facetbrowser_form($form);
      break;

  }


}

/**
 * hook_form_alter() callback
 *
 * @param array $form
 * @see bibdk_theme_form_alter()
 */
function _alter_bibdk_facetbrowser_form(&$form) {
  $prefix['prefix']['#type'] = 'container';
  $prefix['prefix']['#attributes']['id'] = array('facetbrowser-icon-container');
  $prefix['prefix']['#attributes']['class'] = array('dropdown-icon-container');
  $prefix['prefix']['arrow_down']['#markup'] = '
    <svg class="svg-icon svg-arrow-down">
      <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-down"></use>
    </svg>
  ';
  $form = array_merge($prefix, $form);
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
  // Make a container around login-methods to make it stylable
  $form['login_methods']['#type'] = 'container';
  $form['login_methods']['helptxt'] =
    array(
      '#type' => 'html_tag',
      '#tag' => 'div',
      '#value' => t('user_login_help_txt', array(), array('options' => array('context' => 'bibdk_provider'))),
      '#attributes' => array(
        'class' => array(
          'bibliotekdk-login-helptxt'
        )
      ),
      '#weight' => -3,
    );

  $form['login_methods']['#attributes'] = array(
      'class' => array('bibdk-login-methods')
  );
  $form['login_methods']['#weight'] = -2;

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

  // Avoid duplicate element id in dom.
  $form['actions']['submit']['#attributes'] = array('id' => 'bibdk-login-submit');

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
  // Set advanced dropdown on work landing pages.
  $position = strpos($page_id, 'work/');
  if ($position !== false) {
    $page_id = 'bibdk_frontpage';
  }

  switch ($page_id) {
    case 'bibdk_frontpage':
      _break_into_columns_expand('expand', 'sprog', 'n/asprog', 3, $form);
      break;
    case 'bibdk_frontpage/bog':
      _break_into_columns_expand('expand', 'sprog', 'n/asprog', 2, $form);
      break;
    case 'bibdk_frontpage/net':
      _break_into_columns_expand('expand', 'materialetype', 'term_accessType=online', 2, $form);
      _break_into_columns_expand('expand', 'sprog', 'n/asprog', 2, $form);
      break;
    case 'bibdk_frontpage/artikel':
      _break_into_columns_expand('expand', 'sprog', 'n/asprog', 2, $form);
      break;
    case 'bibdk_frontpage/film':
      _break_into_columns_expand('main', 'nationalitet', 'term_nationality', 4, $form);
      _break_into_columns_expand('main', 'genre, type', 'term_genre', 5, $form);
      break;
    case 'bibdk_frontpage/spil':
      _break_into_columns_expand('main', 'platform', 'n/aplatform', 2, $form);
      _break_into_columns_expand('main', 'spilgenre, type', 'term_subject', 3, $form);
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
    return FALSE;
  }
  if (!empty($form['advanced']['bibdk_custom_search_element_' . $parent_id][$id])) {
    $slice = $form['advanced']['bibdk_custom_search_element_' . $parent_id][$id];
    unset($form['advanced']['bibdk_custom_search_element_' . $parent_id][$id]);

    $len = round((sizeof($slice)) / $cnum); // $slice includes a #tree key
    if (!$len) {
      return FALSE;
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
    return FALSE;
  }
  if (isset($form['advanced'][$region][$group]) && is_array($form['advanced'][$region][$group])) {
    $parent_id = key($form['advanced'][$region][$group]);
    if (!empty($form['advanced'][$region][$group][$parent_id][$type])) {
      $elements = &$form['advanced'][$region][$group][$parent_id][$type];
    }
    else {
      return FALSE;
    }
  }
  else {
    return FALSE;
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
    return FALSE;
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

function _alter_bibdk_help_search_form(&$form, &$form_state, $form_id) {
  $form['#attributes']['class'] = array('search-form-horizontal');
}

/**
 * ALter the user register form.
 *
 * @param $form
 */
function _alter_user_register_form(&$form, $form_state) {
  $form['account']['mail']['#attributes']['placeholder'] = t('E-mail');
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
function bibdk_theme_menu_link($vars) {

  $element = $vars['element'];
  $sub_menu = '';
  $linkText = $element['#title'];

  if (!empty($element['#below'])) {
    $sub_menu = drupal_render($element['#below']);
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
        case 'linkme' :
          $vars['secondary_actions'][$key] = $action;
          unset($actions[$key]);
          break;
      }
    }
    $vars['actions'] = $actions;
  }

  // unset #theme for volume and section, so drupal does not render the field
  // but still renders the subfield
  if(isset($vars['fields']['bibdk_mani_volume'])) {
    unset($vars['fields']['bibdk_mani_volume']['#theme']);
  }
  if(isset($vars['fields']['bibdk_mani_section'])) {
    unset($vars['fields']['bibdk_mani_section']['#theme']);
  }
}

/**
 * Implements hook_preprocess_HOOK().
 *
 * @param $link
 */
function bibdk_theme_preprocess_link(&$link) {
  if ($link['text'] == t('litteratursiden_link', array(), array('context' => 'bibdk_reviews'))) {
    $link['text'] = '<span class="icon icon-left icon-darkgrey-infomedia">&nbsp;</span>' . t('litteratursiden_link', array(), array('context' => 'bibdk_reviews'));
  }

  if (!empty($link['options']['svg'])) {
    $link['text'] = '<svg class="' . $link['options']['svg'] . '"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#' . $link['options']['svg'] . '"></use></svg>' . $link['text'];
    $link['options']['html'] = TRUE;
  }
}

/**
 * Implements hook_preprocess_ting_openformat_work().
 *
 * Add icons to tabs
 *
 * @param $vars
 */
function bibdk_theme_preprocess_ting_openformat_collection(&$vars) {
  if (!empty($vars['types'])) {
    foreach($vars['types']['#items'] as $type) {
      $icon = array(
        '#theme' => 'bibdk_icon',
        '#icon' => $type,
        '#title' => t($type, array(), array('context' => 'svg-icons')),
      );
      $vars['types']['#items'][$type] = drupal_render($icon);
    }
  }
}


/**
 * Implements hook_preprocess_ting_openformat_work().
 *
 * Add Slick recommender scripts.
 * @See also: bibdk_recommender
 * @See also: ting_openformat/theme/ting_openformat_work.tpl.php
 *
 * @param $vars
 */
function bibdk_theme_preprocess_ting_openformat_work(&$vars) {

  $path = drupal_get_path('module', 'bibdk_recommender');
  drupal_add_js($path . '/js/bibdk_recommender.js');
  drupal_add_js($path . '/js/bibdk_recommender_covers.js');
  drupal_add_css($path . '/css/bibdk_recommender.css');

  $path = drupal_get_path('module', 'slick');
  drupal_add_js($path . '/js/slick.load.min.js');

  drupal_add_library('slick', 'slick');

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
