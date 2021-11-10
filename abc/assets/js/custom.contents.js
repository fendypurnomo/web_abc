(function($) {
	"use strict";

	//activate tooltip
	$('[tooltip="tooltip"]').tooltip().on('mouseleave',function()
	{
		$(this).tooltip('hide')
	});

	//activate wave effect css
	Waves.init();

	//scroll to top button appear
	$('.main-content').on('scroll',function()
	{
		var scrollDistance = $(this).scrollTop();
		if(scrollDistance > 100)
		{
			$('.scroll-to-top').fadeIn();
		}
		else
		{
			$('.scroll-to-top').fadeOut();
		}
	});

	//smooth scrolling using jQuery easing
	$(document).on('click','a.scroll-to-top',function(event)
	{
		var $this = $(this);
		$('html, body, .main-content').stop().animate({
			scrollTop:($($this.attr('href')).offset().top)
		},1000,'easeInOutExpo');
		event.preventDefault();
	});
})(jQuery);
