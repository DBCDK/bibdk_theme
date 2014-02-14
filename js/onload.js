// ****************************  CURSOR POSITIONS **************************** //
(function($){
  $(document).ready(function() {
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
    $('#bibdk-help-search-form #edit-search-help').filter(':visible').focus();
  });
})(jQuery);
