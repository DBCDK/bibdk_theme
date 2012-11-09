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
                e.stopPropagation();
                e.preventDefault();

                $(this).addClass('visuallyhidden');
                $(this).closest('.header-action').addClass('toggled');
                $(this).closest('.header-action').find('form').removeClass('visuallyhidden');
                // $(this).closest('.header-action').find('input[type=text]').focus();

            });

            // $('html').click(function() {

            //   $('.header-action-vejviser').find('a').show();
            //   $('.header-action-vejviser').find('form').addClass('visuallyhidden');
            //   $('.header-action-vejviser').css({
            //     width: "",
            //   });
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

                $(this).html($(this).html().replace('Tilføj', 'Fjern'));
                $(this).toggleClass('toggled');

            }, function (e) {
                e.preventDefault();

                $(this).html($(this).html().replace('Fjern', 'Tilføj'));
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
                    $(this).closest('.work-header').find('.btn').addClass('disabled');
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
                var id  = $(this).attr('href');
                $(id).trigger('click');
                $(this).children('.toggle-text').toggleClass('hidden');
                if (!$(this).hasClass('toggled')){
                    $(this).addClass('toggled');
                    $(this).closest('.element-section').next().removeClass('visuallyhidden');

                }else{
                    $(this).removeClass('toggled');
                    $(this).closest('.element-section').next().addClass('visuallyhidden');
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
            //     window.location = $(this).find(".field-title a").attr("href");
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
                    $(id).removeClass('visuallyhidden')
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



            //window popup function
            var profiles = {
                standard: {
                    height:600,   // sets the height in pixels of the window.
                    width:600,    // sets the width in pixels of the window.
                    toolbar:0,    // determines whether a toolbar (includes the forward and back buttons) is displayed {1 (YES) or 0 (NO)}.
                    scrollbars:1, // determines whether scrollbars appear on the window {1 (YES) or 0 (NO)}.
                    status:0,     // whether a status line appears at the bottom of the window {1 (YES) or 0 (NO)}.
                    resizable:0,  // whether the window can be resized {1 (YES) or 0 (NO)}. Can also be overloaded using resizable.
                    left:0,       // left position when the window appears.
                    top:0,        // top position when the window appears.
                    center:0,     // should we center the window? {1 (YES) or 0 (NO)}. overrides top and left
                    createnew:0,  // should we create a new window for each occurance {1 (YES) or 0 (NO)}.
                    location:0,   // determines whether the address bar is displayed {1 (YES) or 0 (NO)}.
                    menubar:0,    // determines whether the menu bar is displayed {1 (YES) or 0 (NO)}.
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
            };


            $('.bibdk-popup-link').once().click(function(e){
                e.preventDefault();
                if($(this).hasClass('orderedonce')){
                    var test = confirm("You have already ordered this item once. Continue?");
                    if(test == true){
                        $(this).popupwindow(profiles);
                        $(this).trigger('click.hest', profiles);
                        $(this).unbind('.hest');
                    }
                } else {
                    $(this).popupwindow(profiles);
                    $(this).trigger('click.hest', profiles);
                }
            });

            //Top menu language menu fix
            $('#lang-nav a').each(function(){
                if($(this).hasClass('active')){
                    $(this).addClass('visuallyhidden');
                }
            });

            // Toggle visibility of "next section of an element"
            $('.toggle-next-section').toggle(function(e) {
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



            // Toggle sub menus in help overlay menu
            $('.pane-bibdk-help-bibdk-help-popup-menu ul ul').hide();
            $('.pane-bibdk-help-bibdk-help-popup-menu a').click(function(e) {

              if ($(this).parent().hasClass('expanded')) {
                e.preventDefault();
                $(this).next().toggle();
              }
            });





        // NO CODE AFTER THIS!
        }
    };
})(jQuery);
