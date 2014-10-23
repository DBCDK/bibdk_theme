(function($) {
  function tabbingEnable(i, e) {
    var tab_elements = Array('checkbox', 'radio', 'a', 'button', 'input', 'textarea', 'select');

    if (tab_elements.indexOf(e.localName) > -1) {
      if ((tab = e.getAttribute('tabindex')) < 0) {
        // Bit-flip tabindex (negative numbers becomes zero or positive) and
        // elements are then tab-able.
        e.setAttribute('tabindex', ~tab);
      }
    }
  }

  function tabbingDisable(i, e) {
    var tab_elements = Array('checkbox', 'radio', 'a', 'button', 'input', 'textarea', 'select');

    if (tab_elements.indexOf(e.localName) > -1) {
      if ((tab = e.getAttribute('tabindex')) < 0) {
      }
      else {
        // Bit-flip tabindex (positive numbers and zero becomes negative) and
        // elements are then no longer tab-able.
        e.setAttribute('tabindex', ~tab);
      }
    }
  }

  var functions = {
    addClass: 'tabbingDisable',
    removeClass: 'tabbingEnable',
  };

  for(var f in functions) {
    var s = "$.fn._" + f + " = $.prototype." + f + ";" +
            "$.fn." + f + " = function(a, b) {" +
            "  if (a == 'visuallyhidden') {" +
            "    this.find('*').andSelf().each(" + functions[f] + ");" +
            "  }" +
            "  return this._" + f + "(a,b);" +
            "};"
    eval(s);
  };

  Drupal.behaviors.bibdk_theme_visuallyhidden_hack = {
    attach: function(context, settings) {
      $('.visuallyhidden').find('*').andSelf().each(tabbingDisable);
    }
  }
})(jQuery);
