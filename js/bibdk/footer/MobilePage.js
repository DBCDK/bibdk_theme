/**
 * @file
 * Module for creating mobile pages as overlays
 */

var MobilePage;

(function($){
  MobilePage = function MobilePage(){

    /**
     * Private methods and variables
     */
    var pageSelector = '#modal-page-content';
    var placeholderSelector = '#modal-page-placeholder';

    function addPlaceholder(selector){
      var placeholder = document.createElement('div');
      placeholder.setAttribute('id', 'modal-page-placeholder');
      $(selector).after(placeholder);
    }

    function isUsingMobilePage(selector){
      if (matchMedia(Foundation.media_queries.medium).matches || $(selector).parents(pageSelector).length > 0){
        return false;
      }
      return true;
    }

    /**
     * API definition
     */
    var api = {};
    api.init = function init(){
      if ($(pageSelector).length == 0){
        $('body').prepend('<div id="modal-page-wrapper" class="mobile-page-wrapper hide"><div class="close">×</div><div id="modal-page-content"></div></div>');
        $('#modal-page-wrapper .close').click(function(){
          api.close()
        });
      }
      return api;
    }

    api.open = function open(selector){
      if (isUsingMobilePage(selector)){
        addPlaceholder(selector);
        $(pageSelector).html($(selector));
        $('#modal-page-wrapper').removeClass('hide');
        return true;
      }
    }

    api.close = function(){
      $(placeholderSelector).replaceWith($(pageSelector).children());
      $('#mainwrapper').removeClass('hide');
      $('#modal-page-wrapper').addClass('hide');
    }

    return api;
  }
})(jQuery);
