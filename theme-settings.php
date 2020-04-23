<?php

function bibdk_theme_form_system_theme_settings_alter(&$form, $form_state) {

  $bg_image = theme_get_setting('background_image');
  $settings_theme = $form_state['build_info']['args'][0];
  // BUG: Force file to be permanent.
  if (!empty($bg_image)) {
    _fix_permanent_image('background_image', $settings_theme);
  }

  $form['background'] = array(
    '#type' => 'fieldset',
    '#title' => t('Background Image Settings', array(), array('options' => array('context' => 'bibdk_theme'))),
    '#weight' => 0
  );

  // Background Image elements
  $form['background']['background_image'] = array(
    '#type' => 'managed_file',
    '#title' => t('Background Image', array(), array('options' => array('context' => 'bibdk_theme'))),
    '#description' => t('Choose a file (jpeg jpg, max 1MB', array(), array('options' => array('context' => 'bibdk_theme'))),
    '#upload_validators' => array(
      'file_validate_extensions' => array('jpg jpeg'),
      'file_validate_size' => array(1*1024*1024)
    ),
    '#upload_location' => 'public://',
    '#default_value' => theme_get_setting('background_image'),
  );
  $form['background']['background_image_title'] = array(
    '#type' => 'textfield',
    "#title" => t('Image title', array(), array('options' => array('context' => 'bibdk_theme'))),
    '#default_value' => theme_get_setting('background_image_title'),
  );
}

function _fix_permanent_image($image, $theme) {
  $fid = theme_get_setting($image, $theme);
  if ($fid > 0) {
    $file = file_load($fid);
    if (is_object($file) && $file->status == 0) {
      $file->status = FILE_STATUS_PERMANENT;
      file_save($file);
      file_usage_add($file, $theme, 'theme', 1);
      $message = t($image . 'saved permanently.', array(), array('options' => array('context' => 'bibdk_theme')));
      drupal_set_message($massage, 'status');
    }
  }
}
