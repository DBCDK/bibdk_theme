/**
 * @file
 *
 * This file handles events that are binded to form elements
 */

(function($) {
  Drupal.behaviors.formEvents = {
    attach: function(context, settings) {
      $('input[type="text"], input[type="password"], input[type="email"], input[type="number"]').each(function(key, item){
        $(this).parent().on('click', function(e){
          $('input', this).focus();
        })
      });
    }
  };
})(jQuery);
