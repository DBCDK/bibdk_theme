(function() {
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

  // attaching behaviors when the modal have finished opening
  $(document).one('opened.fndtn.reveal', '[data-reveal]', function() {
    Drupal.detachBehaviors($('#bibdk-modal'));
    Drupal.attachBehaviors($('#bibdk-modal'));
  });
})();