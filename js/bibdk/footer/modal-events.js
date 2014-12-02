(function() {
  // closing the offcanvas menu when popping a modal
  $(document).on('open.fndtn.reveal', '[data-reveal]', function() {
    $('.exit-off-canvas').trigger('click');
  });

// attaching behaviors when the modal have finished opening
  $(document).on('opened.fndtn.reveal', '[data-reveal]', function() {
    var modal = document.getElementById('bibdk-modal');
    Drupal.attachBehaviors(modal, null);
    Drupal.bibdkModal.addAccessibilityInfo(window.document);
  });

  $(document).on('close.fndtn.reveal', '[data-reveal]', function() {
    var modal = document.getElementById('bibdk-modal');
    Drupal.detachBehaviors(modal, null, null);
  });
})();