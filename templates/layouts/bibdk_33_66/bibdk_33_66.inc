<?php

/**
 * Implements hook_panels_layouts().
 */
function bibdk_theme_bibdk_33_66_panels_layouts() {
  return array(
    'bibdk_33_66' => array(
      'title' => t('Bibdk: Two columns (sidebar left)'),
      'category' => t('Bibdk'),
      'icon' => '33_66.gif',
      'theme' => 'panels_bibdk_33_66',
      'css' => '33_66.css',
      'regions' => array(
        'top' => t('Top'),
        'middle' => t('Middle'),
        'left' => t('Left'),
        'bottom' => t('Bottom'),
      ),
    ),
  );
}

// Plugin definition

