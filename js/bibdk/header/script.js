(function($) {
  Drupal.behaviors.bibdk_theme = {

    attach: function(context, settings) {
      /**
       * This ensures that the console object always is present even in
       * browsers that doesn't support console.
       */
      if(typeof console === "undefined") {
        console = {
          log: function() {
          },
          debug: function() {
          }
        };
      }

      // Toggle cart-checkbox
      $('.cart-checkbox').click(function(e) {
        $('.cart-checkbox').css('cursor', 'pointer');
        e.stopPropagation();
      });

      // Toggle tables
      $('.table-toggle a').click(function(e) {
        e.preventDefault();

        $(this).closest('.table').find('.hideable').toggleClass('visuallyhidden');
        $(this).toggleClass('toggled');

      });

      // Find library header action
      $('.header-action-vejviser a').click(function(e) {
        $('#edit-openagency-query').focus();
        e.stopPropagation();
        e.preventDefault();

        $(this).addClass('hidden');
        $(this).closest('.header-action').addClass('toggled');
        $(this).closest('.header-action').find('form').removeClass('hidden');
        $(this).closest('.header-action').find('input[type=text]').focus();

      });

      // Add placeholder support in older browsers
      $('[placeholder]').focus(function() {
        var input = $(this);
        if(input.val() == input.attr('placeholder')) {
          input.val('');
          input.removeClass('placeholder');
        }
      }).blur(function() {
        var input = $(this);
        if(input.val() == '' || input.val() == input.attr('placeholder')) {
          input.addClass('placeholder');
          input.val(input.attr('placeholder'));
        }
      }).blur().parents('form').submit(function() {
        $(this).find('[placeholder]').each(function() {
          var input = $(this);
          if(input.val() == input.attr('placeholder')) {
            input.val('');

          }
        })
      });

      // Toggle dropdown menus
      $('.dropdown-toggle').once().click(function(e) {
        e.preventDefault();
        e.stopPropagation();

        $('.dropdown-toggle').not($(this)).removeClass('toggled');
        $('.dropdown-toggle').not($(this)).next().addClass('hidden');

        if(!$(this).hasClass('disabled')) {
          $(this).toggleClass('toggled');
          $(this).next().toggleClass('hidden');
        }
      });

      // Handle random html clicks
      $('html').click(function() {
        $('.dropdown-menu').addClass('hidden');
        $('.dropdown-toggle').removeClass('toggled');
      });

      // Disable button and dropdown when toggling details of a work
      $('.work-toggle-element', context).once().click(function(e) {
        e.preventDefault();
        $(this).trigger('load-work');
        if(!$(this).hasClass('toggled')) {
          $(this).trigger('show-work');
          // pjo comment out disabled class to allow 'order any edition' always
          // $(this).closest('.work-header').find('.btn').addClass('disabled');
          $(this).closest('.work-header').find('.btn').removeClass('toggled');
          $(this).closest('.work-header').find('.dropdown-menu').addClass('hidden');

          if(!Drupal.settings.full_view) {
            // scrollTop ofsett set at top - 30 px, so the order button not will be hidden behind the 'Log in' tab
            $('html, body').animate({
              scrollTop: $(this).closest('.work').offset().top - 30
            }, 500);
          }
        }
        else {
          $(this).trigger('hide-work');
          $(this).closest('.work-header').find('.btn').removeClass('disabled');
        }
      });

      // Trigger a click on 'more info' from 'order any edition' button
      $('.infotext-order-any-edition-link', context).once().click(function(e) {
        e.preventDefault();
        $(this).closest('.work').find('.work-toggle-element').trigger('click');
      });

      // Toggle visibility of "next section of an element"
      $('.work-toggle-element', context).bind('show-work', function(e) {
        var id = $(this).attr('href');
        var msg_id = ".msg-" + id.substring(6);

        if(!$(this).hasClass('toggled')) {
          $(this).children('.toggle-text').toggleClass('hidden');
          $(this).addClass('toggled');
          $(this).closest('.element-section').next().removeClass('visuallyhidden');
        }
      });

      $('.work-toggle-element', context).bind('hide-work', function(e) {
        var id = $(this).attr('href');
        var msg_id = ".msg-" + id.substring(6);
        if($(this).hasClass('toggled')) {
          $(this).children('.toggle-text').toggleClass('hidden');
          $(this).removeClass('toggled');
          $(this).closest('.element-section').next().addClass('visuallyhidden');
        }
      });

      // Make entire element clickable
      // Add .element-clickable to parent
      // Add .element-target to destination link
      $('.element-clickable').css('cursor', 'pointer');

      // Adjust margin-left on widgets with image
      $('.widget-wrapper').each(function() {
        var $image = $(this).find('.field-image').find('img');
        if($image.length > 0) {
          var imageWidth = $image.width();
          $(this).find('.widget').css('margin-left', imageWidth + 'px');
        }
      });

      // Control .active class on tabs
      $('.tabs-nav a, .tabs-nav-sub a').click(function(e) {
        e.preventDefault();
        if(!$(this).hasClass('inactive')) {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');
          var id = $(this).attr('href');
          $(id).siblings().addClass('visuallyhidden');
          $(id).removeClass('visuallyhidden');
          $(id).children().filter('.active').trigger('click');
        }
      });

      //Control zebra-toggle
      $('.zebra-toggle span').once().click(function(e) {
        e.preventDefault();
        var wrapper = $(this).parent('a');
        var id = wrapper.attr('href');
        wrapper.toggleClass('toggled');
        wrapper.children('.toggle-text').toggleClass('hidden');
        wrapper.parents(id).find(".toggle").toggleClass('visuallyhidden');
      });

      $('.markall-button input[type=checkbox]').click(function(e) {
        e.stopPropagation();
        $(this).toggleClass('checked');

        if($(this).hasClass('checked')) {
          $(this).closest('.element').find('table input[type=checkbox]').attr('checked', true);
        }
        else {
          $(this).closest('.element').find('table input[type=checkbox]').attr('checked', false);
        }
      });

      $('.markall-button').click(function(e) {
        $(this).children('input[type=checkbox]').click();
      });

      $('.subwork-type-navigation a').click(function(e) {
        e.preventDefault();

        $(this).siblings().removeClass('active');
        $(this).addClass('active');
      });

      // ****************************  pop-ups profiles **************************** //

      var profiles = {
        standard: {
          height: 600, // sets the height in pixels of the window.
          width: 600, // sets the width in pixels of the window.
          toolbar: 0, // determines whether a toolbar (includes the forward and back buttons) is displayed {1 (YES) or 0 (NO)}.
          scrollbars: 1, // determines whether scrollbars appear on the window {1 (YES) or 0 (NO)}.
          status: 0, // whether a status line appears at the bottom of the window {1 (YES) or 0 (NO)}.
          resizable: 0, // whether the window can be resized {1 (YES) or 0 (NO)}. Can also be overloaded using resizable.
          left: 0, // left position when the window appears.
          top: 0, // top position when the window appears.
          center: 0, // should we center the window? {1 (YES) or 0 (NO)}. overrides top and left
          createnew: 1, // should we create a new window for each occurance {1 (YES) or 0 (NO)}.
          location: 0, // determines whether the address bar is displayed {1 (YES) or 0 (NO)}.
          menubar: 0, // determines whether the menu bar is displayed {1 (YES) or 0 (NO)}.
          onUnload: null // function to call when the window is closed
        },
        userhelp: {
          height: 616,
          width: 700,
          center: 0,
          createnew: 1,
          scrollbars: 1,
          status: 1
        },
        helpdesk: {
          height: 900,
          width: 700,
          center: 0,
          createnew: 1,
          scrollbars: 1,
          status: 1
        },
        reservation: {
          height: 860,
          width: 570,
          center: 0,
          createnew: 1,
          scrollbars: 1,
          status: 1,
          left: 15,
          top: 15
        },
        windowLeftTop: {
          height: 500,
          width: 780,
          center: 0,
          createnew: 1,
          scrollbars: 1,
          status: 1,
          left: 10,
          top: 10
        },
        bibdkFavorite: {
          height: 700,
          width: 580,
          center: 0,
          createnew: 1,
          scrollbars: 1,
          status: 0,
          resizable: 1,
          left: 20,
          top: 20
        },
        lookupUrl: {
          height: 600,
          width: 840,
          center: 0,
          createnew: 1,
          scrollbars: 1,
          status: 1,
          left: 10,
          top: 10
        },
        holdings: {
          height: 700,
          width: 580,
          center: 0,
          createnew: 1,
          scrollbars: 1,
          status: 0,
          resizable: 1,
          left: 30,
          top: 30
        },
        infomedia: {
          height: 840,
          width: 780,
          center: 0,
          createnew: 1,
          scrollbars: 1,
          status: 0,
          resizable: 1,
          left: 35,
          top: 35
        },
        backcoverpdf: {
          height: 900,
          width: 650,
          center: 0,
          createnew: 1,
          scrollbars: 1,
          status: 0,
          resizable: 1,
          left: 40,
          top: 40
        }
      };

      // ****************************  pop-ups **************************** //

      $('#popup-button-close', context).click(function(e) {
        window.close();
      });

      $('.bibdk-popup-link', context).click(function(e) {
        e.preventDefault();
        $('.popover').addClass('visuallyhidden');

        if($(this).hasClass('orderedonce')) {
          var test = confirm(Drupal.t("You have already ordered this item once. Continue?"));
          if(test == true) {
            $(this).popupwindow(profiles, true);
          }
          else {
            return false;
          }
        }
        else {
          $(this).popupwindow(profiles, true);
        }
      });

      // **********************  "ORDER ANY EDITION" POPUP CHECKBOXES  ************************ //
      $('.bibdk-reservation-item input').click(function(e) {
        e.preventDefault();
        $(this).parent().parent().find('a').click();
        $(this).attr('checked', 'checked');
        return false;
      });
      $('.bibdk-reservation-item a').click(function(e) {
        e.preventDefault();
        $(this).parent().find('input').attr('checked', 'checked');
        return false;
      });

      // pjo 08-01-13 bug in outcommented toggle function
      $('.toggle-next-section', context).once().click(function(e) {
        e.preventDefault();
        var section = $(this).closest('.element-section').next('.element-section');
        if(section.hasClass('visuallyhidden')) {
          section.removeClass('visuallyhidden');
          $(this).children('.show-more').addClass('visuallyhidden');
          $(this).children('.show-less').removeClass('visuallyhidden');
        }
        else {
          section.addClass('visuallyhidden');
          $(this).children('.show-more').removeClass('visuallyhidden');
          $(this).children('.show-less').addClass('visuallyhidden');
        }
      });

      // Toggle sub menus in help overlay menu
      $('.pane-bibdk-help-bibdk-help-popup-menu ul ul').hide();
      $('.pane-bibdk-help-bibdk-help-popup-menu a').click(function(e) {

        if($(this).parent().hasClass('expanded')) {
          e.preventDefault();
          $(this).next().toggle();
        }
      });


      // Password fields
      function password_input_switch(that, type) {
        that.setAttribute('type', type);
      }

      // array to hold original input types
      if(typeof bibdk_password_input_types === 'undefined') {
        var bibdk_password_input_types = new Array();
      }

      $(".bibdk-password-field").each(function() {
        var id = $(this).attr('id');
        var type = $(this).attr('type');
        // save original type
        bibdk_password_input_types[id] = type;
        // initially hide fields marked as password
        password_input_switch(this, 'password');
      });

      $('.bibdk-unmask-password-field').once().click(function() {
        $('.bibdk-password-field').each(function() {
          if($(this).attr('type') === 'password') {
            var id = $(this).attr('id');
            // get original type
            var type = bibdk_password_input_types[id];
            //set type to original type
            password_input_switch(this, type);
          }
          else {
            //set type to password
            password_input_switch(this, 'password');
          }
        });
      });

      // Favourite selector
      $('.reservation-favourite-selector', context).change(function(e) {
        /* Add throbber*/
        $(this, context).parent().addClass('ajax-progress');
        $(this, context).parent().append('<span class="throbber">&nbsp;</span>');

        var selector = $('.hidden_selector');
        selector.val(1);
        var but = $('#edit-2');
        but.click();
      });

      // ****************************  popovers **************************** //
      $('.popover-button').click(function(e) {
        e.preventDefault();
        $('.popover').addClass('visuallyhidden');
        $(this).siblings().removeClass('visuallyhidden').find('input').select();
        $(this).siblings().removeClass('hide-text').find('input').select();
        $(this).siblings().find('.close').focus();
      });

      $('[data-dropdown-content] input[type=text]', context).focus(function(e) {
        $(this).select();
      });

      // ****************************  Seasonal images **************************** //
      var today = new Date();
      var month = today.getMonth() + 1;
      if(month == 12) {
        $('#seasonal').each(function() {
          $(this).addClass('kravlenisse');
        });
      }

      // ****************************  popovers **************************** //
      // SEARCH SORT DROPDOWN
      $('.bibdk-search-controls-form .dropdown-menu li a').click(function(e) {
        // set hidden field in search form to selected value
        if ( $("body.page-bibdk-frontpage")[0] ) {
          e.preventDefault();
        }
        var value = "";
        var textString = $(this).text();
        var idHidden = $(this).parents(".bibdk-search-controls-form").attr('data-control-name');
        if ( selectValue = $(this).attr('data-value') ) {
          value = selectValue;
        }
        $("#" + idHidden).val(value);
        $(this).parents(".bibdk-search-controls-form").find(".selected-text").text(textString);
      });

      // ************************** SELECT SEARCH INPUT ON CLICK  ************************* //
      if(!Modernizr.touch){
        $('form#search-block-form input[name="search_block_form"]').focus(function() {
          if ($(this).val().length > 0) {
            if ($(this).prop('selected')) {
              $(this).prop('selected', '');
            } else {
              $(this).prop('selected', 'selected');
              $(this).select();
            }
          }
        });
      }

      // ****************************  POPUP WINDOW CLOSE BUTTON  **************************** //
      // Toggle advanced search options
      $('.button-close-popup').click(function(e) {
        e.preventDefault();
        window.close();
        return false;
      });

      // **************************** CAROUSEL ********************************************** //

      // Add click event to carousel tabs.
      $('.rs-carousel-tabs li').once().click(function(e) {
        e.preventDefault();
        $(this).closest('.rs-carousel-tabs').addClass('hidden');
        $(this).closest('.bibdk-search-controls-form').find('.dropdown-toggle').removeClass('toggled');
      });

      // *********************** ADHL TOP LIST ********************************************* //
      $('.adhl-toplist .adhl-link').click(function(event) {
        event.preventDefault();
        window.opener.location.href = $(event.currentTarget).attr('href');
      });

      // NO CODE AFTER THIS!
    }

  };

})(jQuery);
