/**
 * Theme scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	
	$(document).ready(function(){
        $(window).scroll(function(){
            $(".scroll-for-more").css("opacity", 1 - $(window).scrollTop() / 500);
        });
    });

    // global vars
	var navHeight = $('#menu-main-menu > .menu').outerHeight();

	// SCRIPTS FOR NEW MOBILE NAVIGATION

	//Hamburger animation
	$('#menu-icon').click(function() {
		$(this).toggleClass('active');
		$('#menu-main-menu').toggleClass('active');
		return false;
	});

	//Toggle mobile menu & search
	$('.toggle-nav').click(function() {
		$('#menu-main-menu').slideToggle(400);
	});
	 
	//Close navigation on anchor tap
	$('.toggle-nav.active').click(function() {	
		$('#menu-main-menu').slideUp(400);
	});	

	//Mobile menu accordion toggle for sub pages
	$('#menu-main-menu > li.menu-item-has-children').append('<div class="accordion-toggle"><span class="icon-plus"></span></div>');

	  $('#menu-main-menu .accordion-toggle').click(function() {
		$(this).parent().find('> ul').slideToggle(400);
		$(this).toggleClass('toggle-background');
		$(this).find('.icon-plus').toggleClass('toggle-rotate');
	  });
	  
	// set cookie for load animation 
      
});