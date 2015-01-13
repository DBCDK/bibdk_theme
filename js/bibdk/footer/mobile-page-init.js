/**
 * @file
 * Init mobile page functionality for work view
 */
(function($){
  var mobilepage = MobilePage().init();
  Drupal.behaviors.modalPage = {
    attach: function(context, settings){
      $('.mobile-page').click(function(e){
        if (mobilepage.open(this)){
          $('#mainwrapper').addClass('hide');
        }
      });
    }
  };
})(jQuery);
