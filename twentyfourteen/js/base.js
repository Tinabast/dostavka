(function ($, window, undefined){
$(function () {
    $.fn.mini_cart = function(){
        var currentTop = $(window).scrollTop(),
    		$order = $('.current-order').first();
    	
    	if (orderTop < currentTop) {
    		$order.addClass('fixed');
    	} else {
    		$order.removeClass('fixed');
    	}
    	
    	if (currentTop > 0) {
    		$('.button-to-top').removeClass('btn_disabled');
    	} else {
    		$('.button-to-top').addClass('btn_disabled');
    	}
    }
	var orderTop = $('.current-order').first().offset().top;

	$('[data-image]').each(function () {
		var $this = $(this);
		
		$this.css('background-image', 'url("' + $this.data('image') + '")');
		
	});
	$('[data-image-position]').each(function () {
		var $this = $(this);
		
		$this.css('background-position', $this.data('image-position'));
		
	});
	
	/* POPUPS */
    $('body').on('click', '.popup-wrapper', function(){
        $(this).addClass('hidden');
    });
    $('body').on('click', '.popup-container', function(e){
    	e.stopPropagation();
    });
    $('body').on('click', '[data-popup]', function(){
    	var popupId = $(this).data('popup');
    	$('#' + popupId).toggleClass('hidden');
    });
	
	/* ORDER */
    $('body').on('click', '.current-order .details-trigger', function(e){
		var $this = $(this),
			$order = $this.parents('.current-order');
			
		e.preventDefault();

		if ($this.hasClass('show-details')) {
			$order.addClass('with-details');
		} else if ($this.hasClass('hide-details')) {
			$order.removeClass('with-details');			
		}
	});
	$(window).on('scroll', function () {
		$().mini_cart();
	});
	/* BUTTON TO TOP */
	
	$('.button-to-top').on('click', function () {
		$topButton = $(this);

		$("html, body").animate({scrollTop:0}, '500', 'swing', function() { 
		   $topButton.addClass('btn_disabled');
		});
	});

	/* LOGO */

	function rotateLogo () {
		var $logo = $('.logo');

		$logo.css({
			position: "relative"
		})

		$logo.animate({
			width: '0',
			left: "50%"
		}).
		animate({
			width: "100%",
			left: 0		
		})
	}
	setInterval(rotateLogo, 3000);
});

}) (jQuery, window);