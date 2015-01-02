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
    //FIXED NAVIGATION
    $(window).scroll(function() {
		var scroll = $(window).scrollTop();
	    if (scroll > ($(window).height() -20)) {
			$("#navigation").addClass('navigation-fixed');
	    } else {
			$("#navigation").removeClass('navigation-fixed');
	    }
	    if (scroll > 20 & scroll < ($(window).height() -20)) {
	        $("#navigation").fadeOut("100");
	    } else {
		    $('#navigation').fadeIn("1000"); 
	    }
	    if (scroll > 60 & scroll < $(window).height()) {
	        $("#navigation").fadeOut("100");
	    } else {
		    $('#navigation').fadeIn("1000"); 
	    }
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