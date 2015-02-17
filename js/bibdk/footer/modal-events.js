/**
 * @file
 *
 * This files handles events invoked by the Foundation Reveal system
 */

(function($) {
  // closing the offcanvas menu when popping a modal
  $(document).on('open.fndtn.reveal', '[data-reveal]', function() {
    $('.exit-off-canvas').trigger('click');

    /*if(!Modernizr.touch) { // blur the background but only if we're aren't on a touch device as the blur effect is performance heavy
      addFilterOnMainwrapper();
    }*/
  });

// attaching behaviors when the modal have finished opening
  $(document).on('opened.fndtn.reveal', '[data-reveal]', function() {
    toggleBehaviorsOnModal(true);

    Drupal.bibdkModal.addAccessibilityInfo(window.document);
    onLoad.setFocus();

    toggleMainwrapperOnSmallDevices(false);
  });

  $(document).on('close.fndtn.reveal', '[data-reveal]', function() {
    toggleBehaviorsOnModal(false);
    toggleMainwrapperOnSmallDevices(true);
  });

  $(document).on('closed.fndtn.reveal', '[data-reveal]', function() {
    removeFilterOnMainwrapper();

    if(window.Foundation.reloadPageOnModalClose === 1){
      window.location.href = document.URL;
    }
  });

  function toggleMainwrapperOnSmallDevices(toggle){
    var $mainwrapper = $("#mainwrapper");
    if(toggle){
      $mainwrapper.removeClass('hide-for-small-only');
    } else {
      $mainwrapper.addClass('hide-for-small-only');
    }
  }

  function toggleBehaviorsOnModal(toggle){
    var modal = document.getElementById('bibdk-modal');
    if(toggle){
      Drupal.attachBehaviors(modal, null);
    } else {
      Drupal.detachBehaviors(modal, null, null);
    }
  }

  function addFilterOnMainwrapper(){
    var $mainwrapper = $("#mainwrapper");
    $mainwrapper.css("filter", "blur(20px)");
    $mainwrapper.css("-webkit-filter", "blur(20px)");
    $mainwrapper.css("-moz-filter", "blur(20px)");
    $mainwrapper.css("-o-filter", "blur(20px)");
    $mainwrapper.css("-ms-filter", "blur(20px)");
  }

  function removeFilterOnMainwrapper(){
    var $mainwrapper = $("#mainwrapper");
    $mainwrapper.css("filter", "");
    $mainwrapper.css("-webkit-filter", "");
    $mainwrapper.css("-moz-filter", "");
    $mainwrapper.css("-o-filter", "");
    $mainwrapper.css("-ms-filter", "");
      ;
  }
})(jQuery);
