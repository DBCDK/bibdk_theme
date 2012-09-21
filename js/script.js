$(document).ready(function() {
  

// Add noise!!
/*$('#search-panel, #subjects-nav').noisy({
  intensity: 0.9, 
  size: 200, 
  opacity: 0.03,
  fallback: 'fallback.png',
  monochrome: false
});*/



// Toggle tables
$('.table-toggle a').click(function(e) {
	e.preventDefault();

	$(this).closest('.table').find('.hideable').toggleClass('visuallyhidden');
	$(this).toggleClass('opposite');
	//$(this).html($(this).html().replace('Flere', 'Færre'));
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

$('.dropdown-menu').click(function(e){
    //e.stopPropagation(); This might not be necessary ##fix##
});





// Random click
$('html').click(function() {
  $('.dropdown-menu').addClass('visuallyhidden');
  $('.dropdown-toggle').removeClass('toggled');

});











// Add to basket
$('.icon-link-add-basket').toggle(function() {

	//$(this).text('Fjern fra indkøbskurv');
	$(this).toggleClass('toggled');

}, function () {

	//$(this).text('Tilføj til indkøbskurv');
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

	$(this).addClass('opposite');
	$(this).html($(this).html().replace('Mere', 'Mindre'));

	$(this).closest('.element-section').next().removeClass('visuallyhidden');

}, function(e) {
	e.preventDefault();

	$(this).removeClass('opposite');
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
$('.tabs a').click(function(e){
	e.preventDefault();
	$(this).siblings().removeClass('active');
	$(this).addClass('active');
});

$('#search-tabs a').click(function(){
	$(this).siblings().removeClass('active');
	$(this).addClass('active');
});





// Toggle advanced search options
$('#search-advanced a').click(function(e) {
	$(this).toggleClass('toggled');
	//$(this).html($(this).html().replace('Flere', 'Færre'));
	$(this).parent().next().toggleClass('visuallyhidden');
});








// Find bib stuff ##fix##
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