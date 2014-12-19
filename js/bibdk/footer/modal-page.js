/**
 * @file
 *
 * This file handles events that are binded to form elements
 */
(function($){

  // @todo convert into jquery plugin
  MobilePage = {
    pageSelector: '#modal-page-content',
    placeholderSelector: '#modal-page-placeholder',
    init: function(){
      if ($(this.pageSelector).length == 0){
        $('body').prepend('<div id="modal-page-wrapper" class="mobile-page-wrapper"><div class="close">×</div><div id="modal-page-content"></div></div>');
        $('#modal-page-wrapper .close').click(function () {MobilePage.close()});
      }
    },
    open: function(selector){
      if (this.isUsingMobilePage(selector)){
        this.addPlaceholder(selector);
        $(this.pageSelector).html($(selector));
        return true;
      }
    },
    close: function(){
      console.log(this, 'close');
      $(this.placeholderSelector).replaceWith($(this.pageSelector).children());
      $('#mainwrapper').removeClass('hide');
    },
    addPlaceholder: function(selector){
      var placeholder = document.createElement('div');
      placeholder.setAttribute('id', 'modal-page-placeholder');
      $(selector).after(placeholder);
    },
    isUsingMobilePage: function(selector){
      if (matchMedia(Foundation.media_queries.medium).matches || $(selector).parents(this.pageSelector).length > 0){
        return false;
      }
      return true;
    }
  };

  MobilePage.init();

  Drupal.behaviors.modalPage = {
    attach: function(context, settings){
      $('.mobile-page').click(function(e){
        if (MobilePage.open(this)){
          $('#mainwrapper').addClass('hide');
        }
      });
    }
  };


})(jQuery);
