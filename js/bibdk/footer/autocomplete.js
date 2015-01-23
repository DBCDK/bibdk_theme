(function() {
  if(Modernizr && Modernizr.touch){
    console.log('kanin');
  }

  $(document).on('touchend', '#autocomplete li', function (e) {
    $(this).trigger('mousedown');
    console.log(this);
  });
})();
