/**
 * Home Page Scripting
 *
 * @package Postali Child
 * @author Postali LLC
 */
/*global jQuery: true */
/*jslint white: true */
/*jshint browser: true, jquery: true */

jQuery( function ( $ ) {
	"use strict";

	$(document).ready(function() {
		// check cookie
		var $animate = Cookies.get('animate');

        if ($animate == 'yes') {
            $('.logo-animate').css("display", "none");
        }

		// set cookie
		setTimeout( function(){
			Cookies.set('animate', 'yes');
		},8000);
		
	});
	
	$(document).ready(function () {
		setTimeout( function(){
			$('.logo-animate').css("display", "none");
		},8000);
	});

});