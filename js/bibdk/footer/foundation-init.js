(function () {
  $(window.document).foundation({
    offcanvas: {
      // Sets method in which offcanvas opens.
      // [ move | overlap_single | overlap ]
      open_method: 'overlap_single',
      // Should the menu close when a menu link is clicked?
      // [ true | false ]
      close_on_click: true
    },
    reveal: {
      // Configures the reveal (modal)
      animation: 'fade',
      animation_speed: 150
    }
  });

  /**
   * Add foundation specific behavior to drupal ajax loaded content
   */
  Drupal.behaviors.foundation = {
    attach: function (context) {
      reflow(context);
    }
  }

  /**
   * Add foundation functionality to a given context
   */
  function reflow(context) {
    $(window.document, context).foundation('reflow');
  }
})();
