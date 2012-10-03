<?php

// Plugin definition
$plugin = array(
  'title' => t('Bibdk: Two column'),
  'category' => t('Bibdk'),
  'icon' => 'bibdk_twocolumn.png',
  'theme' => 'panels_bibdk_twocolumn',
  'css' => 'bibdk_twocolumn.css',
  'regions' => array(
    'middle' => t('Middle'),
    'left' => t('Left'),
  ),
);
