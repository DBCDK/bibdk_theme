(function ($) {

    Drupal.behaviors.bibdk_theme = {
        attach: function(context, settings) {
            // Toggle tables
            $('.table-toggle a').click(function(e) {
                e.preventDefault();

                $(this).closest('.table').find('.hideable').toggleClass('visuallyhidden');
                $(this).toggleClass('toggled');

            });

            // Find library header action
            $('.header-action-vejviser a').click(function (e) {
                $('#edit-openagency-query').focus();
                e.stopPropagation();
                e.preventDefault();

                $(this).addClass('visuallyhidden');
                $(this).closest('.header-action').addClass('toggled');
                $(this).closest('.header-action').find('form').removeClass('visuallyhidden');
                // $(this).closest('.header-action').find('input[type=text]').focus();

            });

           /* $('.bibdk-favourite-vejviser-link').click(function (e) {
                e.preventDefault();
                $('#edit-openagency-query').focus();
                $('.header-action-vejviser').find('a').addClass('visuallyhidden');
                $('.header-action-vejviser').find('form').removeClass('visuallyhidden');
            });*/

            // $('html').click(function() {

            // $('.header-action-vejviser').find('a').show();
            // $('.header-action-vejviser').find('form').addClass('visuallyhidden');
            // $('.header-action-vejviser').css({
            // width: "",
            // });
            // });


            // Add placeholder support in older browsers
            $('[placeholder]').focus(function() {
              var input = $(this);
              if (input.val() == input.attr('placeholder')) {
                input.val('');
                input.removeClass('placeholder');
              }
            }).blur(function() {
              var input = $(this);
              if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.addClass('placeholder');
                input.val(input.attr('placeholder'));
              }
            }).blur().parents('form').submit(function() {
              $(this).find('[placeholder]').each(function() {
                var input = $(this);
                if (input.val() == input.attr('placeholder')) {
                  input.val('');
                }
              })
            });



            // Toggle dropdown menus
            $('.dropdown-toggle').once().click(function(e) {
                e.preventDefault();
                e.stopPropagation();

                $('.dropdown-toggle').not($(this)).removeClass('toggled');
                $('.dropdown-toggle').not($(this)).next().addClass('visuallyhidden');

                if (!$(this).hasClass('disabled')) {
                    $(this).toggleClass('toggled');
                    $(this).next().toggleClass('visuallyhidden');
                }
            });

            // Handle random html clicks
            $('html').click(function() {
                $('.dropdown-menu').addClass('visuallyhidden');
                $('.dropdown-toggle').removeClass('toggled');
            });

            // Add to basket
            $('.link-add-basket').toggle(function(e) {
                e.preventDefault();

                $(this).html($(this).html().replace('TilfÃ¸j', 'Fjern'));
                $(this).toggleClass('toggled');

            }, function (e) {
                e.preventDefault();

                $(this).html($(this).html().replace('Fjern', 'TilfÃ¸j'));
                $(this).toggleClass('toggled');
            });

            // Select side of work cover
            $('.work-cover-selector a').once().click(function(e) {
                e.preventDefault();

                var index = $(this).index() + 1;
                var $image = $(this).closest('.work-cover').find('.work-cover-image a:nth-child(' + index +')');

                $image.siblings().addClass('visuallyhidden');
                $image.removeClass('visuallyhidden');
            });

            // Disable button and dropdown when toggling details of a work
            $('.work-toggle-element', context).click(function() {

                if (!$(this).hasClass('toggled')){
                    // pjo comment out disabled class to allow 'order any edition' always
                   // $(this).closest('.work-header').find('.btn').addClass('disabled');
                    $(this).closest('.work-header').find('.btn').removeClass('toggled');
                    $(this).closest('.work-header').find('.dropdown-menu').addClass('visuallyhidden');

                    $('html, body').animate({
                        scrollTop: $(this).closest('.work').offset().top
                    }, 500);
                }else
                {
                    $(this).closest('.work-header').find('.btn').removeClass('disabled');
                }
            });

            // Toggle visibility of "next section of an element"
            $('.work-toggle-element', context).click(function(e) {
                e.preventDefault();
                var id = $(this).attr('href');
                var msg_id = ".msg-" + id.substring(6);
                $(id).trigger('click');
                $(this).children('.toggle-text').toggleClass('hidden');
                if (!$(this).hasClass('toggled')){
                    $(this).addClass('toggled');
                    $(this).closest('.element-section').next().removeClass('visuallyhidden');
                    $(msg_id).addClass('visuallyhidden');
                }else{
                    $(this).removeClass('toggled');
                    $(this).closest('.element-section').next().addClass('visuallyhidden');
                    $(msg_id).removeClass('visuallyhidden');
                }

            });

            // Make entire element clickable
            // Add .element-clickable to parent
            // Add .element-target to destination link
            $('.element-clickable').css('cursor', 'pointer');
            $('.element-clickable').click(function () {
              $(this).find(".element-target").trigger('click');
            });


            // Make entire widget clickable
            // $('.widget').css('cursor', 'pointer');
            // $('.widget').click(function () {
            // window.location = $(this).find(".field-title a").attr("href");
            // });

            // Adjust margin-left on widgets with image
            $('.widget-wrapper').each(function () {
                var $image = $(this).find('.field-image').find('img');
                if ($image.length > 0) {
                    var imageWidth = $image.width();
                    $(this).find('.widget').css('margin-left', imageWidth + 'px');
                }
            });

            // Control .active class on tabs
            $('.tabs-nav a, .tabs-nav-sub a').click(function(e){
                e.preventDefault();
                if(!$(this).hasClass('inactive')){
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');
                    var id = $(this).attr('href');
                    $(id).siblings().addClass('visuallyhidden');
                    $(id).removeClass('visuallyhidden');
                    $(id).children().filter('.active').trigger('click');
                }
            });

            // Toggle advanced search options
            $('#search-advanced a').click(function(e) {
                e.preventDefault();
                $(this).toggleClass('toggled');
                $(this).parent().next().toggleClass('visuallyhidden');
            });

            //Control zebra-toggle
            $('.zebra-toggle a').once().click(function (e){
                e.preventDefault();
                var id = $(this).attr('href');
                $(this).toggleClass('toggled');
                $(this).children('.toggle-text').toggleClass('hidden');
                $(this).parents(id).find(".toggle").toggleClass('visuallyhidden');
            });

            $('.markall-button input[type=checkbox]').click(function(e) {
                e.stopPropagation();
                $(this).toggleClass('checked');

                if ($(this).hasClass('checked')) {
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
                    height:600, // sets the height in pixels of the window.
                    width:600, // sets the width in pixels of the window.
                    toolbar:0, // determines whether a toolbar (includes the forward and back buttons) is displayed {1 (YES) or 0 (NO)}.
                    scrollbars:1, // determines whether scrollbars appear on the window {1 (YES) or 0 (NO)}.
                    status:0, // whether a status line appears at the bottom of the window {1 (YES) or 0 (NO)}.
                    resizable:0, // whether the window can be resized {1 (YES) or 0 (NO)}. Can also be overloaded using resizable.
                    left:0, // left position when the window appears.
                    top:0, // top position when the window appears.
                    center:0, // should we center the window? {1 (YES) or 0 (NO)}. overrides top and left
                    createnew:0, // should we create a new window for each occurance {1 (YES) or 0 (NO)}.
                    location:0, // determines whether the address bar is displayed {1 (YES) or 0 (NO)}.
                    menubar:0, // determines whether the menu bar is displayed {1 (YES) or 0 (NO)}.
                    onUnload:null // function to call when the window is closed
                }
                ,
                userhelp: {
                    height:500,
                    width:780,
                    center:0,
                    createnew:0,
                    scrollbars:1,
                    status:1
                }
                ,
                reservation: {
                    height:860,
                    width:570,
                    center:0,
                    createnew:0,
                    scrollbars:1,
                    status:1,
                    left:15,
                    top:15
                }
                ,
                windowLeftTop: {
                    height:500,
                    width:780,
                    center:0,
                    createnew:1,
                    scrollbars:1,
                    status:1,
                    left:10,
                    top:10
                }
                ,
                bibdkFavorite: {
                    height:700,
                    width:580,
                    center:0,
                    createnew:0,
                    scrollbars:1,
                    status:0,
                    resizable:1,
                    left:20,
                    top:20
                }
                ,
                lookupUrl: {
                    height:600,
                    width:840,
                    center:0,
                    createnew:1,
                    scrollbars:1,
                    status:1,
                    left:10,
                    top:10
                }
                ,
                holdings: {
                    height:700,
                    width:580,
                    center:0,
                    createnew:0,
                    scrollbars:1,
                    status:0,
                    resizable:1,
                    left:30,
                    top:30
                }
                ,
                infomedia: {
                    height:840,
                    width:780,
                    center:0,
                    createnew:0,
                    scrollbars:1,
                    status:0,
                    resizable:1,
                    left:35,
                    top:35
                }
            };


            // ****************************  pop-ups **************************** //

            $('.bibdk-popup-link').click(function(e){
                $('.popover').addClass('visuallyhidden');
            });

            $('.bibdk-popup-link').once().click(function(e){
                e.preventDefault();
                if($(this).hasClass('orderedonce')){
                    var test = confirm(Drupal.t("You have already ordered this item once. Continue?"));
                    if(test == true){
                        $(this).popupwindow(profiles);
                        $(this).triggerHandler('click.orderPopup', profiles);
                    } else {
                        return false;
                    }
                } else {
                    $(this).popupwindow(profiles);
                    $(this).triggerHandler('click.orderPopup', profiles);
                }
            });


            // ************************ Top menu language menu fix ************************ //
            //
            $('#lang-nav a').each(function(){
                if($(this).hasClass('active')){
                    $(this).addClass('visuallyhidden');
                }
            });

            // pjo 08-01-13 bug in outcommented toggle function
            $('.toggle-next-section').click(function(e) {
                e.preventDefault();
               var section = $(this).closest('.element-section').next('.element-section');
               if( section.hasClass('visuallyhidden') ) {
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

            // Toggle visibility of "next section of an element"
         /* $('.toggle-next-section').toggle(function(e) {
            e.preventDefault();
            $(this).addClass('toggled');
            $('.toggle-next-section.toggled .show-more').addClass('visuallyhidden');
            $('.toggle-next-section.toggled .show-less').removeClass('visuallyhidden');
            $(this).closest('.element-section').next().removeClass('visuallyhidden');
            }, function(e) {
            e.preventDefault();
            $('.toggle-next-section.toggled .show-more').removeClass('visuallyhidden');
            $('.toggle-next-section.toggled .show-less').addClass('visuallyhidden');
            $(this).removeClass('toggled');
            $(this).closest('.element-section').next().addClass('visuallyhidden');
            });
          */


            // Toggle sub menus in help overlay menu
            $('.pane-bibdk-help-bibdk-help-popup-menu ul ul').hide();
            $('.pane-bibdk-help-bibdk-help-popup-menu a').click(function(e) {

              if ($(this).parent().hasClass('expanded')) {
                e.preventDefault();
                $(this).next().toggle();
              }
            });

            // Password fields
            $(".bibdk-password-field").each(function() {
                this.type='password';
            });
            $('.bibdk-unmask-password-field').click(function() {
                $('.bibdk-password-field').each(function() {
                    if( this.type == 'password' ){
                        this.type='text';
                    }
                    else{
                        this.type='password';
                    }
                });
            });


            // Favourite selector
            $('.reservation-favourite-selector').change(function(e){
                var selector = $('.hidden_selector');
                selector.val(1);
                $(this).closest('form').submit();
            });






            // ****************************  popovers **************************** //
            $('.popover-button').click(function(e){
                $('.popover').addClass('visuallyhidden');
                $(this).siblings().removeClass('visuallyhidden').find('input').select();
            });
            $('.popover .close').click(function (e){
                $(this).closest('.linkme-wrapper').addClass('visuallyhidden');
            });


            /* /begin TODO: delete after sprint 32 */
            // Linkme field
            $('.linkme-button').click(function(e){
                $('.popover').addClass('visuallyhidden');
                $(this).siblings().removeClass('visuallyhidden').find('input').select();
            });
            $('.linkme-wrapper .close').click(function (e){
                $(this).closest('.linkme-wrapper').addClass('visuallyhidden');
            });

            // Infomedia field
            $('.infomedia-button').click(function(e){
                $('.popover').addClass('visuallyhidden');
                $(this).siblings().removeClass('visuallyhidden');
            });
            $('.infomedia-wrapper .close').click(function (e){
                $(this).closest('.infomedia-wrapper').addClass('visuallyhidden');
            });
            /* /end TODO: delete after sprint 32 */

            // ****************************  Seasonal images **************************** //
            var today = new Date();
            month = today.getMonth() + 1;
            if ( month == 12 ) {
              $('#seasonal').each(function(){
                $(this).addClass('kravlenisse');
              });
            }

            // ****************************  CURSOR POSITIONS **************************** //
            // Default in search block form - unless it's a search result.
            $('form#search-block-form input[name="search_block_form"]').not('.page-search form#search-block-form input[name="search_block_form"], .page-vejviser form#search-block-form input[name="search_block_form"]').focus();
            // Move to first input field in expanded search, if activated.
            $('#search-advanced-toggle').click(function(e) {
                $('form#search-block-form').find('.bibdk-custom-search-element input[type=text], .bibdk-custom-search-element textarea').filter(':visible:first').focus();
            });
            // Helpdesk popup
            $('.page-overlay-helpdesk').find('input[type=text], textarea').filter(':visible:first').focus();
            // User login form
            $('form#user-login').find('input[type=text], textarea').filter(':visible:first').focus();
            // Create new account
            $('form#user-register-form').find('input[type=text], textarea').filter(':visible:first').focus();
            // Request new password
            $('form#user-pass').find('input[type=text], textarea').filter(':visible:first').focus();
            // User help popup
            $('#bibdk-help-search-form #edit-search-help').filter(':visible').focus();


            // ****************************  popovers **************************** //
            // SEARCH SORT DROPDOWN
            $('.bibdk-search-controls-form .dropdown-menu li a').click(function() {
              var value = "";
              var textString = $(this).text();
              var idHidden = $(this).parents(".bibdk-search-controls-form").attr('data');
              if ( selectValue = $(this).attr('data') )  {
                value = selectValue;
              }
              $("#" + idHidden).val(value);
              $(this).parents(".bibdk-search-controls-form").find(".selected-text").text(textString);
              // $("#search-block-form").submit();
            });


            // ************************** SELECT SEARCH INPUT ON CLICK ************************* //
            $('form#search-block-form input[name="search_block_form"]').focus(function(){
              this.select();
            });

            // ****************************  TOGGLE 'EXPAND SEARCH' **************************** //
            $('#search-advanced-toggle a').not('.front #search-advanced-toggle a').toggleClass('toggled');
            $('#search-advanced-panel').not('.front #search-advanced-panel').toggleClass('visuallyhidden');

            // *************** Move secondary actions in search result to bottom right *************** //
            $('article.manifestation').filter(':visible').each(function(){
              var hAction = $(this).find('.actions').height();
              var hData = $(this).find('.manifestation-data').height();
              var highestCol = Math.max( hAction, hData );
              $(this).find('.actions').height(highestCol);
              var hSecondaryAction = highestCol - $(this).find('.primary-actions').height() - 20;
              $(this).find('.secondary-actions').height(hSecondaryAction);
              var hSecondaryActionContentMargin = hSecondaryAction - $(this).find('.secondary-actions > ul').height();
              $(this).find('.secondary-actions > ul').css('margin-top',hSecondaryActionContentMargin);
            });


        // NO CODE AFTER THIS!
        }
    };

})(jQuery);
