$(document).ready(function() {
  

// Add noise!!
/*$('#search-panel, #subjects-nav').noisy({
  intensity: 0.9, 
  size: 200, 
  opacity: 0.03,
  fallback: 'fallback.png',
  monochrome: false
});*/


$('.work-cover-selector a').click(function(e) {

	e.preventDefault();

	var index = $(this).index() + 1;
	var $image = $(this).closest('.work-cover').find('.work-cover-image a:nth-child(' + index +')');

	$image.siblings().addClass('visuallyhidden');
	$image.removeClass('visuallyhidden');


});






  

$('.btn').click(function(e) {
	//e.preventDefault();
	e.stopPropagation();
});



$('.btn-group .btn').click(function(e) {
	e.preventDefault();
	e.stopPropagation();

	if (!$(this).hasClass('btn-disabled')) {
		$(this).toggleClass('btn-toggled');
		$(this).next().toggleClass('visuallyhidden');
	}

});


$('.btn-dropdown').click(function(e){
    e.stopPropagation();
});

$('html').click(function() {
  $('.btn-dropdown').addClass('visuallyhidden');
  $('.btn-group .btn').removeClass('btn-toggled');
});









$('.toggle-work a').toggle(function() {

	$(this).addClass('opposite');
	$(this).html($(this).html().replace('Mere', 'Mindre'));
	$(this).closest('.work').children('.work-body').removeClass('visuallyhidden');
	$(this).closest('header').find('.btn-block').addClass('btn-disabled');
	$(this).closest('header').find('.btn-block').removeClass('btn-toggled');
	$(this).closest('header').find('.btn-dropdown').addClass('visuallyhidden');

	$('html, body').animate({
		scrollTop: $(this).closest('.work').offset().top
	}, 500);

}, function () {

	$(this).removeClass('opposite');
	$(this).html($(this).html().replace('Mindre', 'Mere'));
	$(this).closest('.work').children('.work-body').addClass('visuallyhidden');
	$(this).closest('header').find('.btn-block').removeClass('btn-disabled');

});






// Make entire widget clickable
$('.widget').css('cursor', 'pointer');
$('.widget').click(function () {
	window.location = $(this).find(".field-title a").attr("href");
});

$('.widget-wrapper').each(function () {
	var $image = $(this).find('.field-image').find('img');
	if ($image.length > 0) {
		var imageWidth = $image.width();
		$(this).find('.widget').css('margin-left', imageWidth + 'px');
	}
});







$('.tabs a').click(function(e){
	e.preventDefault();

	$(this).siblings().removeClass('active');
	$(this).addClass('active');
});

$('#search-tabs a').click(function(){
	$(this).siblings().removeClass('active');
	$(this).addClass('active');
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
	$(this).parent().next().fadeToggle();
});











$('.page-action-find-bib form').hide();

$('.page-action-find-bib a').click(function () {

	$clicked = $(this);

	$clicked.parent().animate({
		width: '300',
	}, 300, function() {
					

			$clicked.hide();
			$clicked.siblings().fadeIn(function(){
				$clicked.next().find('input[type=text]').focus();
			});

	});
});


$('.subwork-type-navigation a').click(function(e) {
	e.preventDefault();

	$(this).siblings().removeClass('active');
	$(this).addClass('active');


});












});