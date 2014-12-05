/**
 * @file
 *
 * This file handles events that are binded to form elements
 */

(function($) {
  Drupal.behaviors.formEvents = {
    attach: function(context, settings) {
      $('#bibdk-modal input[type="text"], input[type="password"]').each(function(key, item){
        $(this).parent().on('click', function(e){
          $('input', this).focus();
        })
      });
    }
  };
})(jQuery);
