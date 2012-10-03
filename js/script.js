(function ($) {
    Drupal.behaviors.bibdk_theme = {
        attach: function(context, settings) {


            // Toggle tables
            $('.table-toggle a').click(function(e) {
                e.preventDefault();

                $(this).closest('.table').find('.hideable').toggleClass('visuallyhidden');
                $(this).toggleClass('toggled');

            });


            // Toggle dropdown menus
            $('.dropdown-toggle').click(function(e) {
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
            $('.work-cover-selector a').click(function(e) {

                e.preventDefault();

                var index = $(this).index() + 1;
                var $image = $(this).closest('.work-cover').find('.work-cover-image a:nth-child(' + index +')');

                $image.siblings().addClass('visuallyhidden');
                $image.removeClass('visuallyhidden');
            });


            // Disable button and dropdown when toggling details of a work
            $('.toggle-work a').toggle(function() {

                $(this).closest('.work-header').find('.btn').addClass('disabled');
                $(this).closest('.work-header').find('.btn').removeClass('toggled');
                $(this).closest('.work-header').find('.dropdown-menu').addClass('visuallyhidden');

                $('html, body').animate({
                    scrollTop: $(this).closest('.work').offset().top
                }, 500);

            }, function () {
                $(this).closest('.work-header').find('.btn').removeClass('disabled');
            });


            // Toggle visibility of "next section of an element"
            $('.toggle-next-section a').toggle(function(e) {
                e.preventDefault();

                $(this).addClass('toggled');
                $(this).html($(this).html().replace('Mere', 'Mindre'));

                $(this).closest('.element-section').next().removeClass('visuallyhidden');

            }, function(e) {
                e.preventDefault();

                $(this).removeClass('toggled');
                $(this).html($(this).html().replace('Mindre', 'Mere'));

                $(this).closest('.element-section').next().addClass('visuallyhidden');

            });


            // Make entire widget clickable
            $('.widget').css('cursor', 'pointer');
            $('.widget').click(function () {
                window.location = $(this).find(".field-title a").attr("href");
            });

            // Adjust margin-left on widgets with image
            $('.widget-wrapper').each(function () {
                var $image = $(this).find('.field-image').find('img');
                if ($image.length > 0) {
                    var imageWidth = $image.width();
                    $(this).find('.widget').css('margin-left', imageWidth + 'px');
                }
            });


            // Control .active class on tabs
            $('.bib-tabs a').click(function(e){
                e.preventDefault();
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            });

            $('#search-tabs a').click(function(){
                $(this).parent().siblings().removeClass('active');
                $(this).parent().addClass('active');
            });

            // Toggle advanced search options
            $('#search-advanced a').click(function(e) {
                $(this).toggleClass('toggled');
                //$(this).html($(this).html().replace('Flere', 'Færre'));
                $(this).parent().next().toggleClass('visuallyhidden');
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

            // Find bib stuff ##fix##
            $('.page-action-find-bib').click(function (e) {

                e.stopPropagation();
                $clicked = $(this);

                $clicked.animate({
                    width: 300,
                }, 300, function() {
                    $clicked.find('form').removeClass('visuallyhidden');
                    $clicked.next().find('input[type=text]').focus();
                });
            });

            $('html').click(function() {

                $('.page-action-find-bib').find('form').addClass('visuallyhidden');
                $('.page-action-find-bib').css({
                    width: "",
                });
            });

            $('.subwork-type-navigation a').click(function(e) {
                e.preventDefault();

                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            });



            //window popup function
            var profiles = {
                userhelp: {
                  height:500,
                  width:780,
                  center:0,
                  createnew:0,
                  scrollbars:1,
                  status:1
                }
                ,
                windowNew: {
                    height:500,
                    width:780,
                    center:1,
                    createnew:1,
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
            };

            $(".bibdk-popup-link").popupwindow(profiles);


         //Top menu language menu fix
         $('#lang-nav a').each(function(){
            if($(this).hasClass('active')){
                $(this).addClass('visuallyhidden');
            }
         });

        // NO CODE AFTER THIS!
        }
    };
})(jQuery);
