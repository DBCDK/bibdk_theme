<?php

/**
 * Implements hook_panels_layouts().
 */
function bibdk_theme_bibdk_33_66_search_result_panels_layouts() {
  return array(
    'bibdk_33_66_search_result' => array(
      'title' => t('Bibdk search result: Two columns (facets, controls and search result)'),
      'category' => t('Bibdk'),
      'icon' => '33_66_search_result.gif',
      'theme' => 'panels_bibdk_33_66_search_result',
      'css' => '33_66_search_result.css',
      'regions' => array(
        'top' => t('Top'),
        'works_controls_top' => t('Works controls, Top'),
        'works' => t('Search results'),
        'works_controls_bottom' => t('Works controls, Bottom'),
        'facets' => t('Facets'),
        'bottom' => t('Bottom'),
      ),
    ),
  );
}

// Plugin definition

