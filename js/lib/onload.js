// ****************************  CURSOR POSITIONS **************************** //
// After edit, run gulp build

(function ($) {

  onLoad = {
    setFocus: function() {
      // Do not go any further if we're on a touch device.
      if (Modernizr.touch) {
        // TO DO: Modernizr.touch resisters as true on PC.
        // return;
      }
      // Set focus on page load, not later AJAX calls.
      $('form#search-block-form input[name="search_block_form"]')
        .not('.page-search form#search-block-form input[name="search_block_form"], .page-vejviser form#search-block-form input[name="search_block_form"]')
        .once('search-block-form-focus', function (context) {
          $(this).each(function(index, element) {
            element.focus();
          });
      });
      // Helpdesk popup
      $('.page-overlay-helpdesk')
      .find('input[type=text], textarea')
      .filter(':visible:first')
      .each(function(index, element) {
        $(this).focus();
      });        
      // User login form
      $('form#user-login')
      .find('input[type=text],input[type=email], textarea')
      .filter(':visible:first')
      .each(function(index, element) {
        $(this).focus();
      });
      // Create new account
      $('form#user-register-form')
      .find('input[type=text],input[type=email], textarea')
      .filter(':visible:first')
      .each(function(index, element) {
        $(this).focus();
      });
      // Request new password
      $('form#user-pass')
      .find('input[type=text],input[type=email], textarea')
      .filter(':visible:first')
      .each(function(index, element) {
        $(this).focus();
      });
      // User help popup
      $('.page-overlay-help')
      .find('input[type=text], textarea')
      .filter(':visible:first')
      .each(function(index, element) {
        $(this).focus();
      });        
      // Newsroom popup
      $('.page-overlay-newsroom')
      .find('input[type=text], textarea')
      .filter(':visible:first')
      .each(function(index, element) {
        $(this).focus();
      });
    }
  };

  Drupal.behaviors.initCursors = {
    attach: function (context) {
      onLoad.setFocus();
    }
  };

}(jQuery));
