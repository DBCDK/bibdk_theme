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



$('.mediabox').click(function () {
	window.location = $(this).find("h3 a").attr("href");
});



$('#search-advanced-panel').hide();
$('#search-advanced a').click(function() {
	$(this).toggleClass('expanded');
	if ($(this).hasClass('expanded')){

		$(this).text('Færre søgemuligheder');
	}
	else {
		$(this).text('Flere søgemuligheder');
	}	
	$(this).next().fadeToggle();
});


$('.page-action-find-bib form').hide();

$('.page-action-find-bib a').click(function () {

	$clicked = $(this);

	$clicked.parent().animate({
		width: '300',
	}, 300, function() {
					
			$clicked.hide();
			$clicked.siblings().fadeIn();

	});
});




/*
$('#page-actions .find-bib').click(function (e) {

	var text = $(this).text();
	var width = $(this).outerWidth();
	var height = $(this).height();



	
	$(this).animate({
    	//opacity: 0.25,
    	width: '200',
  	}, 200, function() {
  		$(this).css({
  			padding: '0',
  		});

    	$('<input placeholder="Lol det er fedt!" class="test" type=text />').appendTo($(this).parent()).hide().fadeIn(500);
  			$(this).hide();
  	});
	$(this).css({
    	//opacity: 0.25,
    	//height: height,
    	backgroundImage: 'none',
  	});


});
*/










});