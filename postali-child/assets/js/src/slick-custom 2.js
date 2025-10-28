/**
 * Slick Custom
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

	$('.slides').slick({
		dots: false,
		infinite: true,
		fade: false,
		autoplay: false,
  		speed: 800,
		slidesToShow: 3,
		slidesToScroll: 1,
		prevArrow: false,
    	nextArrow: '<button class="slider-arrow next"></button>',
    	swipeToSlide: true,
		cssEase: 'ease-in-out',
		responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
			}
        ]
	});
	
});