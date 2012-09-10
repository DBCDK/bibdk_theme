$(document).ready(function() {
  


// Add noise!!
/*$('#search-panel, #subjects-nav').noisy({
  intensity: 0.9, 
  size: 200, 
  opacity: 0.03,
  fallback: 'fallback.png',
  monochrome: false
});*/




$('.mediabox-large-lightgrey').each(function () {

	var $image = $(this).find('.field-image').find('img');

	if ($image.length > 0) {
		var imageWidth = $image.width();
		$(this).find('.mediabox-content').css('margin-left', imageWidth + 'px');
	}
	
});



$('.tabs a').click(function(){

	$(this).siblings().removeClass('active');
	$(this).addClass('active');


});





});