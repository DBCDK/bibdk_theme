(function ($) {

/**
 * Add a "Show password" checkbox to each password field.
 * See: https://www.drupal.org/project/password_toggle
 *      (drupal_add_js don't work on modal windows)
 */
Drupal.behaviors.showPassword = {
  attach: function (context) {
    // Create the checkbox.
    var showPassword = $('<div class="form-item form-type-checkbox form-password-toggle"><label class="password-toggle"><input type="checkbox" class="input-password-toggle"/>' + Drupal.t('Show password') + '</label></div>');
    // Add click handler to checkboxes.
    $(':checkbox', showPassword).click(function () {
      var orig;
      var copy;
      var wrap;
      if ($(this).is(':checked')) {
        // Copy original field and convert it to a simple textfield.
        orig = $(this).parent().parent().prev().find(':password');
        copy = $('<input type="text" />');
      }
      else {
        // Copy original field and convert it to a password field.
        orig = $(this).parent().parent().prev().find('.show-password');
        copy = $('<input type="password" />');
      }
      // Replace currently displayed field with the modified copy and re-assign
      // all attributes. Thanks to IE we have to go this way.
      $(copy).attr('id', $(orig).attr('id'));
      $(copy).attr('class', $(orig).attr('class'));
      $(copy).attr('size', $(orig).attr('size'));
      $(copy).attr('maxlength', $(orig).attr('maxlength'));
      $(copy).attr('name', $(orig).attr('name'));
      $(orig).replaceWith($(copy).toggleClass('show-password').val($(orig).val()));
    });
    // Add checkbox to all password field on the current page.
    showPassword.insertAfter($('form[id="user-login"] .form-type-password', context));
    showPassword.insertAfter($('form[id="user-login-block"] .form-type-password', context));
    showPassword.insertAfter($('form[id="user-register"] .form-type-password', context));
    showPassword.insertAfter($('form[id="user-profile-form"] .form-type-password', context));
  }
};

})(jQuery);
