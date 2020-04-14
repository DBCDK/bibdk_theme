<?php

function bibdk_theme_form_system_theme_settings_alter(&$form, $form_state) {
  $form['background'] = array(
    '#type' => 'fieldset',
    '#title' => t('Background Image Settings'),
    '#weight' => 0
  );

  // Background Image elements
  $form['background']['background_image'] = array(
    '#type' => 'managed_file',
    '#title' => t('Background Image'),
    '#description' => t('Choose a file (jpeg jpg, max 1MB'),
    '#upload_validators' => array(
      'file_validate_extensions' => array('jpg jpeg'),
      'file_validate_size' => array(1*1024*1024)
    ),
    '#upload_location' => 'public://bibdk_background_images/',
    '#default_value' => theme_get_setting('background_image'),
  );
  $form['background']['background_image_title'] = array(
    '#type' => 'textfield',
    "#title" => t('Image title'),
    '#default_value' => theme_get_setting('background_image_title'),
  );
}
