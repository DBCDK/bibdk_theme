(function($){
  /**
   *********************** Foundation IE SVG hack *********************************** //
   * (Fontation dropdowns don't trigger if clicking on a SVG icon in IE) 
   */
  Drupal.behaviors.bibdk_svg_dropdown_fix = {
    attach: function(context, settings){
      $('.svg-icon').click(function(event) {
        if ( detectIE() ) {
          event.preventDefault();
          $(this).parent('a').click();
        }
      });
    }
  }

  $(document).on('opened.fndtn.reveal', '.reveal-modal', function (document) {
    behaviorsParam = $('.reveal-modal .svg-icon');
    Drupal.attachBehaviors(behaviorsParam, null);
    onLoad.setFocus();
  });

}) (jQuery);

