// <?php
/**
* @file
* bibdk_search_pages javascript file
*/
// ?>
// @codingStandardsIgnoreStart

(function($) {
  Drupal.behaviors.toggleCustomSearch = {
    attach: function(context, settings) {
      // Search pages dropdown. Populate advanced searchform on change.
      $("select[data-js-id=\"js-select-material-type\"]", context).each(function(key, item) {
        $(this).on("change", function(e) {
          if (window.matchMedia("screen and (min-width: 768px)").matches) {
            var path = $(this).val();
            var material = path.split("/");
            material = ( (material[1] !== undefined)) ? material[1] : "";
            Drupal.getCustomSearchForm(path, material);
            Drupal.getArticlesView(material);
          }
        })
      });
    }
  };

  Drupal.getCustomSearchForm = function(path, material) {
    // Retrieve advanced searchform
    var url = Drupal.settings.basePath + Drupal.settings.pathPrefix + "bibdk_custom_search/ajax/get_search_panel";
    jQuery.get(url, {page_id: path})
      .done(function (data, response) {
        Drupal.settings.bibdk_custom_search.advancedSearchIsLoaded = true;
        var $searchavanced = $("#search-advanced", data);
        var tabs = {
          "bog": "boeger",
          "artikel": "artikler",
          "film": "film",
          "net": "ematerialer",
          "spil": "spil",
          "musik": "musik",
          "noder": "noder"
        };
        tab = ( (tabs[material] !== undefined)) ? tabs[material] : "";
        $("#search-advanced").replaceWith($searchavanced);
        $("#edit-advanced").attr("class", "");
        $("#edit-advanced").addClass(tab);
        Drupal.attachBehaviors($searchavanced, Drupal.settings);
        onLoad.setFocus();
      })
      .fail(function () {
        throw new Error("An error happend while loading search pages");
      })
  };

  Drupal.getArticlesView = function(material) {
    // Retrieve bibdk_articles view.
    request = $.ajax({
      url: Drupal.settings.basePath + "views/ajax",
      type: "post",
      data: {
        view_name: "article_view",
        view_display_id: "panel_pane_1", //your display id
        view_args: material, // your views argument(s)
      },
      dataType: "json",
      success: function (response) {
        if (response[1] !== undefined) {
          $(".content-articles-left").replaceWith(response[1].data);
        }
      },
      error: function (error) {
        throw new Error("An error happend while loading articles");
      }
    });

    request = $.ajax({
      url: Drupal.settings.basePath + "views/ajax",
      type: "post",
      data: {
        view_name: "article_view",
        view_display_id: "panel_pane_3", //your display id
        view_args: material, // your views argument(s)
      },
      dataType: "json",
      success: function (response) {
        if (response[1] !== undefined) {
          $(".content-articles-right").replaceWith(response[1].data);
        }
      },
      error: function (error) {
        throw new Error("An error happend while loading articles");
      }
    });

  };


} (jQuery));
// @codingStandardsIgnoreEnd
