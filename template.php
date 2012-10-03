<?php

// Render a template with a set of variables
/* function render($type, $template, $vars = array()){
  ob_start();
  extract($vars);
  include('templates/' . $type . '/' . $template . '.php');
  } */

// Format array of tags as links
function format_tags($tags) {

  $elements = array();

  foreach ($tags as $tag) {
    $elements[] = '<a href="#">' . $tag . '</a>';
  }

  $output = implode('&nbsp;/&nbsp;', $elements);

  return $output;
}

function bibdk_theme_form_bibdk_vejviser_form_alter(&$form) {
  $form['#attributes'] = array('class' => array('visuallyhidden'));
}

function bibdk_form_search_block_form_alter(&$form, &$form_alter) {
  $form['search_block_form']['#attributes']['class'] = array('clearfix');
  $form['actions']['submit']['#attributes']['class'] = array('btn', 'btn-blue', 'btn-fixed-size');
  $form['actions']['#weight'] = -10;
  $form['search_block_form']['#weight'] = - 12;
}

function bibdk_theme_menu_tree__menu_global_user_menu(&$variables) {
  return "<ul class='horizontal-nav clearfix'>" . $variables['tree'] . "</ul>";
}

// function bibdk_theme_menu_tree__user_help_topbar_menu(&$variables) {
//   return "<ul class='menu horizontal-nav clearfix'>" . $variables['tree'] . "</ul>";
// }

function bibdk_theme_preprocess_block(&$variables){
  if($variables['block_html_id'] == 'block-locale-language'){
    #kpr($variables);
  }
}

function bibdk_theme_preprocess_page(&$variables) {

	$footer_logo = theme_get_setting('bibdk_theme_footer_logo');
	if (!empty($footer_logo)) {
	  $variables['footer_logo'] = file_create_url(drupal_get_path('theme', 'bibdk_theme') . '/' . $footer_logo);
	}

}


