<?php

/**
 * Implements hook_panels_layouts().
 */
function bibdk_theme_bibdk_100_panels_layouts() {

  return array(
    'bibdk_100' => array(
      'title' => t('Bibdk: Single column (no sidebar)'),
      'category' => t('Bibdk'),
      'icon' => '100.gif',
      'theme' => 'panels_bibdk_100',
      'css' => '100.css',
      'regions' => array(
        'top' => t('Top'),
        'middle' => t('Middle'),
        'bottom' => t('Bottom'),
      ),
    ),
  );
}