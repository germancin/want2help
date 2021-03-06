/*** Document Ready Functions ***/
jQuery(document).ready(function(){

	"use strict";
 
 /*** MESSAGE BOX TOGGLE FUNCTION ***/
$(".message-box-title").click(function(){
	$(".message-box-title").toggleClass("opened");
	$(".message-box-title > i").toggleClass("icon-angle-down");
	$(".message-form").slideToggle();
});	
	




$(".product a").click(function(){
	$(this).parent().parent().slideUp();
});	



/*** DROP DOWN MENU ***/
$("#menu-navigation > li").hover(function(){
	$("ul",this).slideToggle('fast');
	$("ul li ul",this).hide();		
});	
$("#menu-navigation > li ul li").hover(function(){
	$("ul",this).slideToggle('fast');
});	


/*** Responsive Menu Function ***/
	$('.ipadMenu').change(function(){
		var loc = $('option:selected', this).val();
		document.location.href = loc;
	});


	

/*** ACCORDIONS ***/
$('.accordion_content').not('.open').hide();

$('.accordion_toggle a').click(function(e){
	if($(this).parent().hasClass('current')) {
		$(this).parent()
			.removeClass('current')
			.next('.accordion_content').slideUp();
	} else {
		$(document).find('.current')
			.removeClass('current')
			.next('.accordion_content').slideUp();
		$(this).parent()
			.addClass('current')
			.next('.accordion_content').slideDown();
	}
	e.preventDefault();
});




/*** ACCORDIONS ***/
$('.accordion_content').not('.open').hide();

$('.accordion_toggle input').click(function(e){
	if($(this).parent().hasClass('current')) {
		$(this).parent()
			.removeClass('current')
			.next('.accordion_content').slideUp();
	} else {
		$(document).find('.current')
			.removeClass('current')
			.next('.accordion_content').slideUp();
		$(this).parent()
			.addClass('current')
			.next('.accordion_content').slideDown();
	}
	e.preventDefault();
});




/*** STICKY MENU ***/
var nav = $('.sticky');
$(window).scroll(function () {
	if ($(this).scrollTop() > 50) {
			nav.addClass("stick");
	}
	else {
			nav.removeClass("stick");
	}
});



/*** TOGGLE HEADER ***/
$(".show-header").click(function(){
	$(".toggle-header").slideToggle();
	$(".top-bar-toggle").slideToggle();
	$(this).toggleClass("move-down");
});	


/*** CHECKOUT PAGE FORM TOGGLE ICON ***/
$(".form-toggle.accordion_toggle a").click(function(){
	$(this).toggleClass("pointed");
});	






/*** COUNT DOWN TIMER ***/
if ($('.count-down').length !== 0){
	$('.count-down').countdown({
		timestamp : (new Date()).getTime() + 19*24*60*60*1000
	});
}
if ($('.count-down2').length !== 0){
	$('.count-down2').countdown({
		timestamp : (new Date()).getTime() + 10*24*60*60*1000
	});
}




});		