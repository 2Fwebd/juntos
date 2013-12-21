/*
 * JUNTOS
 *
 * Copyright (c) 2013 F²
 * 
 * Main Javascript
 */
(function($) {
    "use strict";
    //DETECT MOBILE DEVICES TO FIX BACKGROUND COVER ISSUE
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	    $("body").addClass("mobile");
	}
    //LOADER
    $(window).load(function () {
		$('#loader').fadeOut();
	});
	//BOOTSTRAP ALERTS FOR FORM
	$(".alert").alert();
    //RESPONSIVE MENU
    $('#navigation nav').meanmenu({
	    meanScreenWidth: "998",
	    onePage: "true",
	    meanMenuContainer:"#navigation .container"
    });
    //PROJECT SLIDER
	var windowsize = $(window).height();
	$('#project').css({'height': windowsize + 'px'});
    $(window).load(function() {
	    var options = {
        autoPlay: true,
        nextButton: true,
        prevButton: true,
        pagination: true,
        preloader: true
	    };
	    var sequence = $("#project").sequence(options).data("sequence");
	    $(".sequence-prev, .sequence-next").fadeIn(500);
	});
    //FIXED HEADER
    $("#navigation").sticky({topSpacing:0});
    $(window).scroll(function () {
    	$("#navigation").sticky('update');
    });
    //CAROUSEL
    $(window).load(function() {
	  $('.flexslider.services-slider').flexslider({
	    animation: "slide",
	    animationLoop: false,
	    itemWidth: 254,
	    slideshow: false
	  });
	  $('.flexslider.posts-slider, .flexslider.events-slider').flexslider({
	    animation: "slide",
	    animationLoop: false,
	    itemWidth: 340,
	    slideshow: false
	  });
	});
	//LINKS
	$('html').smoothScroll(500);
	//SHARE BUTTON
	$(".sharing").click(function(){
		$(this).next(".hidden-buttons").fadeToggle();
	});
	//SCROLL TOP
	$.scrollUp({
	    scrollText: 'Top', // Text for element
	});
	//FANCYOX
	$('.fancybox').fancybox({
        openEffect  : 'elastic'
    });
	//GALLERY
    $(window).load(function() {
	  $('#gallery-slider').flexslider({
	    animation: "slide",
	    animationLoop: false,
	    itemWidth: 300,
	    itemMargin: 0
	  });
	});
})(jQuery);