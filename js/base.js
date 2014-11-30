(function ($, window, undefined){

$(function () {
	$('[data-image]').each(function () {
		var $this = $(this);
		
		$this.css('background-image', 'url("' + $this.data('image') + '")');
		
	});
	$('[data-image-position]').each(function () {
		var $this = $(this);
		
		$this.css('background-position', $this.data('image-position'));
		
	});
	
	/* POPUPS */
	$('.popup-wrapper').on('click', function () {
		$(this).addClass('hidden');
	});
	$('.popup-container').on('click', function (e) {
		e.stopPropagation();
	});
	$('[data-popup]').on('click', function () {
		var popupId = $(this).data('popup');
		
		$('#' + popupId).toggleClass('hidden');
	});
	
	/* ORDER */
	$('.current-order .details-trigger').on('click', function () {
		var $this = $(this),
			$order = $this.parents('.current-order');

		if ($this.hasClass('show-details')) {
			$order.addClass('with-details');
		} else if ($this.hasClass('hide-details')) {
			$order.removeClass('with-details');			
		}
	});
});

}) (jQuery, window);