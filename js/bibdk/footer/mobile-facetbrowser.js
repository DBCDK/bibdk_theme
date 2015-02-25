/**
 * @file
 * Mobile off-canvas functionality for facets
 */
(function($){
  Drupal.behaviors.modalFacets = {
    attach: function(context, settings) {
      $('.bibdk-facets-mobile').click(function(e) {

        e.preventDefault();

        var facetbrowser_clone = $('.pane-bibdk-facetbrowser').clone();
        
        if ( !$('#bibdk-modal .pane-bibdk-facetbrowser').length ) {
          $('#bibdk-modal').html(facetbrowser_clone);
        }
        
        $('#bibdk-modal').foundation('reveal', 'open');

      });
    }
  };
})(jQuery);
