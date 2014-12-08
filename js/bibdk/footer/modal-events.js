/**
 * @file
 *
 * This files handles events invoked by the Foundation Reveal system
 */

(function() {
  // closing the offcanvas menu when popping a modal
  $(document).on('open.fndtn.reveal', '[data-reveal]', function() {
    $('.exit-off-canvas').trigger('click');
    var $mainwrapper = $("#mainwrapper");
    if(!Modernizr.touch) {
      $mainwrapper.css("filter", "blur(20px)");
      $mainwrapper.css("-webkit-filter", "blur(20px)");
      $mainwrapper.css("-moz-filter", "blur(20px)");
      $mainwrapper.css("-o-filter", "blur(20px)");
      $mainwrapper.css("-ms-filter", "blur(20px)");
    }
  });

// attaching behaviors when the modal have finished opening
  $(document).on('opened.fndtn.reveal', '[data-reveal]', function() {
    var modal = document.getElementById('bibdk-modal');
    Drupal.attachBehaviors(modal, null);
    Drupal.bibdkModal.addAccessibilityInfo(window.document);
    onLoad.setFocus();

    if(window.matchMedia(window.Foundation.media_queries.small)) {
      var $mainwrapper = $("#mainwrapper");
      $mainwrapper.addClass('hide');
    }
  });

  $(document).on('close.fndtn.reveal', '[data-reveal]', function() {
    var modal = document.getElementById('bibdk-modal');
    Drupal.detachBehaviors(modal, null, null);

    if(window.matchMedia(window.Foundation.media_queries.small)) {
      var $mainwrapper = $("#mainwrapper");
      $mainwrapper.removeClass('hide');
    }
  });

  $(document).on('closed.fndtn.reveal', '[data-reveal]', function() {
    var $mainwrapper = $("#mainwrapper");
    $mainwrapper.css("filter", "");
    $mainwrapper.css("-webkit-filter", "");
    $mainwrapper.css("-moz-filter", "");
    $mainwrapper.css("-o-filter", "");
    $mainwrapper.css("-ms-filter", "");
  });
})();