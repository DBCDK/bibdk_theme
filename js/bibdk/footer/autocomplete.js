(function($){
  /**
   * Scroll input field to top to make room for autocomplete suggestions
   */
  if (Modernizr.touch){
    $(document).on('focus', 'input[autocomplete]', function(){
      document.body.scrollTop = $(this).offset().top - 20;
    });
  }

  /**
   * overrides Drupal.jsAC.prototype.found
   * @see misc/autocomplete.js
   *
   * Fixes autocomplete for touch devices using click instead of mousedown
   */
  Drupal.jsAC.prototype.found = function(matches){
    console.log(matches);
    // If no value in the textfield, do not show the popup.
    if (!this.input.value.length){
      return false;
    }

    // Prepare matches.
    var ul = $('<ul></ul>');
    var ac = this;
    for (key in matches) {
      $('<li></li>')
        .html($('<div></div>').html(matches[key]))
        .click(function(){
          ac.select(this);
        })
        .mouseover(function(){
          ac.highlight(this);
        })
        .mouseout(function(){
          ac.unhighlight(this);
        })
        .data('autocompleteValue', key)
        .appendTo(ul);
    }

    // Show popup with matches, if any.
    if (this.popup){
      if (ul.children().length){
        $(this.popup).empty().append(ul).show();
        $(this.ariaLive).html(Drupal.t('Autocomplete popup'));
      }
      else {
        $(this.popup).css({ visibility: 'hidden' });
        this.hidePopup();
      }
    }
  };

  /**
   * overrides Drupal.autocompleteSubmit
   * @see misc/autocomplete.js
   *
   * We want to submit on enter
   */
  Drupal.autocompleteSubmit = function(){
    $('#autocomplete').each(function(){
      this.owner.hidePopup();
    });
    return true;
  };

})(jQuery);

