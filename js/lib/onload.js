// ****************************  CURSOR POSITIONS **************************** //
var onLoad = {};

onLoad.setFocus = function() {
  //Do not go any further if we're on a touch device
  if(Modernizr.touch) {
    return;
  }
  // Default in search block form - unless it's a search result.
  $('form#search-block-form input[name="search_block_form"]').not('.page-search form#search-block-form input[name="search_block_form"], .page-vejviser form#search-block-form input[name="search_block_form"]').focus();
  // Helpdesk popup
  $('.page-overlay-helpdesk').find('input[type=text], textarea').filter(':visible:first').focus();
  // User login form
  $('form#user-login').find('input[type=text], textarea').filter(':visible:first').focus();
  // Create new account
  $('form#user-register-form').find('input[type=text], textarea').filter(':visible:first').focus();
  // Request new password
  $('form#user-pass').find('input[type=text], textarea').filter(':visible:first').focus();
  // User help popup
  $('.page-overlay-help').find('input[type=text], textarea').filter(':visible:first').focus();
  // Newsroom popup
  $('.page-overlay-newsroom').find('input[type=text], textarea').filter(':visible:first').focus();
};

(function($) {
  $(document).ready(function() {
    onLoad.setFocus();
  });
})(jQuery);
