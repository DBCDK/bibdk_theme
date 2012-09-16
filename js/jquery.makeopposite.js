(function ($) {

  $.fn.makeOpposite = function (options) {

    var defaultVal = {
    };
    var obj = $.extend(defaultVal, options);


    var couples = [
      ["Mere", "Mindre"],
      ["Flere", "Færre"],
      ["Vis", "Skjul"]
    ];


    return this.each(function () {

      $(this).toggleClass('opposite');


      var oldHtml = $(this).html();

      var newHtml = oldHtml.replace("Mere", "Mindre");

    
      $(this).html(newHtml);




    });
  }
})(jQuery);  